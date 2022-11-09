let userBTN = document.getElementsByClassName('.account-btn');
let dropdown = document.getElementsByClassName('.account-dropdown');

//when click on account button 
function clickDropdown(){
    if(parseInt(dropdown.style.height) === 0){
        dropdown.style.height = '85px'
        dropdown.style.padding = '7px 0'
    } else {
        dropdown.style.height = '0'
        dropdown.style.padding = '0'
    }
};

userBTN.onclick = clickDropdown


//
window.addEventListener('click', function(event) {
    if (!dropdown.contains(event.target) && !userBTN.contains(event.target) ) {
        dropdown.style.height = '0'
        dropdown.style.padding = '0'
    }
})

function triggerModalById(id){
    var btns = document.querySelectorAll(".modal-open-btn");
    for(let i = 0 ; i < btns.length; i++){
        let btn = btns[i]
        let targetId = btn.getAttribute('data-target')
        let modal =  document.getElementById(targetId)       

        modal.style.display = "none";
    }
    let modal =  document.getElementById(id) 
    modal.style.display = "block";
}
