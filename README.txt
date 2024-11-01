=== Widget Shortcodes for Github ===
Contributors: jamqes
Tags: GitHub, buttons, Gist, shortcodes
Requires at least: 3.0.1
Tested up to: 5.2.2
Stable tag: trunk
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Lightweight widget shortcodes to display GitHub buttons and gists on your blog.

== Description ==

Lightweight widget shortcodes to display GitHub buttons and gists on your blog. Includes shortcode for embedding GitHub hosted gists and buttons for:

* Follow
* Watch
* Star
* Fork
* Download
* Issue

The plugin implements [ntkme's 'github-buttons'](https://github.com/ntkme/github-buttons) and GitHub's gist display as shortcodes.


== Installation ==

1. Upload the `widget-shortcodes-gh` directory to your plugins directory `wp-content/plugins`.
1. Activate the plugin through the 'Plugins' menu in WordPress

== Usage ==

GitHub Follow Button:
Add the `[Github_User_Button user='JBarnden' size='large' show_count='true']` shortcode in your content and replace `JBarnden` with the desired GitHub username.

GitHub Repo Buttons:
Add the `[Github_Repo_Button user='JBarnden' repo='wp-github-widgets' size='large' show_count='true']` shortcode in your content, replacing `JBarnden` with the desired GitHub username and `MyRepo` with the desired repo belonging to the specified user.
You can set the`type` attribtute to `watch`, `star`, `fork`, `issue` or `download`.

Display Gist:
Add the `[Gist]gist_id[/Gist]` where `gist_id` is replaced with the id of the desired Gist.

More detailed documentation can be found [here](https://github.com/JBarnden/wp-github-widgets#usage).  If you find the plugin useful or have any feedback I'd really appreciate your review.

== Feature Requests and Contributions ==
Please submit feature requests and contributions via the issues section of [the plugin's GitHub Repository](https://github.com/JBarnden/wp-github-widgets/).
If you feel like improving the plugin, pull requests are both welcome and appreciated.

== Screenshots ==

1. Examples of shortcodes and variations.

== Changelog ==

= 1.0 =
* Stable release with shortcodes for GitHub buttons and Gist display.