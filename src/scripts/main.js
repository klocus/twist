/**
 * Main
 *
 * Handles routing and global imports.
 */

/** Import local dependencies */
//import $ from 'jquery';
import Router from './util/Router';
import Components from './util/Components';

// Routes
import common from './routes/common';
import home from './routes/home';
import aboutUs from './routes/about';

// Components
import hamburger from './components/hamburger';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home page
  home,
  // Example: 'About Us' page, note the change from about-us to aboutUs.
  aboutUs,
});

// Load Events
routes.loadEvents();

/** List of Components */
const components = new Components([
  {
    name: hamburger,
    selector: '.hamburger'
  }
]);

// Load Components Events
components.loadEvents();