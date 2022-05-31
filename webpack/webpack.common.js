const path = require('path');
const TerserPlugin = require('terser-webpack-plugin');
const webpack = require('webpack')

module.exports = {
  entry: '../src/index.js',
  output: {
    filename: 'frontend-bundle.js',
    path: path.resolve(__dirname, 'dist'),
  },
  plugins: [
    new webpack.ProgressPlugin(),
  ],
  optimization: {
    minimizer: [new TerserPlugin({
      extractComments: false,
    })],
  },
};