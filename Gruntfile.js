// In order to use Grunt:
// - first install NodeJS on your system (http://nodejs.org), which includes the npm tool.
// - then install the Grunt CLI on your system: (sudo) npm install -g grunt-cli
// - then switch to the folder where this file resides and install (locally in this dir) everything that is needed:
//   Just type "npm install" - this will use the package.json file to know what to install each of the required packages
//   with "npm install xxx" for each of the Dependencies listed in package.json
// - then, in order to be able to invoke 'grunt' on your system, type "sudo npm install -g grunt-cli". This will make
//   grunt available from the Command Line Interface.
// - ONCE IN A WHILE: run "npm update" to update all youe packages
// In order to use Sass:
// - Make sure Ruby is installed on your system (should be preinstalled on MacOSX. On windows: http://rubyinstaller.org)
// - Type: "sudo gem install sass"
// Once this is done, you can:
// - type 'grunt' (in this dir) and run the default tasks and run automatically
// - type 'grunt xxx' where xxx is a specific task name
// Note for devs: when adding new plugins, use for example "npm install grunt-contrib-less --save-dev"
// to update the package.json file with the new plugin reference.

module.exports = function(grunt) {

	// Project configuration:
	grunt.initConfig({

		// Read project settings into the pkg property:
		// (Will allow to refer to the values of the properties below)
		pkg: grunt.file.readJSON('package.json'),

		// Configuration for the less->css compiling tasks:
		less: {
			style: {
				options: {
					compress: false,
					//yuicompress: true,
					//optimization: 2
				},
				files: {
					'style.css': [ 'style.less' ],
				}
			},
		},

		// CSS minification:
		cssmin: {
			style: {
				nonull: true, // Display missing files
				files: {
					'style.min.css': [ 'style.css' ],
				}
			},
		},

      // Autoprefixer CSS Browser Old Support
      // https://toster.ru/q/119641
      autoprefixer: {
         options: {
            browsers: ['last 2 versions', 'ie 8', 'ie 9', '> 1%'],
            cascade: false
         },
         files: {
            // Target-specific file lists and/or options go here.
            src: '*.css'
         },
      },


		// Configuration for the watch tasks:
		watch: {
			less: {
				// Which files to watch (all .less files recursively in the whole blogs directory)
				files: ['*.less'],
				tasks: ['less','cssmin', 'autoprefixer'],
				options: {
					nospawn: true,
				}
			},
		},

      // Using the BrowserSync Proxy for your existing website url.
      browserSync: {
         dev: {
           bsFiles: {
             src: [
               "images",
               "*.css",
               "**/*.php",
             ]
           },
           options: {
             watchTask: true,
            //  Change your url Deploy
             proxy: "http://localhost/upwork/b2evolution/b2/index.php/a/",
           }
         }
      },


	});

	// Load the plugin that provides the tasks ( "uglify", "less", "sass", etc. ):
	grunt.loadNpmTasks('grunt-contrib-less');
   grunt.loadNpmTasks('grunt-autoprefixer');
	grunt.loadNpmTasks('grunt-contrib-cssmin');
	grunt.loadNpmTasks('grunt-contrib-watch');
   grunt.loadNpmTasks('grunt-browser-sync');

	// Default task(s):
	grunt.registerTask( 'default', [ 'browserSync', 'less','cssmin', 'autoprefixer', 'watch'] );

};
