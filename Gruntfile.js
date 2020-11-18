module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        sass: {
            options: {
                sourcemap: false
            },
            dist: {
                files: {
                    'css/profile-page.css': 'css/sass/profile-page.scss',
                    'css/profile-page-no-sidebar.css': 'css/sass/profile-page-no-sidebar.scss'
                }
            }
        },
        watch: {
            scripts: {
                files: ['js/src/**/*.js'],
                tasks: ['babel', 'concat', 'uglify']
            },
            css: {
                files: 'css/**/*.scss',
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
                    "js/src/profile-page.js": "js/src/babel/app.js"
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
                src: ['js/src/profile-page.js'],
                dest: 'js/compiled/profile-page-compiled.js'
            }
        },
        uglify: {
            options: {
                mangle: false
            },
            my_target: {
                files: {
                    'js/compiled/profile-page-compiled.min.js': ['js/compiled/profile-page-compiled.js']
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
    grunt.registerTask('default', ['sass', 'eslint', 'babel','concat', 'uglify', 'watch', 'qunit']);

};
