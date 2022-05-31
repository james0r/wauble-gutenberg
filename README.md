# Wauble Gutenberg Starter Theme

Wauble Gutenberg starter theme attempts to be helpful and minimal. Wauble uses Webpack as a bundler and supports SCSS, ES6, Alpine.JS, and BrowserSync out of the box.

## Installation

```bash
git clone https://github.com/james0r/wauble-gutenberg.git
cd wauble-gutenberg
npm i
composer install
```

## Usage

### Getting Started

Modify the BrowserSync proxy address in `webpack/webpack.dev.js`

```javascript
  ...
  plugins: [
    new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      proxy: '[ADDRESS TO YOUR WORDPRESS HOST]'
    })
  ]
  ...
```

Development:
```bash
npm run start
```
or
```bash
npm run dev
```

Production:
```bash
npm run build
```

### Using SCSS

Our SCSS directory is located at `src/scss` and contains the following directory structure:

```bash
├── abstracts
│   ├── _functions.scss
│   ├── _mixins.scss
│   └── _variables.scss
├── base
│   ├── _a11y.scss
│   ├── _base.scss
│   ├── _fonts.scss
│   ├── _helpers.scss
│   ├── _reset.scss
│   └── _typography.scss
├── components
│   └── _button.scss
├── layout
│   ├── _base.scss
│   ├── _footer.scss
│   └── _header.scss
├── main.scss
├── modules
│   ├── _abstracts.scss
│   ├── page-template-example.scss
│   └── template-front-page.scss
└── themes
    └── _default.scss
```

> To use SCSS variables, mixins, or functions within a modules files, you must import abstracts with `@import './abstracts';` at the top of your file.

#### Development Mode

In development mode, Webpack will inject your styles directly into the browser with hot-reloading. This includes any styles in the `/src/scss/modules` directory.

#### Production Mode

In production, global styles (all styles outside of `/src/scss/modules`) will be bundled and enqueue'd in the theme. Dynamically loaded modules (files created in `/src/scss/modules`) need to be enqueued based on a condition within `functions.php`. 

Here is an example of dynamically enqueue'ing the `front-page.css` styles:

```php
if (is_front_page()) {
  wp_enqueue_style('front-page-styles', get_stylesheet_directory_uri() . '/dist/front-page.css');
} 
```

It's encouraged that you load styles this way, although in some circumstances a `<link>` tag might work just fine.

### Using Alpine.JS

Within `src/alpine` you will find the following directories and example files:

```bash
/src/alpine/
├── components
│   └── dropdown.js
├── directives
│   └── testDirective.js
├── magic
│   └── money.js
└── stores
    └── globals.js
```

To add a new Alpine component, store, directive, or magic property, create a new file in a directory and use the structure from the example file in your new file. New files will automatically be imported within `src/index.js` and registered before `Alpine.start()` is run.

> It may be necessary to restart the dev script after creating a new Alpine file.

Check out `~/front-page.php` to see how these alpine features are used in a template.

## Configuration

### Enable Gutenberg Editor

There is a now a dedicated repo for [Wauble Gutenberg](https://github.com/james0r/wauble-gutenberg).

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate. (No tests written yet.)

## License
[MIT](https://choosealicense.com/licenses/mit/)
