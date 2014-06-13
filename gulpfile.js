var gulp = require('gulp');
var less = require('gulp-less');
var minify = require('gulp-minify-css');
var rename = require('gulp-rename');
var notify = require('gulp-notify');
var concat = require("gulp-concat");
var uglify = require("gulp-uglify");

var files = {
    js: ['./framework/js/*.js', '!./framework/js/speechesjs.js', '!./framework/js/speechesjs.min.js']
};

gulp.task('default', ['less', 'minifycss', 'minifyjs'], function() {
	gulp.watch('./**/*.less', ['less', 'minifycss']);
	gulp.watch(files.js, ['minifyjs']);
});

gulp.task('less', function() {
	return gulp.src('./*.less')
	.pipe(less())
	.pipe(rename("style.css"))
	.pipe(gulp.dest("./"))
	.pipe(notify('LESS Compiled Succesfully'));;
});

gulp.task('minifycss', function() {
	return gulp.src('./*.css')
	.pipe(minify())
	.pipe(rename("style.min.css"))
	.pipe(gulp.dest("./"));
});

gulp.task('minifyjs', function() {
    return gulp.src(files.js)
            .pipe(concat("speechesjs.min.js"))
            .pipe(uglify())
            .pipe(gulp.dest('./framework/js/'))
            .pipe(notify('Javascript Compiled Succesfully'));
});