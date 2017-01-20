var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

gulp.task('watch', function() {
  gulp.watch( './app/assets/scss/**/*.scss', ['scss'] );
});

gulp.task('sass', function(){
    return gulp.src('./app/assets/scss/main.scss')
        .pipe(sourcemaps.init())
        .pipe(sass({
        errLogToConsole: true,
        outputStyle: 'expanded', 
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./app/assets/css/'))
})

gulp.task('default', ['sass'], function() {
    gulp.watch('./app/assets/scss/**/*.scss', ['sass'])
});
