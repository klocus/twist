let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix.js('src/scripts/main.js', 'dist')
  .sass('src/styles/main.scss', 'dist')
  .sass('src/styles/login.scss', 'dist')
  .sass('src/styles/admin.scss', 'dist')
  .sass('src/styles/editor.scss', 'dist')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  });

mix.browserSync({
  proxy: 'my-site.test',
  files: [
    'assets/**/*',
    'dist/*',
    'inc/**/*',
    '*.php',
    'views/**/*'
  ]
});
