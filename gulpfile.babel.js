import { src, dest, watch, series, parallel } from 'gulp';
import yargs from 'yargs';
import dartSass from 'sass';
import gulpSass from 'gulp-sass';
import cleanCss from 'gulp-clean-css';
import gulpif from 'gulp-if';
import postcss from 'gulp-postcss';
import sourcemaps from 'gulp-sourcemaps';
import autoprefixer from 'autoprefixer';
import imagemin from 'gulp-imagemin';
import del from 'del';
import webpack from 'webpack-stream';
import named from 'vinyl-named';
import browserSync from 'browser-sync';
import zip from 'gulp-zip';
import info from './package.json';
import replace from 'gulp-replace';
import wpPot from 'gulp-wp-pot';

const PRODUCTION = yargs.argv.prod;
const sass = gulpSass(dartSass);

//Styles task, minify, sass -> css + sourcemaps
export const styles = () => {
  return src('src/scss/*.scss')
    .pipe(gulpif(!PRODUCTION, sourcemaps.init()))
    .pipe(sass().on('error', sass.logError))
    .pipe(gulpif(PRODUCTION, postcss([autoprefixer()])))
    .pipe(gulpif(PRODUCTION, cleanCss({ compatibility: 'ie8' })))
    .pipe(gulpif(!PRODUCTION, sourcemaps.write()))
    .pipe(dest('assets/css'))
    .pipe(server.stream());
};

//Compress images
export const images = () => {
  return src('src/images/**/*.{jpg,jpeg,png,svg,gif}')
    .pipe(gulpif(PRODUCTION, imagemin()))
    .pipe(dest('assets/images'));
};

//Copy files
export const copy = () => {
  return src([
    'src/**/*',
    '!src/{images,js,scss}',
    '!src/{images,js,scss}/**/*',
  ]).pipe(dest('assets'));
};

//Delete assets folder
export const clean = () => del(['assets']);

//Convert ES6 -> ES5
export const scripts = () => {
  return src([
    'src/js/main.js',
    'src/js/projects.js',
    'src/js/vanilla.tilt.js',
    'src/js/owl.carousel.min.js',
    'src/js/owl.carousel.js',
    'src/js/progress-bar.js',
  ])
    .pipe(named())
    .pipe(
      webpack({
        module: {
          rules: [
            {
              test: /\.js$/,
              use: {
                loader: 'babel-loader',
                options: {
                  presets: ['@babel/preset-env'],
                },
              },
            },
          ],
        },
        mode: PRODUCTION ? 'production' : 'development',
        devtool: !PRODUCTION ? 'inline-source-map' : false,
        output: {
          filename: '[name].js',
        },
      })
    )
    .pipe(dest('assets/js'));
};

//Live Browser (Browsersync)
const server = browserSync.create();
export const serve = (done) => {
  server.init({
    proxy: 'http://localhost',
  });
  done();
};
export const reload = (done) => {
  server.reload();
  done();
};

//Create ZIP file and replace placeholders(to your theme-name)
export const compress = () => {
  return src([
    '**/*',
    '!node_modules{,/**}',
    '!bundled{,/**}',
    '!src{,/**}',
    '!.babelrc',
    '!.gitignore',
    '!gulpfile.babel.js',
    '!package.json',
    '!package-lock.json',
    '!acf-exports.json',
  ])
    .pipe(
      gulpif(
        (file) => file.relative.split('.').pop() !== 'zip',
        replace('_themename', info.name)
      )
    )
    .pipe(zip(`${info.name}.zip`))
    .pipe(dest('bundled'));
};

//WP Translation
export const pot = () => {
  return src('**/*.php')
    .pipe(
      wpPot({
        domain: '_themename',
        package: info.name,
      })
    )
    .pipe(dest(`languages1/${info.name}.pot`));
};

//Watch for changes
export const watchForChanges = () => {
  watch('src/scss/**/*.scss', styles);
  watch('src/images/**/*.{jpg,jpeg,png,svg,gif}', series(images, reload));
  watch(
    ['src/**/*', '!src/{images,js,scss}', '!src/{images,js,scss}/**/*'],
    series(copy, reload)
  );
  watch('src/js/**/*.js', series(scripts, reload));
  watch('**/*.php', reload);
};

//Development Task
export const dev = series(
  clean,
  parallel(styles, images, copy, scripts),
  serve,
  watchForChanges
);
//Build Task
export const build = series(
  clean,
  parallel(styles, images, copy, scripts),
  pot,
  compress
);

//Set dev as default when you call gulp
export default dev;

export const hello = (cb) => {
  console.log(PRODUCTION);
  cb();
};
