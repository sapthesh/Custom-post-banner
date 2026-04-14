# Custom Post Banner

Dynamically prepend a customizable, dismissible banner to the top of all single posts on your WordPress website. Built securely with native WordPress APIs.

<a href="https://hits.sh/github.com/sapthesh/Custom-post-banner/"><img alt="Hits" src="https://hits.sh/github.com/sapthesh/Custom-post-banner.svg?view=today-total&style=for-the-badge&color=fe7d37"/></a>

## 🚀 Features

*   **Global Toggle:** Easily enable or disable the banner across your entire site with a single checkbox.
*   **Rich Text Support:** Insert plain text or standard HTML (like bold text or links) safely into the banner.
*   **Customizable Colors:** Use the built-in color pickers to perfectly match the banner background and text to your theme.
*   **Dismissible Layout:** Includes a close button so users can dismiss the banner for a better reading experience.
*   **Performance Focused:** Uses the native WordPress Settings API (`wp_options`). No custom database tables or custom post types are required.
*   **Context Aware:** Only appears on single blog posts (`is_single()`), keeping your archives, homepages, and static pages clean.

## 📁 File Structure

```text
custom-post-banner/
├── custom-post-banner.php           # Main plugin file
├── readme.txt                       # WordPress org readme
├── README.md                        # GitHub repository readme
├── assets/
│   ├── css/
│   │   └── cpb-style.css            # Frontend styles
│   └── js/
│       └── cpb-script.js            # Dismissible banner logic
├── includes/
│   ├── class-cpb-admin.php          # Backend settings page logic
│   └── class-cpb-frontend.php       # Frontend display and hooks
└── templates/
    └── banner-view.php              # HTML structure of the banner
```
## 🛠️ Installation

* Download or clone this repository into your WordPress plugins directory: wp-content/plugins/custom-post-banner/.
* Navigate to the Plugins menu in your WordPress admin dashboard.
* Locate Custom Post Banner in the list and click Activate.

## ⚙️ Configuration & Usage

* In your WordPress dashboard, navigate to Settings > Post Banner.
* Enable Banner: Check the box to make the banner live.
* Banner Content: Enter your announcement, notice, or HTML content.
* Colors: Select your desired background and text colors using the color pickers.
* Click Save Changes.

## 🧪 Testing Plan

To verify the plugin is working correctly in your environment, follow these QA steps:
* Configuration Persistence: Change the settings (text, colors, toggle) and save. Refresh the settings page to ensure your configuration is saved in the database.
* Frontend Visibility: Open any single blog post. The banner should appear exactly at the top of the post content with your chosen styles.
* Conditional Check: Navigate to a static page (e.g., "About Us") or a category archive. The banner should not render on these pages.
* Dismissal Interaction: Click the "X" on the banner. It should immediately disappear without requiring a page refresh. (Note: This dismisses it for the current page view; refreshing the page will bring it back by default).
* Empty State Handling: Clear out all text from the Banner Content setting and save. Ensure no empty colored box appears on the frontend.

## 🔒 Security

This plugin follows strict WordPress coding standards:
* Options are sanitized upon saving (absint, wp_kses_post, sanitize_hex_color).
* Attributes and outputs are escaped upon rendering (esc_attr, esc_textarea, wp_kses_post).
* Direct file access is blocked (ABSPATH check).

## 📄 License

GPLv2 or later.
