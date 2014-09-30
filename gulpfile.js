var gulp = require('gulp'),
    concat = require("gulp-concat"),
    copy = require("gulp-copy"),
    gfi = require("gulp-file-insert"),
    less = require("gulp-less"),
    minify = require("gulp-minify-css"),
    notify = require("gulp-notify"),
    rename = require("gulp-rename"),
    uglify = require("gulp-uglify"),
    replace = require("gulp-replace"),
    exec = require("child_process").exec,
    fs = require("fs");

gulp.task("copy", function() {
    return gulp.src(["./code/src/**/*", "!./**/*.less"])
        .pipe(copy("./code/dist", {prefix: 2}));
});

gulp.task("sync", function() {
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/_includes/header/header.html > code/src/assets/html/header.html");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/_includes/footer/footer.html > code/src/assets/html/footer.html");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/css/global.min.css > code/src/assets/css/global.min.css");  

    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.eot > code/src/assets/fonts/icomoon.eot");  
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.svg > code/src/assets/fonts/icomoon.svg");  
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.ttf > code/src/assets/fonts/icomoon.ttf");  
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.woff > code/src/assets/fonts/icomoon.woff");  

    console.log("Synced with responsive-prototype")
});

gulp.task("insert", function() {
    return gulp.src(["./code/src/footer.php", "./code/src/header.php"])
    .pipe(gfi({
        "<!-- header.html -->": "./code/src/assets/html/header.html",
        "<!-- footer.html -->": "./code/src/assets/html/footer.html"
    }))
    .pipe(replace("{{ page.title }}", "Speeches"))
    .pipe(gulp.dest("./code/dist/"));
});

gulp.task('less', function() {
    return gulp.src('./code/src/assets/css/style.less')
        .pipe(less())
        .pipe(rename("style.css"))
        .pipe(gulp.dest("./code/dist/"))
        .pipe(notify('LESS Compiled Succesfully'));;
});

gulp.task('minifycss', function() {
    return gulp.src('./code/dist/**/*.css')
        .pipe(minify())
        .pipe(gulp.dest("./code/dist/"));
});

gulp.task('minifyjs', function() {
    return gulp.src(['./code/src/assets/js/admin/*.js'])
        .pipe(concat("speechesjs.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest('./code/dist/assets/js/'))
        .pipe(notify('Javascript Compiled Succesfully'));
});

gulp.task('default', ['insert', 'copy', 'less', 'minifycss', 'minifyjs'], function() {
    gulp.watch('./**/*.less', ['less', 'minifycss']);
    gulp.watch('./code/src/assets/js/admin/*.js', ['minifyjs']);
    gulp.watch('./code/src/**', ["insert", "copy"]);
});