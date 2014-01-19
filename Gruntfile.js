module.exports = function(grunt) {

	var _time = Math.round(new Date().getTime() / 1000);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),

		dir: {
			libs: 'public/js/libs/'
		},

		concat: {
			options: {
				nonull: true,
				separator: '\n;\n',
				stripBanners: true,
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd hh:MM") %> */\n'
			},
			libs: {
				src: [
					'<%= dir.libs %>json2.min.js',
					'<%= dir.libs %>jquery.min.js',
					'<%= dir.libs %>lodash.min.js',
					'<%= dir.libs %>backbone-min.js',
					'<%= dir.libs %>highlight.min.js',
					'<%= dir.libs  %>d3.min.js'
					],
				dest: '<%= dir.libs %>libs.js'
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
					sassDir: 'public/css/sass/',
					cssDir: 'public/css'
				}
			}
		},
		watch: {
			options: {
				livereload: true
			},
			sass: {
				files: ['public/css/sass/*.scss'],
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
