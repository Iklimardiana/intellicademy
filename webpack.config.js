const path = require('path');
const HtmlWebpackPlugin = require('html-webpack-plugin');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');

module.exports = {
  entry: './src/index.js',
  output: {
    path: path.resolve(__dirname, 'dist'),
    filename: 'main.js',
    clean: true,
  },
  mode: 'development',
  module: {
    rules: [
      {
        test: /\.s[ac]ss$/i,
        use: [MiniCssExtractPlugin.loader, 'css-loader', 'sass-loader'],
      },
    ],
  },
  devServer: {
    static: {
      directory: path.join(__dirname, './src'),
    },
    compress: true,
    port: 3000,
    liveReload: true,
  },
  plugins: [
    new HtmlWebpackPlugin({
      template: './src/template/admin-dashboard-courses-add.html',
      //   filename: 'admin-dashboard.html',
    }),
    new MiniCssExtractPlugin(),
  ],
};
