const gulp = require("gulp");
const { src, dest, watch, series } = require("gulp");
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const sass = require("gulp-dart-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const sassGlob = require("gulp-sass-glob");
const sourcemaps = require("gulp-sourcemaps");

// パス設定
const paths = {
  scss: {
    src: "gulp/src/scss/**/*.scss",
    dest: "gulp/public/assets/css/",
    watch: "gulp/src/scss/**/*.scss"
  }
};

// SCSSのコンパイル
function compileScss() {
  return src(paths.scss.src)
    .pipe(plumber({ errorHandler: notify.onError("Error: <%= error.message %>") }))
    .pipe(sourcemaps.init())
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: "expanded" }).on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.scss.dest));
}

// 監視タスク
function watchScss() {
  watch(paths.scss.watch, compileScss);
}

// エクスポート
exports.scss = compileScss;
exports.watch = watchScss;
exports.default = series(compileScss, watchScss); 