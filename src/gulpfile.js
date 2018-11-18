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
    srcPHP: './**/*.php',
    srcPHPResources: 'resources/*.php',
    srcSCSS: 'scss/bundle.scss',
    srcJS: 'public/scripts/*.js',
    srcMaterialJS: 'resources/libs/material-kit-html-v2.0.4/assets/js/**/*',
    srcMDLJS: 'resources/libs/mdl/material.min.js',
    srcFPDF: 'resources/libs/fpdf181/',
  
    // tmp - dev files: Sass compiled, JavaScript copied
    tmp: '../tmp',
    tmpPHP: '../tmp/**/*.php',
    tmpCSS: '../tmp/public/styles/',
    tmpJS: '../tmp/public/scripts/',
    tmpMaterialJS: '../tmp/public/scripts/material-kit/js',
    tmpMDLJS: '../tmp/public/scripts/',
    tmpFPDF: '../tmp/resources/libs/',

    // dist - production files: processed, minified
    dist: '../dist/',
    distCSS: '../dist/public/styles/',
    distJS: '../dist/public/scripts/'
};

// Dev Task
gulp.task('dev', ['php-dev', 'sass-dev', 'js-dev', 'materialkit-dev', 'mdl-dev', 'browser-sync'], function() {
});

// 1 - Copy all PHP from src to tmp
gulp.task('php-dev', function() {
    return gulp.src(paths.srcPHP).pipe(gulp.dest(paths.tmp));
  });
  
// 1.1 Ensure 'php-dev' is complete before reloading browser
gulp.task('php-dev-watch', ['php-dev'], function (done) {
    browserSync.reload();
    done();
});

// 2 - Compile Sass to tmpCSS
gulp.task('sass-dev', ['php-dev'], function() {
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
        // Default Browsersync server
        /* server: {
            baseDir: paths.tmp, 
        }, */
        // MAMP
        proxy: "http://localhost:8888/voluntarios/tmp/public/voluntarios.php",
        browser: "google chrome"
    });

    gulp.watch(paths.srcPHP, ['php-dev-watch']);
    gulp.watch("scss/*.scss", ['sass-dev-watch']);
    gulp.watch(paths.srcJS, ['js-dev-watch']);
    
});

// Build Task
gulp.task('build', 
    ['php-build', 'css-build', 'php-clean', 'browser-sync-prod-test'], function() {
});

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

// 1 - Copy all PHP from tmp to dist, build 'main.js'
gulp.task('php-build', function() {
    return gulp.src(paths.tmpPHP)
        .pipe(useref())
        .pipe(gulp.dest(paths.dist));
});

// 2 - Copy all CSS from tmp to dist
gulp.task('css-build', ['php-build'], function() {
    return gulp.src(paths.tmpCSS + '*.css')
        .pipe(gulp.dest(paths.distCSS));
});

// 3 - Clean PHP
gulp.task('php-clean', ['css-build'], function() {
    const js = gulp.src(paths.distJS + 'main.js');
    return gulp.src(paths.dist + 'public/*.view.php')
        .pipe(removeCode({
            production: true, 
            commentStart: "<!--", 
            commentEnd: "-->"}))
        .pipe(inject( js, { relative:true } ))
        .pipe(htmlclean())
        .pipe(gulp.dest(paths.dist + 'public/'));
});

// 4 - Static server
gulp.task('browser-sync-prod-test', ['php-clean'], function() {
    browserSync.init({
        // Default Browsersync server
        /* server: {
            baseDir: paths.dist, 
        }, */
        // MAMP
        proxy: "http://localhost:8888/voluntarios/dist/public/voluntarios.php",
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