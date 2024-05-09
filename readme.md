=== DMG Read More Search Gutenberg Block ===
Contributors: (your WP.org username)
Tags: gutenberg, block, posts, links
Requires at least: 6.5.3
Tested up to: 6.5.2
Stable tag: 1.0.0
Requires PHP: 7.2 above
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

The "DMG Read More Search" plugin adds a custom Gutenberg block to your WordPress site, allowing editors to search for and insert published posts as stylized anchor links.

== Description ==

The "DMG Read More Search" plugin is a custom Gutenberg block that enables editors to easily search for and insert links to other posts within their content. This enhances editorial capabilities by providing a simple, integrated search within the Gutenberg editor to find and reference previous posts with styled anchor links.

== Installation ==

1. **Download the Plugin**
	- Download the ZIP file from the GitHub repository or clone it directly using git:
	  ```
	  https://github.com/raviraya19/dmg-read-more-search.git
	  ```

2. **Upload to WordPress**
	- Navigate to your WordPress admin panel.
	- Go to **Plugins** > **Add New** > **Upload Plugin**.
	- Choose the downloaded ZIP file or the folder of the cloned repository and click on **Install Now**.

3. **Activate the Plugin**
	- After installation, activate the plugin through the **Plugins** menu in WordPress.

== Usage ==

1. **Open the Gutenberg Editor**
	- Create a new post or page, or edit an existing one.

2. **Add the Block**
	- Click on the "+" button to add a new block and search for "DMG Read More - Post Search".
	- Click on the block to add it to your post or page.

3. **Search and Insert Posts**
	- Use the block's search field in the **Inspector Controls** to find and select a post.
	- Click the listed post below the seach to insert in to the block.
	- The block will automatically insert a "Read More" link with the selected post's title.
4. **Testing the Command**
	- Activate the Plugin: Make sure your plugin is active in your WordPress installation.
    - Run the Command: Use the command line to navigate to your WordPress root directory and execute the command:
```
wp dmg-read-more-search --date-before=2024-05-01 --date-after=2024-04-15
```

== Customization ==

This block includes minimal styling by default. For further customization, you can modify the `style.scss` file or add additional styles in your theme's CSS file.

== Developer Build ==
- Run 'npm install'
- Run 'npm start' or 'npm build'

== Frequently Asked Questions ==

= Can I customize the look of the links? =

Yes, the block includes minimal default styling, but it can be easily customized by adding your own CSS in your theme.

== Changelog ==

= 1.0.0 =
* Initial release.

== Upgrade Notice ==

= 1.0.0 =
Initial release. Please let us know about any bugs or feature requests on the plugin's GitHub repository.
