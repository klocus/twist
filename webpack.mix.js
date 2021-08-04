let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix.js('assets/scripts/main.js', 'dist/scripts/');
mix.sass('assets/styles/main.scss', 'dist/styles/')
  .sass('assets/styles/login.scss', 'dist/styles/')
  .sass('assets/styles/admin.scss', 'dist/styles/')
  .sass('assets/styles/editor.scss', 'dist/styles/')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  });

mix.browserSync({
  proxy: 'my-site.test',
  files: [
    'blocks/**/*.php',
    'dist/**/*',
    '*.php',
    'inc/*.php',
    'templates/*.php',
    'views/*.php'
  ]
});
