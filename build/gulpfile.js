var gulp = require('gulp')
var path = require('path')
var less = require('gulp-less')
var autoprefixer = require('gulp-autoprefixer')
var sourcemaps = require('gulp-sourcemaps')
var minifyCSS = require('gulp-minify-css')
var rename = require('gulp-rename')
var concat = require('gulp-concat')
var uglify = require('gulp-uglify')
var connect = require('gulp-connect')
var open = require('gulp-open')
var zopfli = require('gulp-zopfli')

var Paths = {
    HERE: './',
    DIST_CSS: '../public/css',
    DIST_JS: '../public/js',
    DIST_STATUS_JS: '../public/js/status.js',
    DIST_STATUS_DASH_JS: '../public/js/dash.js',
    LESS_STATUS_SOURCES: './less/status.less',
    LESS: './less/bootstrap/**/**',
    JS_DASH: [
        './js/jquery/jquery.js',
        './js/ace/ace.js',
        './js/colorpicker/colorpicker.js',
        './js/sortable/sortable.js',
        './js/bootbox/bootbox.js',
        './js/autosize/autosize.js',
        './js/bootstrap/transition.js',
        './js/bootstrap/dropdown.js',
        './js/bootstrap/tooltip.js',
        './js/bootstrap/modal.js',
        './js/bootstrap/alert.js',
    ],
    JS: [
        './js/jquery/jquery.js',
        './js/linkify/linkify.js',
        './js/datejs/date.js',
        './js/chartist/chartist.js',
        './js/bootstrap/tooltip.js',
    ]
}

gulp.task('default', ['less-compress', 'js-min-compress', 'js-min-dash-compress'])

gulp.task('watch', function() {
    gulp.watch(Paths.LESS, ['less-min']);
    gulp.watch(Paths.JS, ['js-min']);
})

gulp.task('less', function() {
    return gulp.src(Paths.LESS_STATUS_SOURCES)
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(autoprefixer())
        .pipe(sourcemaps.write(Paths.HERE))
        .pipe(gulp.dest(Paths.DIST_CSS))
})

gulp.task('less-min', ['less'], function() {
    return gulp.src(Paths.LESS_STATUS_SOURCES)
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(minifyCSS())
        .pipe(autoprefixer())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(sourcemaps.write(Paths.HERE))
        .pipe(gulp.dest(Paths.DIST_CSS))
})

gulp.task('less-compress', ['less-min'], function() {
    gulp.src(Paths.DIST_CSS+'/*.min.css')
    .pipe(zopfli())
    .pipe(gulp.dest(Paths.DIST_CSS))
})

gulp.task('js', function() {
    return gulp.src(Paths.JS)
        .pipe(concat('status.js'))
        .pipe(gulp.dest(Paths.DIST_JS))
})

gulp.task('js-dash', function() {
    return gulp.src(Paths.JS_DASH)
        .pipe(concat('dash.js'))
        .pipe(gulp.dest(Paths.DIST_JS))
})

gulp.task('js-min', ['js'], function() {
    return gulp.src(Paths.DIST_STATUS_JS)
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(Paths.DIST_JS))
})

gulp.task('js-dash-min', ['js-dash'], function() {
    return gulp.src(Paths.DIST_STATUS_DASH_JS)
        .pipe(uglify())
        .pipe(rename({
            suffix: '.min'
        }))
        .pipe(gulp.dest(Paths.DIST_JS))
})

gulp.task('js-min-compress', ['js-min'], function() {
    gulp.src(Paths.DIST_JS+'/*.min.js')
    .pipe(zopfli())
    .pipe(gulp.dest(Paths.DIST_JS))
})

gulp.task('js-min-dash-compress', ['js-dash-min'], function() {
    gulp.src(Paths.DIST_JS+'/*.min.js')
    .pipe(zopfli())
    .pipe(gulp.dest(Paths.DIST_JS))
})

