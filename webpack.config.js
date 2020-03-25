var webpack = require("webpack");

module.exports = function(env) {
  //load plugins
  const CleanWebpackPlugin = require("clean-webpack-plugin");
  const CopyWebpackPlugin = require("copy-webpack-plugin");
  const ExtractTextPlugin = require("extract-text-webpack-plugin");

  //declear folders that need to be cleaned up before compiling
  const pathsToClean = [__dirname + "/public/css"];

  //cleanup options
  const cleanOptions = {
    verbose: true,
    dry: false
  };

  const plugins = [
    //time to clean up!
    new CleanWebpackPlugin(pathsToClean, cleanOptions),

    //and write the compliled sass file to a specific folder
    new ExtractTextPlugin({
      filename: "../css/rene-io-20.css"
    })
  ];

  return {
    //config input files
    entry: {
      reneio: [__dirname + "/assets/sass/reneio.scss"]
    },

    //entry point voor webpack app (if global js is needed):
    output: {
      path: __dirname + "/public/js",
      filename: "[name].js"
    },

    module: {
      rules: [
        {
          test: /\.(s*)css$/,
          use: ExtractTextPlugin.extract({
            fallback: "style-loader",

            //chain of npm modules to compile sass
            use: ["css-loader", "sass-loader", "postcss-loader"]
          })
        }
      ]
    },
    plugins
  };
};
