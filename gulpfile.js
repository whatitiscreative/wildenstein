'use strict';

var gulp 			= require('gulp'),
	sass 			= require('gulp-sass'),
	uglify			= require('gulp-uglify'),
	autoprefixer 	= require('gulp-autoprefixer'),
	exec 			= require('child_process').exec;
// var paths = {
// 	dist: 	'./_dist/**/*.*',
// 	css: 	'./_dist/assets/css',
// 	scss: 	'./_source/scss/**/*.scss',
// 	s_js: 	'./_source/js/**/*.js',
// 	d_js: 	'./_dist/assets/js'
// };

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

gulp.task('watch', function() {
	gulp.watch([paths.scss], ['styles']);
});

gulp.task('default', function() {
	gulp.start('watch');
});