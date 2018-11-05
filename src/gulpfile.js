const gulp = require('gulp');
      sass = require('gulp-sass');
      autoprefixer = require('gulp-autoprefixer');
      browserSync  = require('browser-sync').create();
      sourcemaps = require('gulp-sourcemaps');
      useref = require('gulp-useref');
      htmlclean = require('gulp-htmlclean');
      del = require('del');
      removeCode = require('gulp-remove-code');
      inject = require('gulp-inject');

const paths = {
    // src - source files: pre-processed Sass, JavaScript un-minified
    srcHTML: './*.html',
    srcSCSS: 'scss/bundle.scss',
    srcJS: 'scripts/*.js',
    srcMaterialJS: 'material-kit-html-v2.0.4/assets/js/**/*',
    srcMDLJS: 'mdl/material.min.js',
  
    // tmp - dev files: Sass compiled, JavaScript copied
    tmp: '../tmp',
    tmpHTML: '../tmp/*.html',
    tmpCSS: '../tmp/styles/',
    tmpJS: '../tmp/scripts/',
    tmpMaterialJS: '../tmp/scripts/material-kit/js',
    tmpMDLJS: '../tmp/scripts/',

    // dist - production files: processed, minified
    dist: '../dist',
    distCSS: '../dist/styles/',
    distJS: '../dist/scripts/'
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

// 2 - Compile Sass to tmpCSS
gulp.task('sass-dev', ['html-dev'], function() {
  return gulp.src(paths.srcSCSS)
    .pipe(sourcemaps.init())
    .pipe(sass({
        includePaths: ['./node_modules']
    }).on('error', sass.logError))
    //.pipe(sass().on('error', sass.logError))
    .pipe(autoprefixer())
    .pipe(sourcemaps.write("./"))
    .pipe(gulp.dest(paths.tmpCSS));
});

// 2.1 Ensure 'sass-dev' is complete before reloading browser
gulp.task('sass-dev-watch', ['sass-dev'], function (done) {
    browserSync.reload();
    done();
});

// 3 - Copy JavaScript from src to tmp
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

// 5 - Copy Material Design Lite JavaScript to tmp
gulp.task('mdl-dev', ['materialkit-dev'], function() {
    return gulp.src(paths.srcMDLJS).pipe(gulp.dest(paths.tmpMDLJS));
});

// 6 - Static dev server
gulp.task('browser-sync', ['mdl-dev'], function() {
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

// Build Task
gulp.task('build', 
    ['css-build', 'html-build', 
    'html-clean', 'browser-sync-prod-test'], function() {
});

// 1 - JavaScript: because of this file's strange behavior NO NEED ANYMORE
//const datetimepickerPath = 'material-kit/js/plugins/bootstrap-datetimepicker.js';

/* gulp.task('js-build', function() {
        return gulp.src(paths.tmpJS)
            .pipe(gulp.dest(paths.distJS));
        // bundle gulp-concat
        // source
        // rename .min
        // minify and uglify
        // 
});
 */
// 2 - Copy all CSS from tmp to dist
gulp.task('css-build', function() {
    return gulp.src(paths.tmpCSS + '*.css')
        .pipe(gulp.dest(paths.distCSS));
});

// 3 - Copy all HTML from tmp to dist
gulp.task('html-build', ['css-build'], function() {
    return gulp.src(paths.tmpHTML)
        .pipe(useref())
        .pipe(gulp.dest(paths.dist));
});

// 4 - Clean HTML
gulp.task('html-clean', ['html-build'], function() {
    const js = gulp.src(paths.distJS + 'main.js');
    return gulp.src(paths.dist + '/*.html')
        .pipe(removeCode({ production: true }))
        .pipe(inject( js, { relative:true } ))
        .pipe(htmlclean())
        .pipe(gulp.dest(paths.dist));
});

// 5 - Static server
gulp.task('browser-sync-prod-test', ['html-build'], function() {
    browserSync.init({
        server: {
            baseDir: paths.dist, 
        },
        browser: "google chrome"
    });
    
});

// Clean Task
gulp.task('clean', function () {
    del([paths.tmp, paths.dist], {force: true});
  });

// Default Task
gulp.task('default', function() {
    console.log('It\'s a gulp new world!');
})