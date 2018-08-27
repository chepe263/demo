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
    return browserify({entries: ['./resources/assets/js/app.front.js']}) // path to your entry file here
	//.transform(babelify, { presets: [['vue-app', {}], ['es2015', {}]] })
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