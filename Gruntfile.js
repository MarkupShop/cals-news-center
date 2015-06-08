module.exports = function (grunt) {

    'use strict';

    require('time-grunt')(grunt);
    require('load-grunt-tasks')(grunt);

    grunt.initConfig({

        jshint: {
            grunt: {
                options: {node: true},
                globals: {module: true},
                src: 'Gruntfile.js'
            }
        },

        less: {
            dist: {
                options: {
                    plugins: [
                        new (require('less-plugin-autoprefix'))({browsers: ["last 2 versions"]})
                    ],
                },
                files: {
                    'css/styles.css': 'css/less/styles.less'
                }
            }
        },

        watch: {
            less: {
                files: [
                    'css/less/*.*',
                    'css/lib/*.*'
                ],
                tasks: 'less:dist',
                interrupt: true
            }
        }

    });

    grunt.registerTask('default', ['less:dist','watch']);

};