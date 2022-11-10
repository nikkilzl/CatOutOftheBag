// Get the button that opens the popup (login or sign up)
var btns = document.querySelectorAll(".popup-open-btn");

// 
let currentpopup;
for(let i = 0 ; i < btns.length; i++){
  var btn = btns[i]
  var poptarget = btn.getAttribute('data-target')
  //attribute is the target that was referenced
  var popup =  document.getElementById(poptarget) 
  var span = document.querySelector(`#${poptarget} .close`)
  //cannot use getElement here because it's not a classname or idname

  // When the user clicks the button, open the popup 
  btn.addEventListener("click", function() {
    if(currentpopup){ //make sure only 1 popup is active at a time
      currentpopup.style.display = "none";
    }
    popup.style.display = "block";
    currentpopup = popup;
  })

  // When the user clicks X, it will close the popup
  span.onclick = function() {
    popup.style.display = "none";
    //set the display to none so that the popup disappears
  }

}

// 
function activatePopup(id){
  var btns = document.querySelectorAll(".popup-open-btn");
  for(let i = 0 ; i < btns.length; i++){
      var btn = btns[i]
      var poptarget = btn.getAttribute('data-target')
      var popup =  document.getElementById(poptarget)       

      popup.style.display = "none";
  }
  let popup =  document.getElementById(id) 
  popup.style.display = "block";
}
