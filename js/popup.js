// Get the button that opens the popup (login or sign up)
var btns = document.querySelectorAll(".popup-open-btn");

// 
let currentpopup;
for(let i = 0 ; i < btns.length; i++){
  var btn = btns[i]
  var targetId = btn.getAttribute('data-target')
  var popup =  document.getElementById(targetId) 
  var span = document.querySelector(`#${targetId} .close`)

  // When the user clicks the button, open the popup 
  btn.addEventListener("click", function() {
    if(currentpopup){ //make sure only 1 popup is active at a time
      currentpopup.style.display = "none";
    }
    popup.style.display = "block";
    currentpopup = popup
  })

  // When the user clicks on <span> (x), it will close the popup
  span.onclick = function() {
    popup.style.display = "none";
    currentpopup = null
  }

}

// 
function activatePopup(id){
  var btns = document.querySelectorAll(".popup-open-btn");
  for(let i = 0 ; i < btns.length; i++){
      var btn = btns[i]
      var targetId = btn.getAttribute('data-target')
      var popup =  document.getElementById(targetId)       

      popup.style.display = "none";
  }
  let popup =  document.getElementById(id) 
  popup.style.display = "block";
}
