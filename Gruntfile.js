module.exports = function(grunt) {

	var _time = Math.round(new Date().getTime() / 1000);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		concat: {
			options: {
				nonull: true,
				separator: '\n;\n',
				stripBanners: true,
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd hh:MM") %> */\n'
			},
			libs: {
				src: [
					'public/js/libs/jquery.min.js',
					'public/js/libs/lodash.min.js',
					'public/js/libs/backbone-min.js'
					],
				dest: 'public/js/libs/libs.js'
			}
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd hh:MM") %> */\n',
				beautify: {
					width: 80,
					beautify: true
				}
			},
			build: {
				src: 'public/js/libs/libs.js',
				dest: 'public/js/dist/libs.min.js'
			}
		},
		requirejs: {
			options: {

			}
		},
		jshint: {
			jshintrc: '.jshintrc',
			files: {
				src: ['js/*.js']
			}
		},
		clean: {
			dist: ['css/*.css']
		},
		compass: {
			dist: {
				options: {
					sassDir: 'css/sass/',
					cssDir: 'css'
				}
			}
		},
		watch: {
			options: {
				livereload: true
			},
			sass: {
				files: ['css/sass/*.scss'],
				tasks: ['compass:dist'],
				options: {
				}
			}
		}
	});

	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.registerTask('default', ['concat','uglify','compass:dist']);
	grunt.registerTask('compile' , ['requirejs']);

};