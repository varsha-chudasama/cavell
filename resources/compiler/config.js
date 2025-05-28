module.exports = {
  context: 'assets',
  entry: {
    styles: './styles/main.scss',
    scripts: './scripts/main.js',
  },
  devtool: 'cheap-module-eval-source-map',
  outputFolder: '../assets',
  publicFolder: 'assets',
  proxyTarget: 'http://localhost:10018/',
  watch: [
    '../**/*.php'
  ]
}
