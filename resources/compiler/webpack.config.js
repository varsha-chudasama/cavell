const path = require('path');
const webpack = require('webpack');

const MiniCssExtractWebpackPlugin = require('mini-css-extract-plugin');
const CopyWebpackPlugin = require('copy-webpack-plugin');
const { CleanWebpackPlugin } = require('clean-webpack-plugin');
const NonJsEntryCleanupPlugin = require('./non-js-entry-cleanup-plugin');
const FriendlyErrorsWebpackPlugin = require('friendly-errors-webpack-plugin');

const { context, entry, devtool, outputFolder, publicFolder } = require('./config');

const HMR = require('./hmr');
const getPublicPath = require('./publicPath');

module.exports = (options) => {
  const { dev } = options;
  const hmr = HMR.getClient();

  //console.log(getPublicPath(outputFolder));

  return {
    mode: dev ? 'development' : 'production',
    devtool: dev ? devtool : false,
    context: path.resolve(context),
    entry: {
      'styles/main': dev ? [hmr, entry.styles] : entry.styles,
      'scripts/main': dev ? [hmr, entry.scripts] : entry.scripts,
    },
    output: {
      path: path.resolve(outputFolder),
      publicPath: getPublicPath(outputFolder),
      filename: '[name].js'
    },
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /(node_modules|bower_components)\/(?!(dom7|ssr-window|swiper)\/).*/,
          use: [
            ...(dev ? [{ loader: 'cache-loader' }] : []),
            { loader: 'babel-loader' }
          ]
        },
        {
          test: /\.(sa|sc|c)ss$/,
          use: [
            ...(dev ? [{ loader: 'cache-loader' }, { loader: 'style-loader' }] : [MiniCssExtractWebpackPlugin.loader]),
            { loader: 'css-loader' },
            { loader: 'resolve-url-loader' },
            { loader: 'sass-loader' },
          ]
        },
        {
          test: /\.woff$|\.woff2?$|\.ttf$|\.eot$|\.otf$/,
          loader: 'file-loader',
          options: {
            name: getPublicPath(outputFolder) + 'fonts/[name].[ext]',
            publicPath: function (url) {
              console.log('modifier', url);
              console.log('public', getPublicPath(outputFolder));

              return url.replace('../', '');
            },
          },
        },
        {
          test: /\.(png|jpe?g|gif|svg|ico|mp4|webm)$/,
          use: [
            {
              loader: 'file-loader',
              options: {
                name: '[path][name].[ext]',
              }
            }
          ]
        }
      ]
    },
    plugins: [
      ...(dev ? [
        new webpack.HotModuleReplacementPlugin(),
        new FriendlyErrorsWebpackPlugin()
      ] : [
        new MiniCssExtractWebpackPlugin({
          filename: '[name].css'
        }),
        new NonJsEntryCleanupPlugin({
          context: 'styles',
          extensions: 'js',
          includeSubfolders: true
        }),
        new CopyWebpackPlugin([
          {
            from: path.resolve(`${context}/**/*`),
            to: path.resolve(outputFolder),
          }
        ], {
          ignore: ['*.js', '*.ts', '*.scss', '*.css']
        })
      ])
    ]
  }
}
