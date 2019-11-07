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
        {from: './assets/static', to: 'static'}
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
    .addEntry('Base/propList', './assets/js/Base/propList.js')
    .addEntry('Base/pessoaList', './assets/js/Base/pessoaList.js')
    .addEntry('Base/categoriaPessoaList', './assets/js/Base/categoriaPessoaList.js')
    .addEntry('Base/pessoaForm', './assets/js/Base/pessoaForm.js')

    .addEntry('Security/userList', './assets/js/Security/userList.js')
    .addEntry('Security/groupList', './assets/js/Security/groupList.js')
    .addEntry('Security/roleList', './assets/js/Security/roleList.js')

    .addEntry('Config/configList', './assets/js/Config/configList.js')
    .addEntry('Config/appList', './assets/js/Config/appList.js')
    .addEntry('Config/programList', './assets/js/Config/programList.js')
    .addEntry('Config/entMenuList', './assets/js/Config/entMenuList.js')
    .addEntry('Config/entMenuLocatorList', './assets/js/Config/entMenuLocatorList.js')




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
    .configureBabel(() => {
    }, {
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
