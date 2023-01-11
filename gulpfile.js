'use strict';

const { src, dest, task, watch, series, parallel } = require('gulp');
const del = require('del'); //For Cleaning build/dist for fresh export
const browserSync = require('browser-sync').create();
const plumber = require('gulp-plumber');
const rename = require('gulp-rename');

const sass = require('gulp-sass')(require('sass')); //For Compiling SASS files
const postcss = require('gulp-postcss'); //For Compiling tailwind utilities with tailwind config
const concat = require('gulp-concat'); //For Concatinating js,css files
const uglify = require('gulp-terser');//To Minify JS files
const imagemin = require('gulp-imagemin'); //To Optimize Images
const cleanCSS = require('gulp-clean-css');//To Minify CSS files
const purgecss = require('gulp-purgecss');// Remove Unused CSS from Styles

const wpPot = require('gulp-wp-pot');
const sort = require('gulp-sort');

//Note : Webp still not supported in major browsers including forefox
//const webp = require('gulp-webp'); //For converting images to WebP format
//const replace = require('gulp-replace'); //For Replacing img formats to webp in html
const logSymbols = require('log-symbols'); //For Symbolic Console logs :) :P 


/*================================= Configuration =================================*/

const NODE_ENV = process.env.NODE_ENV || 'development';
const SASS_DIR = 'sass';
const SCRIPTS_DIR = 'js';
const SCRIPTS_V_DIR = 'js/vendors';
const ADMIN_SCRIPTS_DIR = SCRIPTS_DIR + '/admin';
const ASSETS_DIR = 'assets';

let options = {
	debug: NODE_ENV === 'development' ? true : false,
	config: {
		tailwindjs: "./tailwind.config.js",
		port: 9050
	},
	paths: {
		root: "./",
		src: {
			css: SASS_DIR + '/main.scss',
			js: [
				SCRIPTS_DIR + '/vendors/*.js',
				SCRIPTS_DIR + '/main.js'
			],
		},
		dist: {
			base: "./assets",
			css: "./assets/css",
			js: "./assets/js",
		}
	},
	block_style: {
		src: SASS_DIR + '/sub/blocks/*',
		dest: ASSETS_DIR + '/css/blocks/'
	},
	fonts: {
		src: [ SASS_DIR + '/fonts/*' ],
		dest: ASSETS_DIR + '/css/fonts/'
	},
	images: {
		src: [ 'images/**/*.**' ],
		dest: ASSETS_DIR + '/images/'
	},
	translation: {
		domain: 'neoito',
		package: 'neoito',
		team: 'neoito',
		dest: './languages/neoito.pot'
	}
};

/*================================= Tasks =================================*/

// Triggers Browser reload
function previewReload(done){
  console.log("\n\t" + logSymbols.info,"Reloading Browser Preview.\n");
  browserSync.reload();
  done();
}

function styles(){
  const tailwindcss = require('tailwindcss'); 
  return src(options.paths.src.css, { sourcemaps: options.debug ? true : false })
	.pipe(plumber())
  	.pipe(sass().on('error', sass.logError))
    .pipe(postcss([
      tailwindcss(options.config.tailwindjs),
      require('autoprefixer'),
    ]))
    .pipe(rename('app.css'))
	.pipe(dest(options.paths.dist.css))
	.pipe(rename('app.min.css'))
	.pipe(cleanCSS())
	.pipe(dest(options.paths.dist.css, { sourcemaps: options.debug ? '.' : false }));
}
function block_styles(){
  const tailwindcss = require('tailwindcss'); 
  return src(options.block_style.src, { sourcemaps: options.debug ? true : false })
	.pipe(plumber())
  	.pipe(sass().on('error', sass.logError))
    .pipe(postcss([
      tailwindcss(options.config.tailwindjs),
      require('autoprefixer'),
    ]))
	.pipe(cleanCSS())
	.pipe(dest(options.block_style.dest, { sourcemaps: options.debug ? '.' : false }));
}

function scripts(){
  return src(options.paths.src.js, { sourcemaps: options.debug ? true : false })
	.pipe(concat({ path: 'app.js'}))
	.pipe(dest(options.paths.dist.js))
	.pipe(rename('app.min.js'))
	.pipe(uglify())
	.pipe(dest(options.paths.dist.js, { sourcemaps: options.debug ? '.' : false }));
}

function watchFiles(){
  watch([options.config.tailwindjs, `${SASS_DIR}/**/*.scss`],series(styles, block_styles, previewReload));
  watch(`${SCRIPTS_DIR}/**/*.js`, series(scripts, previewReload));
  watch(options.images.src, series('images', previewReload));
  console.log("\n\t" + logSymbols.info,"Watching for Changes..\n");
}

function clearAssets(){
  console.log("\n\t" + logSymbols.info,"Cleaning dist folder for fresh start.\n");
  return del([options.paths.dist.base]);
}

function buildFinish(done){
  console.log("\n\t" + logSymbols.info,`Production build is complete.\n`);
  done();
}

/**
 * Extra Tasks
 */
task('fonts', function() {
	return src(options.fonts.src).pipe(dest(options.fonts.dest));
});

task('images', function() {
	return src(options.images.src).pipe(dest(options.images.dest));
});

task('imagemin', () =>
	src(options.images.src)
		.pipe(
			imagemin({
				progressive: true,
				optimizationLevel: 7,
				svgoPlugins: [ { removeViewBox: false } ]
				/*use: [pngquant(), jpegtran(), optipng(), gifsicle()]*/
			})
		)
		.pipe(dest(options.images.dest))
);

// Generates pot file for plugin localization.
let i18n = () => {
	return src([ './**/*.php', '!./build/**/*.php', '!./vendor/**/*.php' ])
		.pipe(sort())
		.pipe(
			wpPot({
				domain: options.translation.domain,
				package: options.translation.package,
				team: options.translation.team
			})
		)
		.pipe(dest(options.translation.dest));
};
i18n.description = 'Generates pot file for plugin localization';
task('translate', i18n);

/**
 * Main Tasks
 */
exports.default = series(
  clearAssets,
  parallel(styles, block_styles, scripts, 'images', 'fonts'),
  watchFiles
);

// exports.prod = series(
//   clearAssets,
//   parallel(styles, block_styles, scripts, 'images', 'imagemin', 'fonts', 'translate'),
//   buildFinish
// );

exports.prod = series(
	clearAssets,
	parallel(styles, block_styles, scripts, 'images', 'fonts', 'translate'),
	buildFinish
  );