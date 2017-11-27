'use strict';

var gulp = require('gulp'),
    prettyError = require('gulp-prettyerror'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    rename = require('gulp-rename'),
    cssnano = require('gulp-cssnano'),
    uglify = require('gulp-uglify'),
    eslint = require('gulp-eslint'),
    browserSync = require('browser-sync').create();

var supported = [
    'last 2 versions',
]

gulp.task('sass', function () {
    gulp.src('./src/css/**/*.scss')

        .pipe(sourcemaps.init())
        .pipe(prettyError())
        .pipe(sass())

        .pipe(gulp.dest('./build/css'))
        .pipe(cssnano({
            autoprefixer: {
                browsers: supported,
                add: true
            }
        }))
        .pipe(rename({
            extname: '.min.css'
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./build/css'));
});

gulp.task('scripts', ['lint'], function () {
    gulp.src('./src/js/**/*.js')
        .pipe(uglify())
        .pipe(rename({
            extname: '.min.js'
        }))
        .pipe(gulp.dest('./build/js'));
});

gulp.task('lint', function () {
    return gulp.src(['./js/*.js'])
        .pipe(eslint())
        .pipe(eslint.format())
        .pipe(eslint.failAfterError());
});

gulp.task('browser-sync', function () {
    browserSync.init({
        proxy: "http://localhost:8888/wprecipes/"
    });
    gulp.watch(['build/css/*.css', 'build/js/*.js', 'index.html']).on('change', browserSync.reload);
});

gulp.task('watch', function () {
    gulp.watch('src/css/**/*.scss', ['sass']);
    gulp.watch('src/js/*.js', ['scripts']);
});

gulp.task('default', ['watch', 'browser-sync']);