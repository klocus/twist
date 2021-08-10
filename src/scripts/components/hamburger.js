/**
 * Hamburger Component
 *
 * Scripts for toggle menu
 */

// Usage: <button class="hamburger" data-target="#nav">Toggle</button>

export default {
  init(element) {
    element.addEventListener('click', () => {
      const target = document.querySelector(element.dataset.target);
      element.classList.toggle('-active');
      target.classList.toggle('-active');
    });
  }
}
