/**
 * Components
 *
 * @see class Components
 */

export default class Components {

  /**
   * Create a new Components
   * @param {Object} components
   */
  constructor(components) {
    this.components = components;
  }

  /**
   * Automatically load and fire components
   */
  loadEvents() {
    this.components.forEach(component => {
      if (document.querySelector(component.selector)) {
        document.querySelectorAll(component.selector).forEach(element => {
          if (typeof component.name.init === 'function') {
            component.name.init(element, component.options);
          }
        });
      }
    });
  }
}
