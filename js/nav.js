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


window.addEventListener('click', function(event) {
    if (!dropdown.includes(event.target) && !userbtn.includes(event.target) ) {
        dropdown.style.height = '0'
        dropdown.style.padding = '0'
    }
})

function activatePopup(id){
    var popbtn = document.querySelectorAll(".popup-open-btn");
    for(let i = 0 ; i < btns.length; i++){
        var element = popbtn[i]
        var targetId = element.getAttribute('data-target')
        var popup =  document.getElementById(targetId)       

        popup.style.display = "none";
    }
    var popup =  document.getElementById(id) 
    popup.style.display = "block";
}
