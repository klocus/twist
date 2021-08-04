# TWIST

*WordPress Starter Theme*

## Documentation
Most files should be documented with a comment at the beginning.

## Instalation
Copy this theme to your WordPress instance:
```
git clone --depth=1 git@github.com:klocus/twist.git && rm -rf ./twist/.git
```

Run `npm install` and check `package.json` to see which scripts you can use while development.

Run `composer install` to use [Carbon Fields](https://carbonfields.net/).

## Setup
Edit `inc/setup.php` to enable or disable theme features, setup navigation menus, sidebars etc.

## Development
TWIST uses [Tailwind CSS](https://tailwindcss.com/) as a framework and [Laravel Mix](https://laravel-mix.com/) to compile SCSS & JS. You can change default settings of Tailwind CSS in `tailwind.config.js`. You should also change default domain name in `webpack.mix.js` to use *BrowserSync*.

## Folder structure
```bash
twist # Theme root
├── assets # Assets consumed by Webpack
│   ├── fonts # Fonts
│   ├── images # Images
│   ├── scripts # JavaScript
│   │   ├── routes # Class-based routing
│   │   └── util # Utilities
│   └── styles # SCSS styles
│       ├── blocks # Gutenberg block styles
│       ├── common # General styles
│       └── components # Component styles (ex. Footer & Header)
├── blocks # Gutenberg blocks
├── dist # Webpack build target
├── inc # Theme functions & libraries
├── lang # Pot files
├── templates # Page templates
└── views # Content views
```
