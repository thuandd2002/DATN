// let mix = require('laravel-mix');
let mix = require(__dirname + '/node_modules/laravel-mix/src/index');
let webpack =  require('webpack');

/*
 |--------------------------------------------------------------------------
 | ADMIN
 |--------------------------------------------------------------------------
 */

mix.styles([
    'public/admin_static/css/core/coreui-icons.min.css',
    'public/admin_static/css/core/flag-icon.min.css',
    'public/admin_static/css/core/font-awesome.min.css',
    'public/admin_static/css/core/simple-line-icons.css',
    'public/admin_static/css/core/style.css',
    'public/admin_static/css/core/jquery-confirm.min.css',
    'public/admin_static/css/core/pace.min.css'
], 'public/css/backend.min.css');

mix.sass('public/admin_static/sass/base/_base.scss', 'public/css/base.min.css');
mix.sass('public/admin_static/sass/plugin/dropzone.scss', 'public/css/dropzone.min.css');

mix.js([
    'public/admin_static/js/core/jquery.min.js',
    'public/admin_static/js/core/bootstrap.min.js',
    'public/admin_static/js/core/coreui.min.js',
    'public/admin_static/js/init.js'
],'public/js/backend.min.js');


// mix.js([
//     'public/frontend_static/js/init.js'
// ],'public/js/frontend.min.js')
//     .autoload({
//         jquery: ['$', 'window.jQuery', 'jQuery'],
//     });

/*
 |--------------------------------------------------------------------------
 | END ADMIN
 |--------------------------------------------------------------------------
 */




/*
 |--------------------------------------------------------------------------
 | FRONTEND
 |--------------------------------------------------------------------------
 */

    // js fontend
    mix.js([
        'public/frontend_static/oto/js/jquery.min.js',
        'public/frontend_static/oto/js/bootstrap.min.js',
        'public/frontend_static/oto/js/main.js',
        'public/frontend_static/oto/js/site/home.js',
        'public/frontend_static/oto/js/site/product_detail.js',
        'public/frontend_static/js/init.js',
    ],'public/frontend_static/js/app.min.js')
        .autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

    // css trang home | css page insight home
    mix.sass('public/frontend_static/oto/scss/site/home.scss', 'public/frontend_static/css/home.min.css');
    mix.sass('public/frontend_static/oto/scss/insights/home_insight.scss', 'public/frontend_static/css/home_insight.min.css');

    // css product
    mix.sass('public/frontend_static/oto/scss/site/product.scss', 'public/frontend_static/css/product.min.css');
    mix.sass('public/frontend_static/oto/scss/insights/product_insight.scss', 'public/frontend_static/css/product_insight.min.css');

    // css trang product_detail
    mix.sass('public/frontend_static/oto/scss/site/product_detail.scss', 'public/frontend_static/css/product_detai.min.css');
    mix.sass('public/frontend_static/oto/scss/insights/product_detail_insight.scss', 'public/frontend_static/css/product_detail_insight.min.css');

    // css trang article
    mix.sass('public/frontend_static/oto/scss/site/article.scss', 'public/frontend_static/css/article.min.css');
    mix.sass('public/frontend_static/oto/scss/insights/article_detail_insight.scss', 'public/frontend_static/css/article_detail_insight.min.css');

    // css trang article_detail
    mix.sass('public/frontend_static/oto/scss/site/article_detail.scss', 'public/frontend_static/css/article_detail.min.css');


    // css trang about
    mix.sass('public/frontend_static/oto/scss/site/about.scss', 'public/frontend_static/css/about.min.css');
    mix.sass('public/frontend_static/oto/scss/insights/about_insight.scss', 'public/frontend_static/css/about_insight.min.css');



// js trang product_detail
    // mix.js([
    //     'public/frontend_static/oto/js/site/product_detail.js',
    // ],'public/frontend_static/js/product_detail.min.js')
    //     .autoload({
    //         jquery: ['$', 'window.jQuery', 'jQuery'],
    // });


mix.webpackConfig({
    plugins: [
        new webpack.ContextReplacementPlugin(/\.\/locale$/, 'empty-module', false, /js$/),
        new webpack.IgnorePlugin(/^codemirror$/),
    ],
    node: {
        fs: "empty"
    },
    module: {
        rules: [
            {
                test: /\.modernizrrc.js$/,
                use: [ 'modernizr-loader' ]
            },
            {
                test: /\.modernizrrc(\.json)?$/,
                use: [ 'modernizr-loader', 'json-loader' ]
            }
        ]
    },
    resolve: {
        alias: {
            "handlebars" : "handlebars/dist/handlebars.js",
            modernizr$: path.resolve(__dirname, "resources/assets/js/.modernizrrc")
        }
    },
});

if (mix.inProduction()) {
    mix.version();
}