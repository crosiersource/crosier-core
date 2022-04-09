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

  .addEntry('Config/entMenuList', './assets/js/Config/entMenuList.js')
  .addEntry('Config/entMenuLocatorList', './assets/js/Config/entMenuLocatorList.js')
  
  
  
  // acessos pelo "/v/*"
  .addEntry("cfg/app/form", "./assets/js/apps/Config/App/form.js")
  .addEntry("cfg/app/list", "./assets/js/apps/Config/App/list.js")
  .addEntry("cfg/syslog/list", "./assets/js/apps/Config/Syslog/list.js")
  
  .addEntry("cfg/estabelecimento/list", "./assets/js/apps/Config/Estabelecimento/list.js")
  .addEntry("cfg/estabelecimento/form", "./assets/js/apps/Config/Estabelecimento/form.js")

  .addEntry("cfg/pushMessages/assinatura", "./assets/js/apps/Config/PushMessages/assinatura.js")

  .addEntry("sec/group/form", "./assets/js/apps/Security/Group/form.js")
  .addEntry("sec/group/list", "./assets/js/apps/Security/Group/list.js")

  .addEntry("sec/role/form", "./assets/js/apps/Security/Role/form.js")
  .addEntry("sec/role/list", "./assets/js/apps/Security/Role/list.js")

  .addEntry("sec/user/form", "./assets/js/apps/Security/User/form.js")
  .addEntry("sec/user/list", "./assets/js/apps/Security/User/list.js")
  .addEntry("sec/user/confirmUser", "./assets/js/apps/Security/User/confirmUser.js")
  .addEntry("sec/user/setPassword", "./assets/js/apps/Security/User/setPassword.js")
  
  
  .addEntry("tdc", "./assets/js/apps/Base/TestesDeComponentes/form.js")

  // --------------------------------------------

  .splitEntryChunks()

  // se deixar habilitado não funciona o datatables e o select2 (parece que começa a fazer 2 chamadas para montá-los no código)
  .disableSingleRuntimeChunk()

  .cleanupOutputBeforeBuild()
  .enableBuildNotifications()
  .enableSourceMaps(!Encore.isProduction())
  .enableVersioning(Encore.isProduction())
  .configureBabelPresetEnv((config) => {
    config.useBuiltIns = 'usage';
    config.corejs = 3;
  })
  .configureBabel((config) => {
    config.plugins.push('@babel/plugin-proposal-class-properties');
  })
  .enableVueLoader(function (options) {
    options.loaders = {
      // vue: {loader: 'babel-loader'}
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


config = Encore.getWebpackConfig();
config.watchOptions = {
  aggregateTimeout: 1500,
};

module.exports = config;

