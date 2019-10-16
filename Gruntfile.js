'use strict';

// Packages
const fiberLibrary = require('fibers');
const sassLibrary = require('node-sass');

module.exports = function(grunt) {

	// load all tasks
	require('load-grunt-tasks')(grunt, {scope: 'devDependencies'});

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		watch: {
			files: ['assets/scss/**/*.scss', 'assets/js/**/*.js'],
			tasks: ['sass', 'postcss', 'cssmin', 'concat', 'uglify'],
			options: {
				livereload: true,
			},
		},
		sass: {
			default: {
				options : {
					implementation: sassLibrary,
					fiber: fiberLibrary,
					style : 'expanded',
					sourceMap: true
				},
				files: {
					'css/style.css':'assets/scss/style.scss'
				}
			}
		},
		postcss: {
			options: {
			map: true,
			processors: [
				require('autoprefixer'),
			]
			},
			files: {
				'css/style.css':'css/style.css'
			}
		},
		cssmin: {
			options: {
				aggressiveMerging : false
			},
			target: {
				files: [{
					expand: true,
					cwd: 'css',
					src: ['*.css', '!*.min.css'],
					dest: 'css',
					ext: '.min.css'
				}]
			}
		},
		concat: {
			default: {
				src: [
					'assets/js/skip-link-focus-fix.js',
					'assets/js/jquery.fittext.js',
					'assets/js/jquery.fitvids.js',
					'assets/js/theme.js'
				],
				dest: 'js/gather.min.js'
			}
		},
		uglify: {
			options: {
				mangle: {
					reserved: ['jQuery']
				},
				drop_console: true
			},
			default: {
				files: {
					'js/gather.min.js' : 'js/gather.min.js'
				}
			}
		},
		// https://www.npmjs.org/package/grunt-wp-i18n
		makepot: {
			target: {
				options: {
					domainPath: '/languages/',
					potFilename: 'gather.pot',
					potHeaders: {
					poedit: true, // Includes common Poedit headers.
					'x-poedit-keywordslist': true // Include a list of all possible gettext functions.
				},
				type: 'wp-theme',
				updateTimestamp: false,
				processPot: function( pot, options ) {
					pot.headers['report-msgid-bugs-to'] = 'https://devpress.com/';
					pot.headers['language'] = 'en_US';
					return pot;
					}
				}
			}
		},
		cssjanus: {
			theme: {
				options: {
					swapLtrRtlInUrl: false
				},
				files: [
					{
						src: 'css/style.css',
						dest: 'css/style-rtl.css'
					},
					{
						src: 'css/style.min.css',
						dest: 'css/style-rtl.min.css'
					},
				]
			}
		},
		replace: {
			styleVersion: {
				src: [
					'assets/scss/style.scss',
				],
				overwrite: true,
				replacements: [{
					from: /Version:.*$/m,
					to: 'Version: <%= pkg.version %>'
				}]
			},
			functionsVersion: {
				src: [
					'functions.php'
				],
				overwrite: true,
				replacements: [ {
					from: /^define\( 'GATHER_VERSION'.*$/m,
					to: 'define( \'GATHER_VERSION\', \'<%= pkg.version %>\' );'
				} ]
			},
		}
	});

	grunt.registerTask( 'default', [
		'sass',
		'postcss',
		'cssmin',
		'concat',
		'uglify',
	]);

	grunt.registerTask( 'release', [
		'replace',
		'sass',
		'postcss',
		'cssmin',
		'concat',
		'uglify',
		'makepot',
		'cssjanus'
	]);

};
