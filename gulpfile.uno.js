var gulp = require('gulp');
var sass = require('gulp-sass');
var uglify = require('gulp-uglify');
var rename = require("gulp-rename");
var cleanCSS = require('gulp-clean-css');
var sourcemaps = require('gulp-sourcemaps');
var concat       = require('gulp-concat');
var log = require('fancy-log');
var vueify     = require('gulp-vueify');
var browserify = require('browserify');
var source     = require('vinyl-source-stream');
var babelify   = require('babelify');
var babel   = require('gulp-babel');
var vueCompiler = require('gulp-vue-compiler');
var plumber = require('gulp-plumber');
var transform = require('vinyl-transform');

var onError = function (err) {  
	console.log(err);
   };	
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
				//,"./resources/assets/js/app.front.js"
			]
			,{base: './resources/assets/amado/js'}
		)
		//.pipe(sourcemaps.init())
		//.pipe(sourcemaps.write('maps'))
		.pipe(concat('amado.app.js'))
		.pipe(uglify())
		.pipe(rename('amado.min.js'))
		.pipe(gulp.dest('./public/js'));
	//log("images amado??");
	/*gulp.src('./resources/assets/amado/img/ * * / *')
		.pipe(gulp.dest('./public/images'));*/
	
	
	log("fonts amado");
	return gulp.src('./resources/assets/amado/fonts/**/*')
		.pipe(gulp.dest('./public/fonts'));
});
gulp.task('bundle-for-dev', function () {
    //return gulp.src('./resources/assets/js/app.front.js') // path to your entry file here
    return browserify({entries: ['./resources/assets/js/app.front.js']}) // path to your entry file here
	//.transform(babelify, { presets: ['es2015'], sourceType: "module" })
	.pipe(plumber({
		errorHandler: onError
	}))
	/*.transform(babelify.configure({
		presets: ["es2015"]
	  }))*/
	//.transform(babel, {"presets": ["es2015"/*, "vue-app"*/]})
    //.transform(vueify)
    //.plugin('vueify/plugins/extract-css', { out: './tmp/css/bundle.css' }) // path to where you want your css
	//.transform(babelify, {"presets": ["vue-app"]})
    //.external('vue') // remove vue from the bundle, if you omit this line whole vue will be bundled with your code
    .bundle()
    .pipe(source('app.front.js'))
    .pipe(gulp.dest('./public/js'));
})

gulp.task('watch-devs', function() {
    return gulp.watch([
        './resources/assets/amado/*',
        './resources/assets/js/*'
    ], [/*'devs', */'bundle-for-dev']);

});

gulp.task('vue-compile', function() {
	return gulp.src('./resources/assets/js/**/*.vue')
	//return gulp.src('./resources/assets/js/app.front.js')
	  .pipe(vueCompiler({ /* options */ }))
	  //.pipe(gulp.dest('./public/js'));
	  .pipe(gulp.dest('./resources/assets/js/compiled_components'));
  });

  // using vinyl-source-stream:
gulp.task('browserify', function() {
	var bundleStream = browserify('./resources/assets/js/app.front.js').bundle()
  
	bundleStream
	  .pipe(source('./resources/assets/js/app.front.js'))
	  .pipe(streamify(uglify()))
	  .pipe(rename('bundle.js'))
	  .pipe(gulp.dest('./'))
  })