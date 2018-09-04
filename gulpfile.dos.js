var gulp = require('gulp');
var browserify = require('browserify');
var transform = require('vinyl-transform');
var uglify = require('gulp-uglify');
var plumber = require('gulp-plumber');
var babel = require('gulp-babel');

var onError = function (err) {  
	console.log(err);
   };

gulp.task('browserify', function () {
  var browserified = transform(function(filename) {
    var b = browserify(filename);
    //b.transform(babelify, { presets: ['es2015'], sourceType: "module" })
    return b.bundle();
  });
  
  return gulp.src(['./resources/assets/js/app.front.js'])
    .pipe(plumber({
        errorHandler: onError
    }))
    .pipe(babel({presets: [['es2015'], ['vue-app']]}))
    //.bundle()
    /*.pipe(plumber({
        errorHandler: onError
    }))*/
    //.pipe(browserified)
    //.pipe(uglify())
    .pipe(gulp.dest('./dist'));
});