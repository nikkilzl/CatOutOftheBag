function setLimit(v, target) {
    v = parseInt(v);
    v = Number.isNaN(v) ? 0 : v;
    target.value = v == 0 ? "" : v;
    document.getElementById('qty').value = v < 0 ? 1 : v;
  }
  
  function change(v) {
    let element = document.getElementById('count');
    element.value = parseInt(element.value);
    document.getElementById('qty').value = element.value;
  }