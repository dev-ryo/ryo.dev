const fs = require("fs");
const htmlmin = require("html-minifier");
const CleanCSS = require("clean-css");

module.exports = function(eleventyConfig) {
  eleventyConfig.addFilter("cssmin", function(code) {
    return new CleanCSS({}).minify(code).styles;
  });

  // eleventyConfig.addTransform("htmlmin", function(content, outputPath) {
  //   if( outputPath.endsWith(".html") ) {
  //     let minified = htmlmin.minify(content, {
  //       removeComments: true,
  //       collapseWhitespace: true
  //     });
  //     return minified;
  //   }
  //   return content;
  // });

  return {
    htmlTemplateEngine: "njk",
    markdownTemplateEngine: "njk",
    dir: {
      data: "./../data",
      input: "src/body",
      includes: "./../parts",
      // layouts: "./../parts/layouts",
      output: "public"
    }
  };
};
