'use strict';

var gulp 			= require('gulp'),
	sass 			= require('gulp-sass'),
	uglify			= require('gulp-uglify'),
	shell 			= require('gulp-shell'),	
	sftp 			= require('gulp-sftp'),
	autoprefixer 	= require('gulp-autoprefixer'),
	exec 			= require('child_process').exec;
	
// var paths = {
// 	dist: 	'./_dist/**/*.*',
// 	css: 	'./_dist/assets/css',
// 	scss: 	'./_source/scss/**/*.scss',
// 	s_js: 	'./_source/js/**/*.js',
// 	d_js: 	'./_dist/assets/js'
// };

var config = {
	'username': 'junie',
	'passwd': 'Generallee1',
	'host': 'sftp.flywheelsites.com:22/bcslade/wildenstein-co/wp-content/themes/wildenstein/',
	'root': 'wp-content/themes/wildenstein/'
};


var paths = {
	css: 	'./dist/css',
	scss: 	'./_source/scss/**/*.scss',
};

gulp.task('styles', function() {
	return gulp.src(paths.scss)
		.pipe(sass({
			precision: 10,
			outputStyle: 'compressed',
			// outputStyle: 'expanded',
			// outputStyle: 'nested',
			// outputStyle: 'compact',
			onError: console.error.bind(console, 'Sass error:'),
		}))
		.pipe(autoprefixer({
			// browsers: ['last 2 versions']
		}))
		.pipe(gulp.dest(paths.css));
});

gulp.task('ftp-init', shell.task('git ftp init -u ' + config.username + ' -p ' + config.passwd + ' --syncroot ' + config.root + ' sftp://' + config.host + ' --verbose'));
gulp.task('ftp-push', shell.task('git ftp push -u ' + config.username + ' -p ' + config.passwd + ' --syncroot ' + config.root + ' sftp://' + config.host  + ' --verbose'));


gulp.task('watch', function() {
	gulp.watch([paths.scss], ['styles']);
});

gulp.task('default', function() {
	gulp.start('watch');
});