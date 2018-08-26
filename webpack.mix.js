let mix = require('laravel-mix');
var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require("gulp-rename");
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
		jquery: ['$', 'jQuery', 'window.jQuery'],
		tether: ['Tether', 'window.Tether'],
		'popper.js/dist/umd/popper.js': ['Popper']
	})
	.js('resources/assets/js/app.js', 'public/js')
		.scripts([
		'public/js/app.js',
		'vendor/konekt/appshell/src/resources/assets/js/appshell.js'
    	], 'public/js/app.js'
	)
	.sass('vendor/konekt/appshell/src/resources/assets/sass/appshell.sass', 'public/css');
	
	//scss amado 
	gulp.src('./resources/assets/amado/scss/*.scss')
		.pipe(sass.sync({
			outputStyle: 'expanded'
		})
		.on('error', sass.logError))
		.pipe(cleanCSS())
		.pipe(rename('amado.css'))
		.pipe(gulp.dest('./public/css'));
	//css plugins amado 
	gulp.src('./resources/assets/amado/css/*.css')
		.pipe(cleanCSS())
		.pipe(rename('amado.plugin.css'))
		.pipe(gulp.dest('./public/css'));
	//js amado
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
	//images amado
	/*gulp.src('./resources/assets/amado/img/**/*')
		.pipe(gulp.dest('./public/images'));*/
	//fonts amado
	gulp.src('./resources/assets/amado/fonts/**/*')
		.pipe(gulp.dest('./public/fonts'));