const gulp = require("gulp");
const { src, dest, watch, parallel, series } = require("gulp");
const browsersync = require("browser-sync").create();
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const pug = require("gulp-pug");
const sass = require("gulp-dart-sass"); // gulp-sass から gulp-dart-sass に変更しています。
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssnano = require("cssnano");
const uglify = require("gulp-uglify");
const rename = require("gulp-rename");
const babel = require("gulp-babel");
const cache = require("gulp-cached");
const progeny = require("gulp-progeny");
const replace = require("gulp-replace");
const sassGlob = require("gulp-sass-glob");
const beautify = require("gulp-html-beautify");

const paths = {
  styles: {
    src: "src/sass/**/*.scss",
    dest: "public/",
  },
  scripts: {
    src: "src/js/**/*.js",
    dest: "public/js/",
  },
  pug: {
    src: "src/pug/**/*.pug",
    dest: "public/",
  },
  assets: {
    src: ["src/assets/**", "!src/assets/js/**"],
    dest: "public/",
  },
};

function css() {
  return src(paths.styles.src)
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(sassGlob())
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(dest(paths.styles.dest))
    .pipe(browsersync.stream());
}

function scripts() {
  return src(paths.scripts.src)
    .pipe(plumber())
    .pipe(babel({ presets: ["@babel/env"] }))
    .pipe(uglify())
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest(paths.scripts.dest));
}

function pugTask() {
  return (
    src([paths.pug.src, "!src/pug/**/_*.pug"])
      .pipe(
        plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
      )
      .pipe(cache())
      .pipe(progeny())
      .pipe(
        pug({
          pretty: true,
          filters: {
            php: function (text, options) {
              return "<?php " + text + " ?>";
            },
          },
        })
      )
      //- &lt;を<に置換
      .pipe(replace(/&lt;/g, "<"))
      //- &gt;
      .pipe(replace(/&gt;/g, ">"))
      .pipe(replace("{#theme}", ""))
      .pipe(
        beautify({
          indent_size: 2,
          indent_char: " ",
          indent_with_tabs: false,
        })
      )
      .pipe(rename({ extname: ".php" }))
      .pipe(dest(paths.pug.dest))
  );
}

function assetsCopy() {
  return src(paths.assets.src, { base: "src/assets" }).pipe(
    dest(paths.assets.dest)
  );
}

function browserSync(done) {
  browsersync.init({
    proxy: "saji.local", // あなたのローカル開発環境の設定に合わせてください。
    files: [
      paths.styles.dest + "/**",
      paths.scripts.dest + "/**",
      paths.pug.dest + "/**",
    ],
    port: 5014,
  });
  done();
}

function reload(done) {
  browsersync.reload();
  done();
}

function watchFiles() {
  watch(paths.styles.src, series(css, reload));
  watch(paths.scripts.src, series(scripts, reload));
  watch(paths.pug.src, series(pugTask, reload));
  watch(paths.assets.src, series(assetsCopy, reload));
}

const build = parallel(css, scripts, pugTask, assetsCopy);
const watcher = parallel(watchFiles, browserSync);

exports.default = series(build, watcher);
