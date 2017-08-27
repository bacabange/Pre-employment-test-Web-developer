module.exports = function (grunt) {

    // 1. All configuration goes here 
    grunt.initConfig({
        concat: {
            js: {
                src: [
                    'src/js/jquery-3.2.1.min.js',
                    'src/js/bootstrap.js',
                    'src/js/script.js',
                ],
                dest: 'src/js/all.js'
            }
        },
        uglify: {
            js: {
                src: 'src/js/all.js',
                dest: 'src/js/all.min.js'
            }
        },
        watch: {
            js: {
                files: ['src/js/*.js'],
                tasks: ['concat:js', 'uglify:js']
            }
        }
    });
    // 2. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-watch');

    // 3. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['concat', 'uglify']);

};