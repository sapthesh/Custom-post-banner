=== Custom Post Banner ===
Contributors: sapthesh
Tags: banner, post, custom banner, notice
Requires at least: 5.0
Tested up to: 6.5
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Dynamically prepends a customizable banner to the content of all single posts.

== Description ==

The Custom Post Banner plugin allows site administrators to easily add a global, customizable notice or banner at the top of every individual blog post. It leverages the native WordPress Settings API for optimal performance and security, storing its settings efficiently without cluttering the database with custom tables.

Features include:
* Toggle the banner on and off globally.
* Use custom HTML or plain text in the banner.
* Pick custom background and text colors.
* Dismissible banner layout for better user experience.

== Installation ==

1. Upload the `custom-post-banner` directory to the `/wp-content/plugins/` directory on your server.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Navigate to Settings > Post Banner in your WordPress admin dashboard to configure the banner settings (enable it, add your message, and pick your colors).

== Frequently Asked Questions ==

= How do I change the colors of the banner? =

You can easily change the background and text colors by navigating to Settings > Post Banner in your WordPress admin dashboard. Click on the color pickers to select your desired hex colors.

= Can I use HTML formatting inside the banner? =

Yes, basic HTML is allowed (such as `<strong>`, `<em>`, `<a>`). The input is safely sanitized using native WordPress functions (`wp_kses_post`) to ensure malicious scripts are filtered out while securely rendering standard text formatting.

= Where exactly does this banner appear? =

The banner appears at the very beginning of the post content, strictly on single post views (`is_single()`). It will not inject itself into archive pages, static pages, or the main blog feed loop.
