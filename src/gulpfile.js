const gulp = require('gulp');
      sass = require('gulp-sass');
      autoprefixer = require('gulp-autoprefixer');
      browserSync  = require('browser-sync').create();
      sourcemaps = require('gulp-sourcemaps');

const paths = {
    srcHTML: './*.html',
    srcSCSS: 'scss/bundle.scss',
    srcJS: 'scripts/*.js',
    srcMaterialJS: 'material-kit-html-v2.0.4/assets/js/**/*',
    srcMDLJS: 'mdl/material.min.js',
  
    tmp: '../tmp',
    tmpCSS: '../tmp/styles/',
    tmpJS: '../tmp/scripts/',
    tmpMaterialJS: '../tmp/scripts/js',
    tmpMDLJS: '../tmp/scripts/',
  
    dist: '../dist',
    distCSS: '../dist/styles/*.css',
    distJS: '../dist/scripts/*.js'
};

// Dev Task
gulp.task('dev', ['html-dev', 'sass-dev', 'js-dev', 'materialkit-dev', 'mdl-dev', 'browser-sync'], function() {
});

// 1 - Copy all HTML from src to tmp
gulp.task('html-dev', function() {
  return gulp.src(paths.srcHTML).pipe(gulp.dest(paths.tmp));
});

// 1.1 Ensure 'html-dev' is complete before reloading browser
gulp.task('html-dev-watch', ['html-dev'], function (done) {
    browserSync.reload();
    done();
});

// 2 - Compile Sass to tmpCSS + Inject CSS into browser
gulp.task('sass-dev', ['html-dev'], function() {
  return gulp.src(paths.srcSCSS)
    .pipe(sourcemaps.init())
    .pipe(sass({
        includePaths: ['./node_modules']
    }))
    .pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.tmpCSS));
});

// 2.1 Ensure 'sass-dev' is complete before reloading browser
gulp.task('sass-dev-watch', ['sass-dev'], function (done) {
    browserSync.reload();
    done();
});

// 3 - Copy all JavaScript from src to tmp
gulp.task('js-dev', ['sass-dev'], function() {
    return gulp.src(paths.srcJS).pipe(gulp.dest(paths.tmpJS));
});

// 3.1 Ensure 'js-dev' is complete before reloading browser
gulp.task('js-dev-watch', ['js-dev'], function (done) {
    browserSync.reload();
    done();
});

// 4 - Copy Material Kit JavaScript to tmp
gulp.task('materialkit-dev', ['js-dev'], function() {
    return gulp.src(paths.srcMaterialJS).pipe(gulp.dest(paths.tmpMaterialJS));
});

// 5 - Copy Material Design Lite to tmp
gulp.task('mdl-dev', ['materialkit-dev'], function() {
    return gulp.src(paths.srcMDLJS).pipe(gulp.dest(paths.tmpMDLJS));
});

// 6 - Static dev server
gulp.task('browser-sync', ['materialkit-dev'], function() {
    browserSync.init({
        server: {
            baseDir: paths.tmp, 
        },
        browser: "google chrome"
    });

    gulp.watch(paths.srcHTML, ['html-dev-watch']);
    gulp.watch("scss/*.scss", ['sass-dev-watch']);
    gulp.watch(paths.srcJS, ['js-dev-watch']);
    
});

// Default Task
gulp.task('default', function() {
    console.log('It\'s a gulp new world!');
})