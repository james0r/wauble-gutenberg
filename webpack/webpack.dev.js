const path = require("path")
const { merge } = require("webpack-merge")
const common = require("./webpack.common.js")
const BrowserSyncPlugin = require("browser-sync-webpack-plugin")
const CopyPlugin = require("copy-webpack-plugin")
const { CleanWebpackPlugin } = require("clean-webpack-plugin")

module.exports = merge(common, {
  mode: "development",
  entry: path.resolve(__dirname, "../src/index.js"),
  module: {
    rules: [
      {
        test: /\.(js|jsx)$/,
        exclude: /node_modules/,
        use: ["babel-loader"]
      },
      {
        test: /\.(s(a|c)ss)$/,
        use: ["style-loader", "css-loader", "sass-loader"]
      },
      {
        test: /\.(woff(2)?|ttf|eot)$/,
        type: "asset/resource",
        generator: {
          filename: "./fonts/[name][ext]"
        }
      }
    ]
  },
  resolve: {
    extensions: ["*", ".js"]
  },
  output: {
    path: path.resolve(__dirname, "../dist"),
    filename: "js/frontend-bundle.js"
  },
  plugins: [
    new BrowserSyncPlugin({
      host: "localhost",
      port: 3000,
      proxy: "http://wauble-gutenberg.mamp/",
      open: false,
      files: [
        {
          match: ["**/*.php", "./src/scss/modules/*.scss"],
          fn: function (event, file) {
            if (event === "change") {
              const bs = require("browser-sync").get("bs-webpack-plugin")
              bs.reload()
            }
          }
        }
      ]
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
      cleanOnceBeforeBuildPatterns: ["**/*", "!static/**", "!css/**"]
    })
  ]
})
