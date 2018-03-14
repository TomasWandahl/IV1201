/*
  This is an EXAMPLE gulpfile.js
  You'll want to change it to match your project.
  Find plugins at https://npmjs.org/browse/keyword/gulpplugin
*/
var gulp = require('gulp');
var composer = require('gulp-composer');
var install = require("gulp-install");
var shell = require('gulp-shell');

gulp.task('default', ['composer', 'npm', 'copy-env', 'migrate-database','generate-key', 'php-server']);

gulp.task('composer', function(){
    composer();
});
gulp.task('copy-env', shell.task('cp .env.example .env'));
gulp.task('migrate-database', shell.task('php artisan migrate'));
gulp.task('generate-key', shell.task('php artisan key:generate'));
gulp.task('php-server', shell.task('php artisan serve'));
gulp.task('npm', function(){
    gulp.src(['./package.json'])
  .pipe(install());
});
