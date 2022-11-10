
  //to update qty count
  function change(q) {
    var countvalue = document.getElementById('count');
    //get the count number from the product detail page
    countvalue.value = parseInt(countvalue.value);
    //let the value of countvalue be the INTEGER and not float or any weird number
    // parseInt() parses a string argument and returns an integer of the specified radix

    document.getElementById('qty').value = countvalue.value;
  }


  // when the up button is pressed in the product detail page, we want to change the number shown
function setLimit(q, limit) {
    q = parseInt(q);
    q = Number.isNaN(q) ? 0 : q; //check if the number is NaN, if true then set qty to 0, if false then set qty to the value
    limit.value = q == 0 ? "" : q; //check if the qty value is equal to 0, if true then return nothing, if false then return the value
    document.getElementById('qty').value = q < 0 ? 1 : q; //check if qty value is less than 0, if true then set to 1, if false then leave it and return value
  }
  
