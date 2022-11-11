var userbtn = document.getElementsById('.userbtn');
var dropdown = document.getElementsById('.userdropdown');
//get element by id to retrieve the element from navigation header

userbtn.onclick = dropdownButton
//when the button is clicked then the dropdown function is called

//when click on account button 
function dropdownButton(){
    if(parseInt(dropdown.style.height) == 0){
        //if the dropdown value height is 0 then we want to change the style so that the popup shows
        dropdown.style.padding = '7px 0'
        dropdown.style.height = '85px'
    }
};

window.addEventListener('click', function(pop) {
//when window is clicked, the function that references pop should occur
    if (!dropdown.includes(pop.target) && !userbtn.includes(pop.target) ) {
        dropdown.style.height = '0'
        dropdown.style.padding = '0'
	//revert back the dropdown to original state
    }
})

function activatePopup(popupid){
    var popbtn = document.querySelectorAll(".openpopup");
    //getElementById and getElementsByClassName is that specific element that is referenced and is live
    for(let b = 0 ; b < openbtn.length; b++){
        var element = popbtn[b]
        var poptarget = element.getAttribute('data-target')
        var popup =  document.getElementById(poptarget)       

        popup.style.display = "none";
    }
    var popup =  document.getElementById(popupid) 
    popup.style.display = "block";
}
