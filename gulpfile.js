var gulp = require('gulp');
var less = require('gulp-less');
var minify = require('gulp-minify-css');
var rename = require('gulp-rename');

gulp.task('default', ['less', 'minifycss'], function() {
    gulp.watch('./*.less', ['less', 'minifycss']);
});

gulp.task('less', function() {
    return gulp.src('./*.less')
            .pipe(less())
            .pipe(rename("style.css"))
            .pipe(gulp.dest("./"));
});

gulp.task('minifycss', function() {
   return gulp.src('./*.css')
           .pipe(minify())
           .pipe(rename("style.min.css"))
           .pipe(gulp.dest("./"));
});