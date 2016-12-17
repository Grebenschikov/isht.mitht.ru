const gulp = require('gulp');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');
const cssnext = require('postcss-cssnext');
const babel = require('gulp-babel');
const htmlmin = require('gulp-htmlmin');
const inlinemin = require('gulp-minify-inline');

const path = {
  js: 'scripts/**/*.js',
  css: 'styles/**/*.css',
  iecss: 'styles/ie.css',
  tpl: 'templates/*.php',
}

gulp.task('js', () => {
  gulp.src(path.js)
    .pipe(babel({
      presets: ['es2015']
    }))    
    .pipe(concat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('../public'));
});

gulp.task('css', () => {
  gulp.src([path.css, `!${path.iecss}`])
    .pipe(concat('app.css'))
    .pipe(postcss([
      cssnext(),
      cssnano({autoprefixer: false})
    ]))
    .pipe(gulp.dest('../public'));

  gulp.src(path.iecss)
    .pipe(postcss([
      cssnext(),
      cssnano({autoprefixer: false})
    ]))
    .pipe(gulp.dest('../public'));    
});

gulp.task('tpl', () => {
  gulp.src(path.tpl)
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(inlinemin())
    .pipe(gulp.dest('../pages'));
})

gulp.task('build', ['js', 'css', 'tpl']);

gulp.task('watch', () => {
  gulp.watch(path.js, ['js']);
  gulp.watch(path.css, ['css']);
  gulp.watch(path.tpl, ['tpl']);
});

gulp.task('default', ['build', 'watch']);