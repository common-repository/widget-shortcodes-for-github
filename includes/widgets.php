<?php

/**
 * Load script required for GitHub widgets in footer.
 * 
 * @since 1.0.0
 */
function widget_shortcodes_gh_buttons_script() {
    // Don't enqueue more than once.
    if ( wp_script_is( 'github-buttons-js', 'enqueued' ) ) {
        return;
    }
    wp_enqueue_script(
        'github-buttons-js', 		             // $handle
        'https://buttons.github.io/buttons.js',  // $src
        array(), 					             // $deps
        false,						             // $ver
        true						             // $in_footer
    );
}

/**
 * Renders a follow button for the specified GitHub user.
 *
 * @since 1.0.0
 */
function widget_shortcodes_gh_follow_button( $atts ) {
    $a = shortcode_atts( array(
        'user' => '',
        'size' => 'small',
        'show_count' => 'false',

    ), $atts);

    // Early exit if we have a non-string attribute
    foreach ($a as $att) {
        if (!is_string($att)) {
            return '<p>One or more attribtues was given an invalid data type.</p>';
        }
    }

    // Set size
    if ( $a['size'] == 'large' ) {
        $size = 'data-size="large"';
    } else { 
        $size = '';
    }

    // Set show count
    if ( $a['show-count'] == 'large' ) {
        $count = 'data-show-count="true"';
    } else { 
        $count = '';
    }

    // Load script in footer
    widget_shortcodes_gh_buttons_script();

    // Render
    ob_start();

    // Escape
    $user = esc_html($a['user']);

    // If user att was set
    if ( $user != '' ) {
        // Render button based on params
        ?>
            <a
                class="github-button"
                href="https://github.com/<?php echo $user ?>"
                aria-label="Follow @<?php echo $user ?> on GitHub"
                <?php if ( $size != '' ) { echo $size; } ?>
                <?php if ( $count != '' ) { echo $count; } ?>
            >
                Follow @<?php echo $user; ?>
            </a>
        <?php
    }
    else {
        ?>
            <p>A required parameter was not passed to the github widget shortcode.</p>
        <?php
    }

	return ob_get_clean();
}

/**
 * Renders either Watch, Star, Fork, Issue or Download button for a specified
 * repository based on given parameters.
 *
 * @since 1.0.0
 */
function widget_shortcodes_gh_repo_button ( $atts ) {
    $a = shortcode_atts( array(
        'type' => 'default',
        'user' => '',
        'repo' => '',
        'size' => 'small',
        'show_count' => 'false',
        'icon' => 'type_default'
    ), $atts);

    // Early exit if we have a non-string attribute
    foreach ($a as $att) {
        if (!is_string($att)) {
            return '<p>One or more attribtues was given an invalid data type.</p>';
        }
    }

    // Load script in footer
    widget_shortcodes_gh_buttons_script();

    // Set size
    if ( $a['size'] == 'large' ) {
        $size = 'data-size="large"';
    } else {
        $size = '';
    }

    // Set show count
    if ( $a['show_count'] == 'true') {
        $count = 'data-show-count="true"';
    } else {
        $count = '';
    }

    // Escape
    $user = esc_html($a['user']);
    $repo = esc_html($a['repo']);

    // Render
    ob_start();
    // If required atts were set
    if ( $user != '' && $repo != '' ) {
        // Set href and icon values
        if ( $a['type'] == 'watch' ) {
            $href = 'href="https://github.com/' . $user . '/' . $repo . '/subscription"';
            $icon = 'data-icon="octicon-eye"';
            $text = 'Watch';
        } else if ( $a['type'] == 'star' ) {
            $href = 'href="https://github.com/' . $user . '/' . $repo . '"';
            $icon = 'data-icon="octicon-star"';
            $text = 'Star';
        } else if ( $a['type'] == 'fork' ) {
            $href = 'href="https://github.com/' . $user . '/' . $repo . '/fork"';
            $icon = 'data-icon="octicon-repo-forked"';
            $text = "Fork";
        } else if ( $a['type'] == 'issue' ) {
            $href = 'href="https://github.com/' . $user . '/' . $repo . '/issues"';
            $icon = 'data-icon="octicon-issue-opened"';
            $text = 'Issue';
        } else if ( $a['type'] == 'download' ) {
            $href = 'href="https://github.com/' . $user . '/' . $repo . '/archive/master.zip"';
            $icon = 'data-icon="octicon-cloud-download"';
            $text = 'Download';
        } else {
            // Star by default
            $href = 'href="https://github.com/' . $user . '/' . $repo . '"';
            $icon = 'data-icon="octicon-star"';
            $text = 'Star';
        }

        // Override icon if standard
        if ( $a['icon'] == 'standard' ) {
            $icon = '';
        }

        // Render button based on params
        ?>
        <a
            class="github-button"
            <?php echo $href ?>
            aria-label="<?php echo $text . " " . $user; ?> on GitHub"
            <?php echo $size ?>
            <?php echo $count ?>
            <?php if ( $icon != '' ) { echo $icon; } ?>
        >
            <?php echo $text; ?>
        </a>
        <?php
    }
    else {
        ?>
            <p style="font-weight: bold;">A required parameter was not passed to the github widget shortcode.</p>
        <?php
    }
	return ob_get_clean();
}

/**
 * Renders the github hosted file at the specified URL.
 * 
 * @since 1.0.0
 */
function widget_shortcodes_gh_display_gist ( $atts, $content = null ) {
    // Render
    if ( $content != null ) {
        return '<script src="https://gist.github.com/' . esc_html($content) . '.js"></script>';
    } else {
        return '<p style="font-weight: bold;">No content detected between shortcode tags, please see <a href="" target="_blank" rel="noopener noreferrer">documentation</a>.</p>';
    }
}
