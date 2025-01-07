# Fix Yoast Elementor Landing Pages Meta

![License](https://img.shields.io/badge/License-GPLv3-blue.svg)

## Overview

**Fix Yoast Elementor Landing Pages Meta** is a custom WordPress solution designed to enhance the SEO functionality of Elementor landing pages. This script adjusts the permalink structure for the `e-landing-page` custom post type to use `/%postname%/` when the basic permalink is configured as `/%category%/%postname%/`. It ensures that standard pages and the home page operate correctly without resulting in 404 errors and enables Yoast SEO to properly apply meta tags to landing pages.

## Features

- **Custom Permalink Structure:** Changes the permalink structure for `e-landing-page` to `/%postname%/`.
- **404 Error Prevention:** Ensures that standard pages and the home page do not return 404 errors after the permalink modification.
- **Yoast SEO Compatibility:** Enables Yoast SEO to correctly apply meta tags to Elementor landing pages.
- **Seamless Integration:** Easily integrates into your WordPress theme without the need for additional plugins.

## Installation

1. **Backup Your Site:**
   - Before making any changes, ensure you have a complete backup of your WordPress site.

2. **Add the Snippet to `functions.php`:**
   - Navigate to your WordPress theme directory.
   - Open the `functions.php` file of your active theme (preferably a child theme to prevent loss during updates).
   - Copy and paste the provided code snippet into the `functions.php` file.

3. **Save and Upload:**
   - Save the `functions.php` file and upload it back to your server if you edited it locally.

4. **Flush Rewrite Rules:**
   - Log in to your WordPress dashboard.
   - Navigate to **Settings > Permalinks**.
   - Click the **Save Changes** button without making any modifications. This action flushes and regenerates the rewrite rules.

## Usage

After installation, the snippet automatically adjusts the permalink structure for your `e-landing-page` post type. No additional configuration is required. Ensure that:

- Your landing pages are created using the `e-landing-page` post type.
- Yoast SEO is properly configured to handle custom post types.

## Author

**Alan Curtis**

- **Website:** [www.myaiplugins.com](https://www.myaiplugins.com)
- **GitHub:** [@MyAIPlugins](https://github.com/MyAIPlugins/)

## License

This project is licensed under the [GNU General Public License v3.0](https://www.gnu.org/licenses/gpl-3.0.html) (GPL-3.0).

## Acknowledgements

- [Yoast SEO](https://yoast.com/wordpress/plugins/seo/)
- [Elementor](https://elementor.com/)
- [WordPress](https://wordpress.org/)