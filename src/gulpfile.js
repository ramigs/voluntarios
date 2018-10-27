const gulp = require('gulp');
      sass = require('gulp-sass');
      autoprefixer = require('gulp-autoprefixer');
      browserSync  = require('browser-sync').create();

const paths = {
    srcHTML: './*.html',
    srcSCSS: 'scss/bundle.scss',
    srcJS: 'scripts/*.js',
  
    tmp: '../tmp',
    tmpCSS: '../tmp/styles/',
    tmpJS: '../tmp/scripts/',
  
    dist: '../dist',
    distCSS: '../dist/styles/*.css',
    distJS: '../dist/scripts/*.js'
};

// Dev Task
gulp.task('dev', ['html-dev', 'sass-dev', 'js-dev', 'browser-sync'], function() {
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
      .pipe(sass({
          includePaths: ['./node_modules']
        }))
      .pipe(autoprefixer())
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

// 4 - Static dev server
gulp.task('browser-sync', ['js-dev'], function() {
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