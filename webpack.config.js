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
    .createSharedEntry('bse_layout', './assets/js/bse/layout.js')
    .addEntry('bse/enderecoForm', './assets/js/bse/enderecoForm.js')

    .addEntry('sec/userList', './assets/js/sec/userList.js')
    .addEntry('sec/groupList', './assets/js/sec/groupList.js')
    .addEntry('sec/roleList', './assets/js/sec/roleList.js')

    .addEntry('cfg/configList', './assets/js/cfg/configList.js')
    .addEntry('cfg/appList', './assets/js/cfg/appList.js')
    .addEntry('cfg/entMenuList', './assets/js/cfg/entMenuList.js')

    .addEntry('fis/emissaoNFe/form', './assets/js/fis/emissaoNFe/form.js')
    .addEntry('fis/emissaoNFe/list', './assets/js/fis/emissaoNFe/list.js')

    .addEntry('est/fornecedorList', './assets/js/est/fornecedorList.js')
    .addEntry('est/fornecedorForm', './assets/js/est/fornecedorForm.js')
    .addEntry('est/produtoList', './assets/js/est/produtoList.js')
    .addEntry('est/produtoForm', './assets/js/est/produtoForm.js')
    .addEntry('est/produtoForm_ocProduct', './assets/js/est/produtoForm_ocProduct.js')
    .addEntry('est/produtosOCCompare', './assets/js/est/produtosOCCompare.js')
    .addEntry('est/consultaPrecos', './assets/js/est/consultaPrecos.js')

    .addEntry('crm/clienteList', './assets/js/crm/clienteList.js')
    .addEntry('crm/clienteForm', './assets/js/crm/clienteForm.js')

    .addEntry('fin/carteiraList', './assets/js/fin/carteiraList.js')
    .addEntry('fin/bancoList', './assets/js/fin/bancoList.js')
    .addEntry('fin/grupoList', './assets/js/fin/grupoList.js')
    .addEntry('fin/grupoItemList', './assets/js/fin/grupoItemList.js')
    .addEntry('fin/grupoItemListMovs', './assets/js/fin/grupoItemListMovs.js')
    .addEntry('fin/centroCustoList', './assets/js/fin/centroCustoList.js')
    .addEntry('fin/modoList', './assets/js/fin/modoList.js')
    .addEntry('fin/bandeiraCartaoList', './assets/js/fin/bandeiraCartaoList.js')
    .addEntry('fin/operadoraCartaoList', './assets/js/fin/operadoraCartaoList.js')
    .addEntry('fin/registroConferenciaList', './assets/js/fin/registroConferenciaList.js')
    .addEntry('fin/regraImportacaoLinhaList', './assets/js/fin/regraImportacaoLinhaList.js')
    .addEntry('fin/movimentacaoList', './assets/js/fin/movimentacaoList.js')
    .addEntry('fin/movimentacaoExtratoList', './assets/js/fin/movimentacaoExtratoList.js')
    .addEntry('fin/movimentacaoRecorrentesList', './assets/js/fin/movimentacaoRecorrentesList.js')
    .addEntry('fin/movimentacaoCaixaList', './assets/js/fin/movimentacaoCaixaList.js')
    .addEntry('fin/movimentacaoImport', './assets/js/fin/movimentacaoImport.js')
    .addEntry('fin/movimentacaoForm', './assets/js/fin/movimentacaoForm.js')
    .addEntry('fin/parcelamentoForm', './assets/js/fin/parcelamentoForm.js')

    .addEntry('ven/vendasPorPeriodo', './assets/js/ven/vendasPorPeriodo.js')


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

    // enables Sass/SCSS support
    //.enableSassLoader()

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you're having problems with a jQuery plugin
    //.autoProvidejQuery()
;

module.exports = Encore.getWebpackConfig();
