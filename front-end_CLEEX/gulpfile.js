let project_folder = "../build/public/cleextpl";
let source_folder = "src";

let fs = require('fs');

let path = {
    build: {
        html: "../build/public/",
        pages: "../build/public/",
        css: project_folder + "/css/",
        js: project_folder + "/js/",
        img: project_folder + "/img/",
        fonts: project_folder + "/fonts/",
        public: project_folder,
    },
    src: {
        html: source_folder + "/index.html",
        pages: [source_folder + "/**/*.html", "!" + source_folder + "/**/_*.html", "!" + source_folder + "/**/index.html" ],
        css: source_folder + "/scss/style.scss",
        js: source_folder + "/js/*.js",
        img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}",
        fonts: source_folder + "/fonts/*.ttf",
        public: source_folder + "/public/*.{ico,png,svg,json,webp}",
    },
    watch: {
        html: source_folder + "/**/*.html",
        pages: source_folder + "/**/*.html",
        css: source_folder + "/scss/**/*.scss",
        js: source_folder + "/js/**/*.js",
        img: source_folder + "/img/**/*.{jpg,png,svg,gif,ico,webp}",
        public: source_folder + "/public/*.{ico,png,svg,json,webp}",
    },
    clean: project_folder + "/"
};

let { src, dest } = require('gulp'),
    gulp = require('gulp'),
    webpack = require('webpack'),
    webpackStream = require('webpack-stream'),
    webpackConfig = require('./webpack.config.js'),
    babel = require('gulp-babel');
    browsersync = require("browser-sync").create(),
    fileinclude = require("gulp-file-include"),
    del = require("del"),
    scss = require("gulp-sass"),
    autoprefixer = require("gulp-autoprefixer"),
    group_media = require("gulp-group-css-media-queries"),
    clean_css = require("gulp-clean-css"),
    rename = require("gulp-rename"),
    uglify = require("gulp-uglify-es").default,
    imagemin = require("gulp-imagemin"),
    webp = require("gulp-webp"),
    webphtml = require("gulp-webp-html"),
    svgSprite = require("gulp-svg-sprite"),
    ttf2woff = require("gulp-ttf2woff"),
    ttf2woff2 = require("gulp-ttf2woff2"),
    fonter = require("gulp-fonter");

function browserSync(params) {
    browsersync.init({
        // server: {
        //     baseDir: "../build/public/",
        // },
        proxy: "http://localhost:8080/",
        port: 4000,
        notify: true,
    });
}

function html() {
    return src(path.src.html)
        .pipe(fileinclude())
        .pipe(dest(path.build.html))
        .pipe(browsersync.stream());
}

function pages() {
    return src(path.src.pages)
        .pipe(fileinclude())
        .pipe(dest(path.build.pages))
        .pipe(browsersync.stream());
}

function css() {
    return src(path.src.css)
        .pipe(
            scss({
                outputStyle: "expanded"
            })
        )
        .pipe(
            group_media()
        )
        .pipe(
            autoprefixer({
                overrideBrowserslist: ["last 4 versions"],
                cascade: true
            })
        )
        .pipe(dest(path.build.css))
        .pipe(clean_css())
        .pipe(
            rename({
                extname: ".min.css"
            })
        )
        .pipe(dest(path.build.css))
        .pipe(browsersync.stream());
}

function js() {
    return src(path.src.js)
        // .pipe(
        //     uglify()
        // )
        // .pipe(
        //     babel({
        //         presets: ['@babel/env']
        //     })
        // )
        .pipe(webpackStream(webpackConfig), webpack)
        // .pipe(
        //     rename({
        //         extname: ".min.js"
        //     })
        // )
        .pipe(dest(path.build.js))
        .pipe(browsersync.stream());
}

function images() {
    return src(path.src.img)
        .pipe(
            webp({
                quality: 95
            })
        )
        .pipe(dest(path.build.img))
        .pipe(src(path.src.img))
        .pipe(
            imagemin({
                progressive: true,
                svgoPlugins: [{ removeViewBox: true }],
                interlaced: true,
                optimizationlevel: 5 // 0 ???? 7
            })
        )
        .pipe(dest(path.build.img))
        .pipe(browsersync.stream());
}

function fonts(params) {
    src(path.src.fonts)
        .pipe(ttf2woff())
        .pipe(dest(path.build.fonts));
    return src(path.src.fonts)
        .pipe(ttf2woff2())
        .pipe(dest(path.build.fonts));
}

function public() {
   return src(path.src.public)
   .pipe(dest(path.build.public))
   .pipe(browsersync.stream());
}
/* ???????????????? ?????????????????????? ??????????????*/
gulp.task('otf2ttf', function () {
    return src([source_folder + '/fonts/*.otf'])
        .pipe(fonter({
            formats: ['ttf']
        }))
        .pipe(dest(source_folder + '/fonts/'));
});

gulp.task('svgSprite', function () {
    return gulp.src([source_folder + '/iconsprite/*.svg'])
        .pipe(svgSprite({
            mode: {
                stack: {
                    sprite: "../icons/icons.svg",
                    example: true
                },
            },
        }
        ))
        .pipe(dest([source_folder + '/img']));
});
/* ?????????? ???????????????? ?????????????????????? ?????????????? */

function fontsStyle(params) {
    let file_content = fs.readFileSync(source_folder + '/scss/fonts.scss');
    if (file_content == '') {
        fs.writeFile(source_folder + '/scss/fonts.scss', '', cb);
        return fs.readdir(path.build.fonts, function (err, items) {
            if (items) {
                let c_fontname;
                for (var i = 0; i < items.length; i++) {
                    let fontname = items[i].split('.');
                    fontname = fontname[0];
                    if (c_fontname != fontname) {
                        fs.appendFile(source_folder + '/scss/fonts.scss', '@include font("' + fontname + '", "' + fontname + '", "400", "normal");\r\n', cb)
                    }
                    c_fontname = fontname;
                }
            }
        });
    }
}

function cb() {

}

function watchFiles(params) {
    gulp.watch([path.watch.html], html);
    gulp.watch([path.watch.pages], pages);
    gulp.watch([path.watch.css], css);
    gulp.watch([path.watch.js], js);
    gulp.watch([path.watch.img], images);
    gulp.watch([path.watch.public], public);
}

function clean(params) {
    return del(path.clean, {force: true})
}

let build = gulp.series(clean, gulp.parallel(js, css, html, pages, images, fonts, public), fontsStyle);
let watch = gulp.parallel(build, watchFiles, browserSync);

exports.fontsStyle = fontsStyle;
exports.fonts = fonts;
exports.public = public;
exports.images = images;
exports.js = js;
exports.css = css;
exports.html = html;
exports.pages = pages;
exports.build = build;
exports.watch = watch;
exports.default = watch;