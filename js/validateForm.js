
//validating form when logging in

const loginVal = ({username, password, error}) => {
    var isValidated = true
    // set the validation to true first
    var errorMessage = ''
    //no error message since validation for login is true
    //but if one of the components is not filled in
    if(!username || !password){
        //set the validation to false
        isValidated = false
        errorMessage = 'Username and password cannot be empty'
        // make sure that all fields are filled in when logging in
    }
    //if the validation is false
    if(!isValidated){
        //set the error to be the errormessage shown in the popup
        error.innerHTML = errorMessage
    }
    return isValidated
}


// validating form when signing in 
//sign up popup has more fields so need to make sure that they all are filled in also
const signVal = ({fullName, email, username, dateOfBirth, password, confirmPassword, error}) => {
    //same as login validation
    let isValidated = true
    let errorMessage = ''
    //no error message shown on the popup

    // make sure that all fields are filled in signing up
    //in this case we just set the last one for simplicity sake so..
    // if never fill in the last confirmpassword component then users will be prompted to fill up
    if(!confirmPassword){
        isValidated = false
        errorMessage = 'Please fill up all the fields'
    }

    //validate full name
    else if(!(/^[a-zA-Z ]+$/.test(fullName))){
        //this regex is the same as the one for case study
        isValidated = false
        errorMessage = 'Your name should only contain alphabet characters and white spaces'
    }

    //validate username
    else if(!(/^[a-zA-Z]+$/.test(username))){
        isValidated = false
        errorMessage = 'Username can only contain alphabet characters'
    }
    
    //check for email field
    else if(!(/^[\w][\w.-]*@([\w][\w-]*\.){1,3}[a-zA-Z]{2,3}$/.test(email))){
        //this regex is the same as the one for case study 
        isValidated = false
        errorMessage = 'Ensure that email format is correct. Email should contain "@" sign and a domain (e.g. "gmail.com")'
    }
    //check for startDate field
    // date of birth must be in the past
    else if(Date.parse(dateOfBirth) >= new Date().getTime()){
        isValidated = false
        errorMessage = 'Your date of birth should not be later than today!'
    }
    //check for password field
    //make sure that both passwords match
    else if(password !== confirmPassword){
        isValidated = false
        errorMessage = 'Passwords do not match'
    }

    if(!isValidated){
        error.innerHTML = errorMessage
    }
    return isValidated
}

// validating form when placing order for checkout
const orderVal = ({nameOnCard, cardNo, cardexpiry, cvv}) => {
    let isValidated = true
    let errorMessage = ''

    //for demo, just test case to one of the fields not filled in
    if(!cvv){
        isValidated = false
        errorMessage = 'Please fill up all the fields'
    }
    //validate full name and name on card
    else if(!(/^[a-zA-Z ]+$/.test(nameOnCard))){
        isValidated = false
        errorMessage = 'Your name should only contain alphabet characters and white spaces'
    }

     //check for credit card number
     // credit card number should have 16 numbers - no letters
     else if(!(/^\d{13-16}$/.test(cardNo))){
        isValidated = false
        errorMessage = 'Please input a correct credit card number. Your credit card number should be 13-16 digits.'
    }
        //check for cvv
    //  cvv should be 3 numbers
    else if(!(/^\d{3}$/.test(cvv))){
        isValidated = false
        errorMessage = 'Please input a correct CVV. You can find your 3-digit CVV number at the back of your card.'
    }
    //check for credit card expires on
    // can only input until '12' for month part
    else if(!(/^0[1-9]|1[0-2]\/\d{4}$/.test(cardexpiry))){
        isValidated = false
        errorMessage = 'Please input a correct month and year. The expiration data format is MM/YYYY.'
    }

    // check if all fields are correct when click on checkout
    if(!isValidated){
        alert(errorMessage)
    }

    return isValidated
}