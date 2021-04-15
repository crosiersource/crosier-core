/* eslint-disable */
const Encore = require('@symfony/webpack-encore');
const path = require('path');

// Manually configure the runtime environment if not already configured yet by the "encore" command.
// It's useful when you use tools that rely on webpack.config.js file.
if (!Encore.isRuntimeEnvironmentConfigured()) {
  Encore.configureRuntimeEnvironment(process.env.NODE_ENV || 'dev');
}

// noinspection NpmUsedModulesInstalled
const webpack = require('webpack');

const CopyWebpackPlugin = require('copy-webpack-plugin');

// noinspection JSValidateTypes
Encore
  .setOutputPath('public/build/')
  .setPublicPath('/build')
  .autoProvidejQuery()
  .addPlugin(new CopyWebpackPlugin({
    patterns: [
      {from: "./assets/static", to: "static"},
    ],
  }))
  // --------------------------------------------
  .addEntry('crosier/layout', './assets/js/crosier/layout.js')
  .addEntry('crosier/layout-vue', './assets/js/crosier/layout-vue.js')
  .addEntry('Base/diaUtil_list', './assets/js/Base/diaUtil_list.js')

  .addEntry('Security/userList', './assets/js/Security/userList.js')
  .addEntry('Security/groupList', './assets/js/Security/groupList.js')
  .addEntry('Security/roleList', './assets/js/Security/roleList.js')

  .addEntry('Config/appList', './assets/js/Config/appList.js')
  .addEntry('Config/appForm', './assets/js/Config/appForm.js')
  .addEntry('Config/entMenuList', './assets/js/Config/entMenuList.js')
  .addEntry('Config/entMenuLocatorList', './assets/js/Config/entMenuLocatorList.js')
  .addEntry('Config/syslogList', './assets/js/Config/syslogList.js')
  // --------------------------------------------

  .addEntry("Config/App/app_form", "./assets/js/apps/Config/App/app_form.js")
  .addEntry("Config/App/app_list", "./assets/js/apps/Config/App/app_list.js")


  .splitEntryChunks()
  .enableSingleRuntimeChunk()
  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = 'usage';
    config.corejs = 3;
  })
  .enableVueLoader(function (options) {
    options.loaders = {
      vue: {loader: 'babel-loader'}
    };
  }, {version: 3})
  .addAliases({
    '@': path.resolve(__dirname, 'assets', 'js'),
    styles: path.resolve(__dirname, 'assets', 'scss'),
  })
  .enableEslintLoader({
    configFile: "./.eslintrc.js",
  })
  .configureCssLoader((config) => {
    if (!Encore.isProduction() && config.modules) {
      config.modules.localIdentName = '[name]_[local]_[hash:base64:5]';
    }
  })
  .enableSassLoader()
  .addLoader({
    test: /\.js$/,
    loader: 'babel-loader',
    options: {
      plugins: [require("@babel/plugin-proposal-optional-chaining")]
    },
    exclude: file => (
      /node_modules/.test(file) &&
      !/\.vue\.js/.test(file)
    )
  })
;

module.exports = Encore.getWebpackConfig();
