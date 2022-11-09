
// validating form when placing order for checkout
const validatePlaceOrder = ({fullName, email, phoneNumber, address, nameOnCard, creditCardNumber, creditCardExpiresOn, cvv}) => {
    let isValidated = true
    let errorMessage = ''

    if(!fullName || !email || !phoneNumber || !address || !nameOnCard || !creditCardNumber || !creditCardExpiresOn || !cvv){
        isValidated = false
        errorMessage = 'Please fill up all the fields'
    }
    //validate full name and name on card
    else if(!(/^[a-zA-Z ]+$/.test(fullName)) || !(/^[a-zA-Z ]+$/.test(nameOnCard))){
        isValidated = false
        errorMessage = 'Name can only contain alphabet characters and white spaces'
    }

    //check for email field
    // email can contain all letters and numbers last part should be 2-3 letters only (similar to case study)
    else if(!(/^[a-zA-Z-.0-9]+@([a-zA-Z0-9]+\.){1,3}[a-zA-Z0-9]{2,3}$/.test(email))){
        isValidated = false
        errorMessage = 'Please input a correct email. Email should contain "@" sign and a domain (e.g. "gmail.com")'
    }
     //check for credit card number
     // credit card number should have 16 numbers - no letters
     else if(!(/\d{16}$/.test(creditCardNumber))){
        isValidated = false
        errorMessage = 'Please input a correct credit card number. Your credit card number should be 16 digits.'
    }
        //check for cvv
    //  cvv should be 3 numbers
    else if(!(/^\d{3}$/.test(cvv))){
        isValidated = false
        errorMessage = 'Please input a correct CVV. You can find your 3-digit CVV number at the back of your card.'
    }
    //check for credit card expires on
    // can only input until '12' for month part
    else if(!(/(0[1-9]|10|11|12)\/[2-9][0-9]$/.test(creditCardExpiresOn))){
        isValidated = false
        errorMessage = 'Please input a correct month and year. The expiration data format is MM/YY.'
    }


    // check if all fields are correct when click on checkout
    if(!isValidated){
        alert(errorMessage)
    }

    return isValidated
}

//validating form when logging in

const validateLogin = ({username, password, errorDom}) => {
    let isValidated = true
    let errorMessage = ''
    if(!username || !password){
        isValidated = false
        errorMessage = 'Username and password cannot be empty'
        // make sure that all fields are filled in when logging in
    }

    if(!isValidated){
        errorDom.innerHTML = errorMessage
    }
    return isValidated
}


// validating form when signing in 

const validateSignup = ({fullName, email, username, dateOfBirth, password, confirmPassword, errorDom}) => {
    let isValidated = true
    let errorMessage = ''

    // make sure that all fields are filled in signing up
    if(!fullName || !email || !username || !dateOfBirth || !password || !confirmPassword){
        isValidated = false
        errorMessage = 'Please fill up all the fields'
    }

    //validate full name
    else if(!(/^[a-zA-Z ]+$/.test(fullName))){
        isValidated = false
        errorMessage = 'Name can only contain alphabet characters and white spaces'
    }

    //validate username
    else if(!(/^[a-zA-Z]+$/.test(username))){
        isValidated = false
        errorMessage = 'Username can only contain alphabet characters'
    }
    
    //check for email field
    else if(!(/^[a-zA-Z-.0-9]+@([a-zA-Z0-9]+\.){1,3}[a-zA-Z0-9]{2,3}$/.test(email))){
        isValidated = false
        errorMessage = 'Please input a correct email. Email should contain "@" sign and a domain (e.g. "gmail.com")'
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
        errorDom.innerHTML = errorMessage
    }
    return isValidated
}
