//validating form when logging in

const loginVal = ({username, password, error}) => {
    var checkValidate = true
    // set the validation to true first
    var errorMsg = ''
    //no error message since validation for login is true
    //but if one of the components is not filled in
    if(!username || !password){
        //set the validation to false
        checkValidate = false
        errorMsg = 'Please fill in all fields'
        // make sure that all fields are filled in when logging in
    }
    //if the validation is false
    if(!checkValidate){
        //set the error to be the errorMsg shown in the popup
        error.innerHTML = errorMsg
    }
    return checkValidate
}

// validating form when signing in 
//sign up popup has more fields so need to make sure that they all are filled in also
const signVal = ({fullName, email, username, DOB, password, confirmpw, error}) => {
    //same as login validation
    let checkValidate = true
    let errorMsg = ''
    //no error message shown on the popup

    // make sure that all fields are filled in signing up
    //in this case we just set the last one for simplicity sake so..
    // if never fill in the last confirmpw component then users will be prompted to fill up
    if(!confirmpw){
        checkValidate = false
        errorMsg = 'Please fill up all the fields'
    }

    //validate full name
    else if(!(/^[a-zA-Z ]+$/.test(fullName))){
        //this regex is the same as the one for case study
        checkValidate = false
        errorMsg = 'Your name should only contain alphabet characters and white spaces'
    }

    //validate username
    else if(!(/^[a-zA-Z0-9_.-]*$/.test(username))){
        checkValidate = false
        errorMsg = 'Your username should only contain alphabet characters and numbers'
    }
    
    //check for email field
    else if(!(/^[\w][\w.-]*@([\w][\w-]*\.){1,3}[a-zA-Z]{2,3}$/.test(email))){
        //this regex is the same as the one for case study 
        checkValidate = false
        errorMsg = 'Ensure that email format is correct. Email should contain "@" sign and a domain (e.g. "gmail.com")'
    }
    //check for startDate field
    // date of birth must be in the past
    else if(Date.parse(DOB) >= new Date().getTime()){
        checkValidate = false
        errorMsg = 'Your date of birth should not be later than today!'
    }
    //check for password field
    //make sure that both passwords match
    else if(password !== confirmpw){
        checkValidate = false
        errorMsg = 'Passwords do not match'
    }

    if(!checkValidate){
        error.innerHTML = errorMsg
    }
    return checkValidate
}

// validating form when placing order for checkout
const orderVal = ({cardname, cardNo, cardexpiry, cvv}) => {
    let checkValidate = true
    let errorMsg = ''

    //for demo, just test case to one of the fields not filled in
    if(!cvv){
        checkValidate = false
        errorMsg = 'Please fill up all the fields'
    }
    //validate full name and name on card
    else if(!(/^[a-zA-Z ]+$/.test(cardname))){
        checkValidate = false
        errorMsg = 'Your name should only contain alphabet characters and white spaces'
    }

     //check for credit card number
     // credit card number should have 16 numbers - no letters
     else if(!(/^\d{13-16}$/.test(cardNo))){
        checkValidate = false
        errorMsg = 'Your credit card number is invalid. Your credit card number should be 13-16 digits.'
    }
        //check for cvv
    //  cvv should be 3 numbers
    else if(!(/^\d{3}$/.test(cvv))){
        checkValidate = false
        errorMsg = 'Your CVV is invalid. You can find your 3-digit CVV number at the back of your card.'
    }
    //check for credit card expires on
    // can only input until '12' for month part
    else if(!(/^0[1-9]|1[0-2]\/\d{4}$/.test(cardexpiry))){
        checkValidate = false
        errorMsg = 'Please input a correct month and year. The expiration date format is MM/YYYY.'
    }

    // check if all fields are correct when click on checkout
    if(!checkValidate){
        alert(errorMsg)
    }

    return checkValidate
}
