let mix = require('laravel-mix');
let tailwindcss = require('tailwindcss');

mix.js('src/scripts/main.js', 'dist');
mix.sass('src/styles/main.scss', 'dist')
  .sass('src/styles/login.scss', 'dist')
  .sass('src/styles/admin.scss', 'dist')
  .sass('src/styles/editor.scss', 'dist')
  .options({
    processCssUrls: false,
    postCss: [tailwindcss('./tailwind.config.js')],
  });

mix.setPublicPath('dist');

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
