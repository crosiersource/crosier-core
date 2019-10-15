var Encore = require('@symfony/webpack-encore');

const webpack = require('webpack');

const CopyWebpackPlugin = require('copy-webpack-plugin');

Encore
    // directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // public path used by the web server to access the output path
    .setPublicPath('/build')
    // only needed for CDN's or sub-directory deploy
    //.setManifestKeyPrefix('build/')

    // fixes modules that expect jQuery to be global
    .autoProvidejQuery()
    .addPlugin(new CopyWebpackPlugin([
        // copies to {output}/static
        { from: './assets/static', to: 'static' }
    ]))
    // o summmernote tem esta dependência, mas não é necessária
    .addPlugin(new webpack.IgnorePlugin(/^codemirror$/))
    .enableSassLoader()
    /*
     * ENTRY CONFIG
     *
     * Add 1 entry for each "page" of your app
     * (including one that's included on every page - e.g. "app")
     *
     * Each entry will result in one JavaScript file (e.g. app.js)
     * and one CSS file (e.g. app.css) if you JavaScript imports CSS.
     */
    .createSharedEntry('crosier/layout', './assets/js/crosier/layout.js')
    .addEntry('bse/propList', './assets/js/bse/propList.js')
    .addEntry('bse/pessoaList', './assets/js/bse/pessoaList.js')
    .addEntry('bse/categoriaPessoaList', './assets/js/bse/categoriaPessoaList.js')
    .addEntry('bse/pessoaForm', './assets/js/bse/pessoaForm.js')
    .addEntry('bse/pessoaEnderecoForm', './assets/js/bse/pessoaEnderecoForm.js')

    .addEntry('sec/userList', './assets/js/sec/userList.js')
    .addEntry('sec/groupList', './assets/js/sec/groupList.js')
    .addEntry('sec/roleList', './assets/js/sec/roleList.js')

    .addEntry('cfg/configList', './assets/js/cfg/configList.js')
    .addEntry('cfg/appList', './assets/js/cfg/appList.js')
    .addEntry('cfg/programList', './assets/js/cfg/programList.js')
    .addEntry('cfg/entMenuList', './assets/js/cfg/entMenuList.js')




    /*
     * FEATURE CONFIG
     *
     * Enable & configure other features below. For a full
     * list of features, see:
     * https://symfony.com/doc/current/frontend.html#adding-more-features
     */
    .cleanupOutputBeforeBuild()
    .enableBuildNotifications()
    .enableSourceMaps(!Encore.isProduction())
    // enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    .configureBabel(() => {}, {
        useBuiltIns: 'usage',
        corejs: 3
    })
    .enableSingleRuntimeChunk()
    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
