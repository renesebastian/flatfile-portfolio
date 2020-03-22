var webpack = require("webpack");

module.exports = function(env) {
  
  const CleanWebpackPlugin = require('clean-webpack-plugin');
  const ExtractTextPlugin = require("extract-text-webpack-plugin");
  
  //first clean up public js and css folders
  const pathsToClean = [
    __dirname + '/public/js',
    __dirname + '/public/css'
  ];

  const cleanOptions = {
    verbose: true,
    dry: false
  };

  const plugins = [
      new CleanWebpackPlugin(pathsToClean, cleanOptions),
      new ExtractTextPlugin({ 
          filename: "../css/mq.css" 
      })
  ];

  return {
    //config input files (js and scss can be combined)
    entry: {
        'mq': [
            __dirname + "/assets/js/mq.js",
            __dirname + "/assets/sass/mq.scss"
        ],
    } ,

    //entry point webpack app:
    output: {
        path: __dirname + "/public/js",
        filename: "[name].js"
    },

    module: {
      rules: [
        {
          //regex so it can handle both css and scss
          test: /\.(s*)css$/,
          use: ExtractTextPlugin.extract({
            fallback: "style-loader",

            //npm modules which will be used to process the css
            use: ["css-loader", "sass-loader", "postcss-loader"]
          })
        }
      ]
    },
    plugins
  };
};