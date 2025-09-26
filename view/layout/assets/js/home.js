document.addEventListener('DOMContentLoaded', () => {
  const my_product = document.getElementsByClassName('my-product');
  const home_catalog = document.getElementsByClassName('tab-link');

  if (my_product.length) {
    my_product[0].style.display = 'block';
  }

  window.click_catalog = function (a) {
    if (!home_catalog.length || !my_product.length) return;
    let ind = 0;
    for (let i = 0; i < home_catalog.length; i++) {
      home_catalog[i].classList.remove('active');
      if (a === home_catalog[i]) {
        ind = i;
      }
    }

    for (let i = 0; i < my_product.length; i++) {
      my_product[i].style.display = 'none';
    }

    a.classList.add('active');
    my_product[ind].style.display = 'block';
  };
});

