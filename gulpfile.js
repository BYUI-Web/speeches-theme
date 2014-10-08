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
    flatten = require("gulp-semiflat"),
    plumber = require("gulp-plumber"),
    imagemin = require("gulp-imagemin"),
    exec = require("child_process").exec,
    fs = require("fs");

gulp.task("copy", function () {
    return gulp.src(["./code/**/*", "!./**/*.less"])
        .pipe(plumber())
        .pipe(copy("./dist", {
            prefix: 1
        }));
});

gulp.task("sync", function () {
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/_includes/header/header.html > code/assets/html/header.html");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/_includes/footer/footer.html > code/assets/html/footer.html");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/css/global.min.css > code/assets/css/global.min.css");

    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.eot > code/assets/fonts/icomoon.eot");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.svg > code/assets/fonts/icomoon.svg");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.ttf > code/assets/fonts/icomoon.ttf");
    exec("curl -L https://raw.githubusercontent.com/BYUI-Web/responsive-prototype/master/assets/fonts/icomoon.woff > code/assets/fonts/icomoon.woff");

    console.log("Synced with responsive-prototype")
});

gulp.task("insert", ["insert:header", "insert:footer"]);

gulp.task("insert:header", function () {
    return gulp.src(["./code/header.php"])
        .pipe(plumber())
        .pipe(gfi({
            "<!-- header.html -->": "./code/assets/html/header.html"
        }))
        .pipe(replace("{{ page.title }}", "Speeches"))
        .pipe(replace("{{ site.baseurl }}", "http://www.byui.edu"))
        .pipe(gulp.dest("./dist/"));
});

gulp.task("insert:footer", function () {
    return gulp.src(["./code/footer.php"])
        .pipe(plumber())
        .pipe(gfi({
            "<!-- footer.html -->": "./code/assets/html/footer.html"
        }))
        .pipe(gulp.dest("./dist/"));
});

gulp.task('less', function () {
    return gulp.src('./code/assets/css/style.less')
        .pipe(plumber())
        .pipe(less())
        .pipe(rename("style.css"))
        .pipe(gulp.dest("./dist/"))
        .pipe(notify('LESS Compiled Succesfully'));;
});

gulp.task('minifycss', function () {
    return gulp.src(['./dist/**/*.css', '!./dist/style.css', "!./dist/assets/css/global.min.css"])
        .pipe(plumber())
        .pipe(flatten("./dist/assets/css"))
        .pipe(minify())
        .pipe(gulp.dest("./dist/assets/css/"));
});

gulp.task("minifystyle", ["less"], function () {
    return gulp.src(["./dist/style.css"])
        .pipe(plumber())
        .pipe(minify())
        .pipe(gulp.dest("./dist/"));
});

gulp.task('minifyjs', function () {
    return gulp.src(['./code/assets/js/admin/*.js'])
        .pipe(plumber())
        .pipe(concat("speechesjs.min.js"))
        .pipe(uglify())
        .pipe(gulp.dest('./dist/assets/js/'))
        .pipe(notify('Javascript Compiled Succesfully'));
});

gulp.task("imagemin", function () {
    return gulp.src("./dist/assets/images/**")
        .pipe(plumber())
        .pipe(imagemin({
            progressive: true
        }))
        .pipe(gulp.dest("./dist/assets/images"))
});

gulp.task('default', ['insert', 'copy', 'less', 'minifycss', "minifystyle", 'minifyjs'], function () {
    gulp.watch('./**/*.less', ['less', 'minifycss']);
    gulp.watch(['./code/assets/js/admin/*.js', '!./dist/**/*.js'], ['minifyjs']);
    gulp.watch(['./code/**', '!./dist/**'], ["insert", "copy"]);
});