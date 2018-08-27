var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require("gulp-rename");
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
var log = require('fancy-log');

gulp.task('devs', function() {
	log("scss amado ");
	gulp.src('./resources/assets/amado/scss/*.scss')
		.pipe(sass.sync({
			outputStyle: 'expanded'
		})
		.on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(rename('amado.css'))
		.pipe(gulp.dest('./public/css'));
	log("css plugins amado ");
	gulp.src('./resources/assets/amado/css/*.css')
		.pipe(cleanCSS())
		.pipe(rename('amado.plugin.css'))
		.pipe(gulp.dest('./public/css'));
	log("js amado");
	gulp.src(
			[
				'./resources/assets/amado/js/jquery/jquery-2.2.4.min.js'
				,"./resources/assets/amado/js/popper.min.js"
				,"./resources/assets/amado/js/bootstrap.min.js"
				,"./resources/assets/amado/js/plugins.js"
				,"./resources/assets/amado/js/active.js"
			]
			,{base: './resources/assets/amado/js'}
		)
		//.pipe(sourcemaps.init())
		//.pipe(sourcemaps.write('maps'))
		.pipe(concat('amado.app.js'))
		.pipe(uglify())
		.pipe(rename('amado.min.js'))
		.pipe(gulp.dest('./public/js'));
	log("images amado??");
	/*gulp.src('./resources/assets/amado/img/ * * / *')
		.pipe(gulp.dest('./public/images'));*/
	log("fonts amado");
	gulp.src('./resources/assets/amado/fonts/**/*')
		.pipe(gulp.dest('./public/fonts'));
});
gulp.task('watch-devs', function() {
    gulp.watch([
        './resources/assets/amado/*'
    ], ['devs']);

});