module.exports = function(grunt) {

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),


    // This will compile all scripts in the JS directory into one file
    concat: {
      options: {
        separator: ';'
      },
      dist: {
        src: ['_dev/js/*.js'],
        dest: '_assets/js/site.min.js'
      }
    },


    // Minify all scripts
    uglify: {
      my_target: {
        files: {
          '_assets/js/site.min.js': ['_assets/js/site.min.js']
        }
      }
    },


    // This will compile all SCSS and minify it to a single CSS file
    compass: {
      dist: {
        options: {
          environment: 'production',
          outputStyle: 'compressed',
          imagesDir: '../images',
          fontsDir: '../fonts',
          sassDir: '_dev/scss',
          cssDir: '_assets/css',
          raw: 'preferred_syntax = :scss\n' // Use `raw` since it's not directly available
        }
      }
    },

    // Image Optimization
    imagemin: {
      dynamic: {
        files: [{
          expand: true,
          cwd: '_dev/images',
          src: ['**/*.{png,jpg,gif,svg}'],
          dest: '_assets/images'
        }]
      }
    },

    // Critical CSS
    criticalcss: {
      custom_options: {
        options: {
          url: "http://www.clubhousedev.net/cg/b-r-ryall-ymca/",
          width: 1200,
          height: 900,
          outputfile: "_assets/css/critical.secondary.css",
          filename: "_assets/css/style.css"
        }
      }
    },

    // Watches files and runs appropriate tasks upon changes
    watch: {
      scripts: {
        files: ['_dev/js/*.js'],
        tasks: ['concat', 'uglify'],
      },
      styles: {
        files: ['_dev/scss/*.scss', '_dev/scss/libs/*.scss'],
        tasks: ['compass'],
      },
      img: {
        files: ['_dev/images/**/*.{png,jpg,gif,svg}'],
        tasks: ['newer:imagemin']
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-newer');
  grunt.loadNpmTasks('grunt-criticalcss');

  grunt.registerTask('default', ['concat', 'compass', 'uglify', 'newer:imagemin']);
  grunt.registerTask('critical', ['criticalcss']);
};