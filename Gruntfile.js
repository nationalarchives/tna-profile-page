module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourcemap: 'none'
            },
            dist: {
                files: {
                    'css/tna-profile-page.css': 'css/sass/tna-profile-page.scss',
                    'css/tna-profile-page-no-sidebar.css': 'css/sass/tna-profile-page-no-sidebar.scss'
                }
            }
        },
        watch: {
            scripts: {
                files: ['js/*.js','js/babel/*.js'],
                tasks: ['concat', 'uglify','babel']
            },
            css: {
                files: 'css/*.scss',
                tasks: ['sass']
            }
        },
        eslint: {
            target: "js/babel/app.js",
            options: {
                configFile: 'conf/eslint.json'
            }
        },
        babel: {
            options: {
                sourceMap: true
            },
            dist: {
                files: {
                    "js/tna-profile-page.js": "js/babel/app.js"
                }
            }
        },
        qunit: {
            all: ['js/tests/**/*.html']
        },
        concat: {
            options: {
                separator: ';'
            },
            dist: {
                src: ['js/tna-profile-page.js'],
                dest: 'js/compiled/tna-profile-page-compiled.js'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'js/compiled/tna-profile-page-compiled.min.js': ['js/compiled/tna-profile-page-compiled.js']
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-qunit');
    grunt.loadNpmTasks('grunt-babel');
    grunt.loadNpmTasks('grunt-eslint');

    // Default task(s).
    grunt.registerTask('default', ['sass', 'concat', 'uglify', 'watch', 'qunit', 'babel','eslint']);

};