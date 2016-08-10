var gulp = require('gulp');

gulp.task('default', function() {	 
	console.log('Use the following commands');
	console.log('--------------------------');
	console.log('gulp compile-css		to compile the custom.scss to custom.css');
	console.log('gulp compile-js		to compile the custom.js to custom.min.js');
	console.log('gulp watch				to continue watching the files for changes.');
	console.log('gulp wordpress-pot		to compile the lsx-child.pot, en_EN.po and en_EN.mo');
});

var sass = require('gulp-sass');
var jshint = require('gulp-jshint');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sort = require('gulp-sort');
var wppot = require('gulp-wp-pot');
var gettext = require('gulp-gettext');

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

gulp.task('wordpress-pot', function () {
	gulp.src('**/*.php')
		.pipe(sort())
		.pipe(wppot({
			domain: 'lsx-child',
			destFile: 'lsx-child.pot',
			package: 'lsx-child',
			bugReport: 'https://github.com/lightspeeddevelopment/lsx-starter-child-theme/issues',
			team: 'LightSpeed <webmaster@lsdev.biz>'
		}))
		.pipe(gulp.dest('languages'));

	gulp.src('**/*.php')
		.pipe(sort())
		.pipe(wppot({
			domain: 'lsx-child',
			destFile: 'en_EN.po',
			package: 'lsx-child',
			bugReport: 'https://github.com/lightspeeddevelopment/lsx-starter-child-theme/issues',
			team: 'LightSpeed <webmaster@lsdev.biz>'
		}))
		.pipe(gulp.dest('languages'));

	gulp.src('languages/en_EN.po')
		.pipe(gettext())
		.pipe(gulp.dest('languages'));
});