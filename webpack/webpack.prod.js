const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const { merge } = require("webpack-merge");
const common = require("./webpack.common.js");
const CopyPlugin = require("copy-webpack-plugin");
const { CleanWebpackPlugin } = require("clean-webpack-plugin");

module.exports = merge(common, {
  mode: "production",
  entry: path.resolve(__dirname, "../src/index.js"),
  output: {
    path: path.resolve(__dirname, "../dist"),
    filename: "js/frontend-bundle.js"
  },
  devtool: "source-map",
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: ["babel-loader"]
      },
      {
        test: /\.(woff(2)?|ttf|eot)$/,
        type: "asset/resource",
        generator: {
          filename: "./fonts/[name][ext]"
        }
      },
      {
        test: /(s(a|c)ss)$/,
        use: [MiniCssExtractPlugin.loader, "css-loader", "sass-loader"],
      }
    ]
  },
  resolve: {
    extensions: ["*", ".js"]
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: ({ chunk }) =>
        chunk.name == "main" ? "css/frontend-bundle.css" : "css/" + chunk.name + ".css"
    }),
    new CopyPlugin({
      patterns: [
        { from: "src/admin", to: "admin" },
        { from: "src/fonts", to: "fonts" },
        { from: "src/images", to: "images" },
        { from: "src/vendor", to: "vendor" }
      ]
    }),
    new CleanWebpackPlugin({
      cleanOnceBeforeBuildPatterns: ["**/*", "!static/**"]
    })
  ]
});
