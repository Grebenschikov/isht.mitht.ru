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
const selectors = require('gulp-selectors');
var clean = require('gulp-clean');

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
    .pipe(gulp.dest('.tmp/dist'));
});

gulp.task('css', () => {
  return gulp.src(paths.css)
    .pipe(concat('app.css'))
    .pipe(postcss([
      autoprefixer(),
      cssnano(),
      cssnext()
    ]))
    .pipe(gulp.dest('.tmp/dist'));
});

gulp.task('html', () => {
  return gulp.src(paths.tpls)
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(inlinemin())
    .pipe(gulp.dest('.tmp/dist'));
})

gulp.task('default', ['js', 'css', 'html'], () => {
  return [
    gulp.src('.tmp/dist/*')
      .pipe(selectors.run({
        'css': ['css'],
        'html': ['php'],
        'js-strings': ['js']
      }, {
        classes: ['menu', 'content', 'menu__anchor_active']
      }))
      .pipe(gulp.dest('.tmp/optimized')),
    gulp.src(['.tmp/optimized/app.js', '.tmp/optimized/app.css'])
      .pipe(gulp.dest('../public')),
    gulp.src('.tmp/optimized/*.php')
      .pipe(gulp.dest('../pages'))
  ];
});