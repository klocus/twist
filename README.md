# TWIST

*WordPress Starter Theme with Twig, custom fields and Tailwind CSS.*

## Documentation

Most files should be documented with a comment at the beginning.

## Instalation

Copy this theme to your WordPress instance:

```
git clone --depth=1 https://github.com/klocus/twist.git && rm -rf ./twist/.git
```

Run `npm install` and  `composer install` to use [Carbon Fields](https://carbonfields.net/).

## Setup

Edit `inc/setup.php` to enable or disable theme features, setup navigation menus, sidebars etc.

## Development

TWIST uses [Tailwind CSS](https://tailwindcss.com/) as a framework and [Laravel Mix](https://laravel-mix.com/) to
compile SCSS & JS. You can change default settings of Tailwind CSS in `tailwind.config.js`. You should also change
default domain name in `webpack.mix.js` to use *BrowserSync*.

## Folder structure

```bash
twist # Theme root
├── assets # Assets consumed by Webpack
│   ├── fonts
│   └── images
├── dist # Webpack build target
├── inc # Theme functions, blocks, fields & libraries
│   ├── blocks # Custom blocks
│   └── fields # Custom fields
├── lang # Pot files
├── src # Source files
│   ├── scripts # JavaScript
│   │   ├── routes # Class-based routing
│   │   └── util # Utilities
│   └── styles # SCSS styles
│       ├── blocks # Gutenberg block styles
│       ├── common # General styles
│       └── components # Component styles (ex. Footer & Header)
├── templates # Page templates
└── views # Block & content views
```
