var gulp = require('gulp');

gulp.task('default', function() {	 
	console.log('Use the following commands');
	console.log('--------------------------');
	console.log('gulp compile-css		to compile the custom.scss to custom.css');
	console.log('gulp compile-js		to compile the custom.js to custom.min.js');
	console.log('gulp watch				to continue watching the files for changes.');
});

var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');

gulp.task('sass', function () { 
    gulp.src('custom.scss')
        .pipe(sass())
        .pipe(gulp.dest(''));
});

gulp.task('js', function () {
	gulp.src('assets/js/custom.js')	 
	//.pipe(jshint())	 
	//.pipe(jshint.reporter('fail'))	 
	.pipe(concat('custom.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('assets/js')); 
});
 
gulp.task('compile-css', ['sass']);
gulp.task('compile-js', ['js']);

gulp.task('watch', function() {	 
	gulp.watch('custom.scss', ['sass']);	 
	gulp.watch('assets/js/custom.js', ['js']);	 
});