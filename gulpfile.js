"use strict";

var gulp = require("gulp"),
  sass = require("gulp-sass")(require("sass")),
  del = require("del"),
  uglify = require("gulp-uglify"),
  cleanCSS = require("gulp-clean-css"),
  rename = require("gulp-rename"),
  merge = require("merge-stream"),
  htmlreplace = require("gulp-html-replace"),
  autoprefixer = require("gulp-autoprefixer"),
  browserSync = require("browser-sync").create(),
  sourcemaps = require("gulp-sourcemaps");

// Clean task
gulp.task("clean", function () {
  return del(["dist", "src/css/app.css"]);
});

// Copy third party libraries from node_modules into /vendor
gulp.task("vendor:js", function () {
  return gulp
    .src([
      "./node_modules/bootstrap/dist/js/*",
      "./node_modules/@popperjs/core/dist/umd/popper.*",
    ])
    .pipe(gulp.dest("./src/js/vendor"));
});

// Copy bootstrap-icons from node_modules into /fonts
gulp.task("vendor:fonts", function () {
  return gulp
    .src([
      "./node_modules/bootstrap-icons/**/*",
      "!./node_modules/bootstrap-icons/package.json",
      "!./node_modules/bootstrap-icons/README.md",
    ])
    .pipe(gulp.dest("./src/fonts/bootstrap-icons"));
});

// vendor task
gulp.task("vendor", gulp.parallel("vendor:fonts", "vendor:js"));

// Copy vendor's js to /dist
gulp.task("vendor:build", function () {
  var jsStream = gulp
    .src([
      "./src/js/vendor/bootstrap.bundle.min.js",
      "./src/js/vendor/popper.min.js",
    ])
    .pipe(gulp.dest("./dist/js/vendor"));
  var fontStream = gulp
    .src(["./src/fonts/bootstrap-icons/**/*.*"])
    .pipe(gulp.dest("./dist/fonts/bootstrap-icons"));
  return merge(jsStream, fontStream);
});

// Copy Bootstrap SCSS(SASS) from node_modules to /assets/scss/bootstrap
gulp.task("bootstrap:scss", function () {
  return gulp
    .src(["./src/scss/bootstrap/**/*.scss"])
    .pipe(gulp.dest("./src/scss/bootstrap"));
});

// Compile SCSS(SASS) files
gulp.task(
  "scss",
  gulp.series("bootstrap:scss", function compileScss() {
    return gulp
      .src(["./src/scss/*.scss"])
      .pipe(
        sass
          .sync({
            outputStyle: "expanded",
          })
          .on("error", sass.logError)
      )
      .pipe(autoprefixer())
      .pipe(gulp.dest("./src/css"));
  })
);

// Minify CSS
gulp.task(
  "css:minify",
  gulp.series("scss", function cssMinify() {
    return gulp
      .src("./src/css/*.css")
      .pipe(cleanCSS())
      .pipe(
        rename({
          suffix: ".min",
        })
      )
      .pipe(gulp.dest("./dist/css"))
      .pipe(browserSync.stream());
  })
);

// Minify Js
gulp.task("js:minify", function () {
  return gulp
    .src(["./src/js/app.js"])
    .pipe(uglify())
    .pipe(
      rename({
        suffix: ".min",
      })
    )
    .pipe(gulp.dest("./dist/js"))
    .pipe(browserSync.stream());
});

// Replace HTML block for Js and Css file to min version upon build and copy to /dist
gulp.task("replaceHtmlBlock", function () {
  return gulp
    .src(["*.html"])
    .pipe(
      htmlreplace({
        js: "src/js/app.min.js",
        css: "src/css/app.min.css",
      })
    )
    .pipe(gulp.dest("dist/"));
});

// Configure the browserSync task and watch file path for change
gulp.task("dev", function browserDev(done) {
  browserSync.init({
    proxy: "https://bordernarrative.lib.arizona.local",
    https: true,
  });
  gulp.watch(
    ["src/scss/*.scss", "src/scss/**/*.scss", "!src/scss/bootstrap/**"],
    gulp.series("css:minify", function cssBrowserReload(done) {
      browserSync.reload();
      done(); //Async callback for completion.
    })
  );
  gulp.watch(
    "src/js/app.js",
    gulp.series("js:minify", function jsBrowserReload(done) {
      browserSync.reload();
      done();
    })
  );
  gulp.watch(["*.html", "**/*.php"]).on("change", browserSync.reload);
  done();
});

// Build task
gulp.task(
  "build",
  gulp.series(
    gulp.parallel("css:minify", "js:minify", "vendor"),
    "vendor:build",
    function copyAssets() {
      return gulp
        .src(["*.html", "dist/imgs/**"], { base: "./" })
        .pipe(gulp.dest("dist"));
    }
  )
);

// Default task
gulp.task("default", gulp.series("clean", "build", "replaceHtmlBlock"));
