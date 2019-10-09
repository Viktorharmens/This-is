const gulp = require('gulp');
const sass = require('gulp-sass');
const watch = require('gulp-watch');
var concat = require('gulp-concat');

gulp.task('styles', () => {
    return gulp.src('sass/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css/'));
});

gulp.task('css', function() {
    return gulp.src('css/*.css')
        .pipe(concat('main.css'))
        .pipe(gulp.dest('./dist/'));
});

gulp.task('watch', function() {
	gulp.watch('sass/**/*.scss', gulp.series('styles'))
	gulp.watch('css/*.css', gulp.series('css'))
});

gulp.task('default', gulp.series(['watch', 'styles', 'css']));

