# Gather

Gather is a highly adaptable theme for displaying products, art, and content.  Choose your own fonts, update colors, or upload a logo using the theme customizer.  Multiple menu locations, social icons, and widget areas are available.  Integrates well with popular plugins like JetPack and Easy Digital Downloads.  Gather is responsive and looks great on all devices.

## Installation Instructions

This theme can be installed under "Appearance" > "Themes".  Click on the "Add New" button to upload the theme zip file.

## Developer Instructions

### Grunt

This theme uses Grunt to compile SASS and Javascript.  It also generates translation files, autoprefixes styles, and concats and minifies scripts.

If you have Grunt installed, just run `npm install` in the theme directory to download dependencies.

`grunt watch` can be used while editing SASS and JS.
`grunt release` should be used before browser testing or releasing.

## Change Log

Development
---

* Enhancement: Favicon and Apple Touch icon support
* Enhancement: Basic Event Calendar Support (https://wordpress.org/plugins/the-events-calendar/)
* Enhancement: Option to display download archive on front page
* Enhancement: Download taxonomies displayed by default
* Enhancement: Sticky footer
* Enhancement: Full Width Page Template
* Enhancement: Author Box
* Fix: Tumblr url detection for social menu

0.5.0
---

* Enhancement: Support RTL layouts
* Update: Post padding styles
* Fix: EDD masonry layouts
* Fix: Make sure post content clears
* Fix: Footer widget columns with more than 3 widgets
* Fix: Require jquery when loading minified scripts

0.4.0
---

* Enhancement: Better menu transitions
* Update: Display post archives in same format as standard archives
* Fix: Missing drop down indicator in menus

0.3.0
---

* Enhancement: Option to display archive excerpts
* Enhancement: Option to display archive featured images
* Update: Display featured images full-bleed in masonry layout only
* Fix: Apply primary color styling to "View More" background
* Fix: Apply primary color styling to archive page header
* Fix: Icon font loading

0.2.0
---

* Enhancement: More efficient font loading
* Update: Use bundled WordPress version of masonry.js
* Fix: Post dates option
* Fix: Featured image option

0.1.0
---

* Public release