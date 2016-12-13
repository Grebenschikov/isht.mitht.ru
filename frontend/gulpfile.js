const gulp = require('gulp');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const cssnext = require('postcss-cssnext');
const babel = require('gulp-babel');
const htmlmin = require('gulp-htmlmin');
const inlinemin = require('gulp-minify-inline');

const paths = {
  js: 'scripts/*.js',
  css: 'styles/*.css',
  tpls: 'templates/*',
}

gulp.task('js', () => {
  return gulp.src(paths.js)
    .pipe(babel({
      presets: ['es2015']
    }))    
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../public'));
});

gulp.task('css', () => {
  return gulp.src(paths.css)
    .pipe(concat('app.css'))
    .pipe(postcss([
      autoprefixer(),
      cssnano(),
      cssnext()
    ]))
    .pipe(gulp.dest('../public'));
});

gulp.task('html', () => {
  return gulp.src(paths.tpls)
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(inlinemin())
    .pipe(gulp.dest('../pages'));
})

gulp.task('build', ['js', 'css', 'html']);

gulp.task('watch', () => {
  gulp.watch(paths.js, ['js']);
  gulp.watch(paths.js, ['css']);
  gulp.watch(paths.tpls, ['html']);
});

gulp.task('default', ['build', 'watch']);