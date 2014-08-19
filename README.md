# Gather

Gather is a highly adaptable theme for displaying products, art, and content.  Choose your own fonts, update colors, or upload a logo using the theme customizer.  Multiple menu locations, social icons, and widget areas are available.  Integrates well with popular plugins like JetPack and Easy Digital Downloads.  Gather is responsive and looks great on all devices.

## Installation Instructions

### Zip

If you download the zip file from GitHub you will also need to download the "customizer-library" and drop it in the "inc" directory.  That project can be found at https://github.com/devinsays/customizer-library.

### Git

If you pull the project via the command line, make sure use the --recusive parameter:
`git clone --recursive git@github.com:devpress/gather`

### Grunt

This theme uses Grunt to compile SASS and Javascript.  It also generates translation files, autoprefixes styles, and concats and minifies scripts.

If you have Grunt installed, just run `npm install` in the theme directory to download dependencies.

`grunt watch` can be used while editing SASS and JS.
`grunt release` should be used before browser testing or releasing.

## Change Log

1.0.0
===

* Public release