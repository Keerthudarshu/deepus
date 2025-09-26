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

  // Inject minimal CSS for wishlist heart (SVG outline)
  const style = document.createElement('style');
  style.textContent = `
    .wishlist-btn { position: absolute; top: 10px; right: 10px; background: transparent; border: 0; width: auto; height: auto; display: inline-flex; align-items: center; justify-content: center; box-shadow: none; cursor: pointer; opacity: 1; transition: transform .15s; z-index: 5; }
    .wishlist-btn .heart-icon-svg { width: 26px; height: 26px; pointer-events: none; }
    .wishlist-btn .heart-icon-svg path { stroke: #000; fill: none; transition: stroke .15s, fill .15s; }
    .wishlist-btn.active .heart-icon-svg path { stroke: #e63946; fill: #e63946; }
    .wishlist-btn:hover { transform: translateY(-1px); }
    
    /* Tooltip bubble */
    .wishlist-btn::after { content: 'Add To Wishlist'; position: absolute; top: 50%; right: 32px; transform: translateY(-50%); background: #fff; color: #000; font-size: 12px; padding: 6px 10px; border-radius: 999px; border: 1px solid rgba(0,0,0,0.12); box-shadow: 0 6px 20px rgba(0,0,0,0.08); white-space: nowrap; pointer-events: none; opacity: 0; transition: opacity .15s ease, transform .15s ease; }
    .wishlist-btn:hover::after { opacity: 1; transform: translateY(-50%) translateX(-2px); }
  `;
  document.head.appendChild(style);

  // No normalization needed for SVG; CSS handles active state

  // Delegate clicks on wishlist buttons
  document.body.addEventListener('click', function(e){
    const btn = e.target.closest('.wishlist-btn');
    if (!btn) return;
    e.preventDefault();
    e.stopPropagation();
    const id = btn.getAttribute('data-product-id');
    if (!id) return;
    fetch(`index.php?pg=toggle_wishlist&id=${encodeURIComponent(id)}`, {
        method: 'GET',
        credentials: 'same-origin',
        headers: { 'Accept': 'application/json' }
      })
      .then(async r => {
        try { return await r.json(); } catch (err) { return null; }
      })
      .then(data => {
        if (data && data.success) {
          if (data.action === 'added') btn.classList.add('active');
          else btn.classList.remove('active');
          // Optional: update a wishlist counter if exists
          const counter = document.querySelector('[data-wishlist-count]');
          if (counter) counter.textContent = data.count;
        } else {
          // Fallback: try non-AJAX endpoint so the item is definitely added
          console.warn('Wishlist AJAX failed; falling back to favorites.php add');
          window.location.href = `favorites.php?add=${encodeURIComponent(id)}`;
        }
      })
      .catch(()=>{
        // Fallback on network error
        window.location.href = `favorites.php?add=${encodeURIComponent(id)}`;
      });
  });
});

