document.addEventListener('DOMContentLoaded', function(){
  const listVal = document.querySelector('.list-val');
  const listValMenu = document.querySelector('.list-val-menu');
  const toggle1 = document.querySelector('.updown-toggle');
  if (toggle1 && listValMenu) {
    toggle1.addEventListener('click', function (event) {
      event.target.classList.toggle('fa-angle-up');
      event.target.classList.toggle('fa-angle-down');
      listValMenu.classList.toggle('active');
    });
  }

  window.tailai = function(a){
    var link = a.getAttribute('link');
    if (!link) return;
    if (a.checked) {
      window.location.href = link;
    } else {
      var id = link.slice(-1);
      link = link.slice(0, link.length - 1);
      link = link + '-' + id;
      window.location.href = link;
    }
  }

  var listprice = document.getElementById('listprice');
  if (listprice) {
    var checkprice = listprice.getAttribute('checkprice') || '';
    for (let i = 0; i < checkprice.length; i++) {
      if (listprice.children[checkprice[i]-1] && listprice.children[checkprice[i]-1].children[0]) {
        listprice.children[checkprice[i]-1].children[0].checked = 'checked';
      }
    }
  }
  var listgioitinh = document.getElementById('listgioitinh');
  if (listgioitinh) {
    var checkgioitinh = listgioitinh.getAttribute('checkgioitinh') || '';
    for (let i = 0; i < checkgioitinh.length; i++) {
      if (listgioitinh.children[checkgioitinh[i]-1] && listgioitinh.children[checkgioitinh[i]-1].children[0]) {
        listgioitinh.children[checkgioitinh[i]-1].children[0].checked = 'checked';
      }
    }
  }

  var subpage = document.getElementsByClassName('subpage');
  var iconsubpage = document.getElementsByClassName('product-pagination-link');
  window.changesubpage = function(a){
    for (let i = 0; i < iconsubpage.length; i++) {
      iconsubpage[i].classList.remove('active');
    }
    for (let i = 0; i < subpage.length; i++) {
      subpage[i].style.display = 'none';
    }
    a.classList.add('active');
    var idx = parseInt(a.innerHTML, 10) - 1;
    if (!isNaN(idx) && subpage[idx]) {
      subpage[idx].style.display = 'grid';
    }
  }
});
