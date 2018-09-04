var gulp = require('gulp');
var sourcemaps = require('gulp-sourcemaps');
var buffer = require('gulp-buffer');
var uglify = require('gulp-uglify');
var babel = require('babelify');
var browserify = require('browserify');
var transform = require('vinyl-transform');
var plumber = require('gulp-plumber');

let watching = false

let bundlePaths = {
    src: //[
      './resources/assets/js/app.front.js'
    //]
    ,
    dest:'dist/'
}
var onError = function (err) {  
	console.log(err);
   };
gulp.task('build',function () {
    var browserified = transform(function(filename) {
        var b = browserify(filename);
        //b.transform(babelify, { presets: ['es2015'], sourceType: "module" })
        /*b.transform(babel, {
            presets: [ 'es2015' ]
        })*/
        return b.bundle();
      });
    var babelified = transform(function(filename) {
        var b = babel(filename,{ presets: ['es2015']});
        //b.transform(babelify, { presets: ['es2015'], sourceType: "module" })
        /*b.transform(babel, {
            presets: [ 'es2015' ]
        })*/
        return b;
      });
    return gulp.src('./resources/assets/js/app.front.js')
        .pipe(plumber({
            errorHandler: onError
        }))
        .pipe(browserified)
        /*.pipe(plumber({
            errorHandler: onError
        }))*/
        .pipe(buffer())
        .pipe(babelified)
        .pipe(plumber({
            errorHandler: onError
        }))
        //.pipe(babel({presets: [['es2015'], ['vue-app']]}))

        .pipe(buffer())
        .pipe(sourcemaps.init({ loadMaps: true }))
        .pipe(uglify())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(bundlePaths.dest))
    });