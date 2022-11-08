function setLimit(q, target) {
    q = parseInt(q);
    q = Number.isNaN(q) ? 0 : v;
    target.value = q == 0 ? "" : q;
    document.getElementById('qty').value = q < 0 ? 1 : q;
  }
  
  function change(q) {
    let element = document.getElementById('count');
    element.value = parseInt(element.value);
    document.getElementById('qty').value = element.value;
  }