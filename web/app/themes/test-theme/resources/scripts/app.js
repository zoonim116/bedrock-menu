import domReady from '@roots/sage/client/dom-ready';

/**
 * Application entrypoint
 */
domReady(async () => {
  const productMenuItem = document.querySelector('#product-menu');
  const megamenu = document.querySelector('.megamenu');
  const parents = document.querySelectorAll('.megamenu .parents a');

  productMenuItem.onmouseout = function(e) {
    console.log('out');
    megamenu.classList.add('max-h-0');
  }

  productMenuItem.onmouseover = function(e) {
    console.log('int');
    megamenu.classList.remove('max-h-0');
  }

  parents.forEach((parent) => {
    // parent.onmouseout = function(e) {
    //   console.log('out');
    //   document.querySelector(`.megamenu [data-parent-id=${parent.id}]`).classList.add('hidden');
    // }

    parent.onmouseover = function(e) {
      document.querySelectorAll('[data-parent-id]').forEach((elem) => elem.classList.add('hidden'));
      document.querySelector(`.megamenu [data-parent-id=${parent.id}]`).classList.remove('hidden');
    }
  })
  
});

/**
 * @see {@link https://webpack.js.org/api/hot-module-replacement/}
 */
if (import.meta.webpackHot) import.meta.webpackHot.accept(console.error);
