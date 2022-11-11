// Retrieve button that opens the popup (login or sign up)
const openbtn = document.getElementsByClassName(".openpopup");

let currentpopup;
for(let b = 0 ; b < openbtn.length; b++){
  var btn = openbtn[b]
  var poptarget = btn.getAttribute('data-target')
  //attribute is the target that was referenced
  var popup =  document.getElementById(poptarget) 
  var span = document.getElementsbyName(`#${poptarget} .closepopup`)
  //cannot use getElement here because it's not a classname or idname


  btn.addEventListener("click", function() {
    if(currentpopup){ 
      currentpopup.style.display = "none";
    }
    popup.style.display = "inline-block";
    currentpopup = popup;
  })

  // When the user clicks X, it will close the popup
  span.onclick = function() {
//when the span element, the X button in this case, is clicked -> call function
    popup.style.display = "none";
    //set the display to none so that the popup disappears
  }

}

function activatePopup(popupid){
  var openbtn = document.querySelectorAll(".openpopup");
  for(let b = 0 ; b < openbtn.length; b++){
      var btn = openbtn[b]
      var poptarget = btn.getAttribute('data-target')
      var popup =  document.getElementById(poptarget)       
      //if the popup is not activated then set display to none so that it will not appear
      popup.style.display = "none";
  }
  let popup =  document.getElementById(popupid) 
  //once we get the element, we know which popup, show the popup
  popup.style.display = "inline-block";
}
