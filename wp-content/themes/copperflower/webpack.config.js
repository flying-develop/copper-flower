const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const { WebpackManifestPlugin } = require('webpack-manifest-plugin');
var path = require('path');

// change these variables to fit your project
const jsPath= './js';
const cssPath = './css';
const outputPath = 'dist';
const localDomain = 'http://cvetok.zz';
const entryPoints = {
  // 'app' is the output name, people commonly use 'bundle'
  // you can have more than 1 entry point
  'app': jsPath + '/app.js',
  'front': jsPath + '/pages/front.js',
  'become': jsPath + '/pages/become.js',
  'news': jsPath + '/pages/news.js',
  'gallery': jsPath + '/pages/gallery.js',
  'movie': jsPath + '/pages/movie.js',
  'about': jsPath + '/pages/about.js',
  'participants': jsPath + '/pages/participants.js',
  'jury': jsPath + '/pages/jury.js',
  'partners': jsPath + '/pages/partners.js',
  'projects': jsPath + '/pages/projects.js',
  'page': jsPath + '/pages/page.js'
};

module.exports = {
  entry: entryPoints,
  output: {
    path: path.resolve(__dirname, outputPath),
    filename: '[name].[contenthash].js',
    clean: true
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: '[name].[contenthash].css',
    }),

    new WebpackManifestPlugin({
      publicPath: '/'
    }),

    // Uncomment this if you want to use CSS Live reload
    
    /*new BrowserSyncPlugin({
      proxy: localDomain,
      files: [ outputPath + '/*.css' ],
      injectCss: true,
    }, { reload: false, }),*/
    
  ],
  module: {
    rules: [
      {
        test: /\.s?[c]ss$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          'sass-loader',
          'postcss-loader'
        ],
      },
      {
        test: /\.sass$/i,
        use: [
          MiniCssExtractPlugin.loader,
          'css-loader',
          {
            loader: 'sass-loader',
            options: {
              sassOptions: { indentedSyntax: true },
            },
          },
        ],
      },
      {
        test: /\.(jpg|jpeg|png|gif|woff|woff2|eot|ttf|svg)$/i,
        use: 'url-loader?limit=1024',
      },
    ]
  },
};