// gulpプラグインの読み込み
const gulp = require("gulp");

const rename = require('gulp-rename');

// ----------------------------
// SASSコンパイル
// ----------------------------

// Sassをコンパイルするプラグインの読み込み
const sass = require('gulp-sass');
sass.compiler = require('sass');

const postcss = require('gulp-postcss');
const plumber = require('gulp-plumber');
const autoprefixer = require('autoprefixer');
const cleanCSS = require('gulp-clean-css');

gulp.task('sass', function (done) {
    // .scssファイルを取得
    gulp.src('gulp/**/*.scss')
        .pipe(plumber())
        // sassのコンパイルを実行、error以降Sassのコンパイルエラーを表示(これがないと自動的に止まってしまう)
        .pipe(sass({ outputStyle: 'expanded' }))
        .pipe(postcss([
            autoprefixer({
              cascade: false
            })
        ]))     
        .pipe(cleanCSS())
        .pipe(rename({
            extname: '.min.css'
        }))
        // cssフォルダー以下に保存
        .pipe(gulp.dest('assets/css'));
    done();
});

// ----------------------------
// babel
// ----------------------------

// gulp-babelの読み込み  
const babel = require("gulp-babel");
const uglify = require('gulp-uglify');
 
gulp.task('babel', function (done) {
    // es6ファイルが変更されるたびにトランスパイルを実行  
    //   return gulp.watch('gulp/es6/*.es6', function () {
        // return (
        // トランスパイルされる対象  
        gulp.src('gulp/es6/*.es6')
        .pipe(babel({
            // インストールしたプリセットを指定  
            presets: ["@babel/preset-env"]
        }))
        .pipe(uglify())
        .pipe(rename(
            {
             extname: '.min.js'
            }
        ))
        // トランスパイル後のjsの出力先を指定  
        .pipe(gulp.dest('assets/js'));
        // )
        done();
});

// ----------------------------
// 画像圧縮
// ----------------------------

const imagemin = require('gulp-imagemin');
const mozjpeg = require('imagemin-mozjpeg');
const changed = require('gulp-changed');
const pngquant = require('imagemin-pngquant');

// 画像圧縮タスク
const dir = 'gulp/imgs';
const distDir = 'assets/imgs'

gulp.task('images', () => {

  return gulp.src(dir + '/**/*.+(jpg|jpeg|JPG|png|PNG|gif|svg)')
    .pipe(changed(distDir)) // gulp/imgフォルダの中身と、出力先のimgフォルダの中身を比較して異なるものだけ処理(新しく追加されたファイル等)
    .pipe(imagemin([
        pngquant('65-80'),
        mozjpeg({
            quality: 85, // 画質 こちらも0から100まで指定できるが、pngquantと違って65-80のように幅を持って指定はできない。1つの数字のみ。
            progressive: true // baselineとprogressiveがある。baselineよりprogressiveのほうがエンコードは遅いが圧縮率は高い。
        }),
        imagemin.svgo(),
        imagemin.optipng(),
        imagemin.gifsicle()
    ]))
    .pipe(gulp.dest(distDir)) // assets/imgsファイルに保存(出力)
});

// ----------------------------
// ブラウザの自動リロード
// ----------------------------

const browserSync = require('browser-sync');

const browserSyncOption = {
    files: ['./**/*.php'],
    proxy: 'http://localhost:8000/',
    reloadDelay: 2000
};
gulp.task('bs-sync', function (done) {
    browserSync.init(browserSyncOption);
    done();
});
gulp.task('bs-reload', function (done) {
    browserSync.reload();
    done();
});

// ----------------------------
// watch
// ----------------------------

gulp.task('default', gulp.series(gulp.parallel('sass', 'babel', 'bs-sync'), function () {
    gulp.watch('gulp/**/*.scss', gulp.task('sass'));
    gulp.watch('gulp/es6/*.es6', gulp.task('babel'));
    // gulp.watch( dir + '/**/*.+(jpg|jpeg|png|gif)', gulp.task('images'))
    // gulp.watch('./**/*.php', gulp.task('bs-reload'));
    // gulp.watch('./assets/css/scss/style.min.css', gulp.task('bs-reload'));
    // gulp.watch('./assets/js/script.min.js', gulp.task('bs-reload'));
    // gulp.watch('./assets/*.js', gulp.task('bs-reload'));
}));