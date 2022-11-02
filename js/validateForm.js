
const validatePlaceOrder = ({fullName, email, phoneNumber, address, nameOnCard, creditCardNumber, creditCardExpiresOn, cvv}) => {
    let isValidated = true
    let errorMessage = ''

    if(!fullName || !email || !phoneNumber || !address || !nameOnCard || !creditCardNumber || !creditCardExpiresOn || !cvv){
        isValidated = false
        errorMessage = 'Please input all the field'
    }
    //validate full name and name on card
    else if(!(/^([a-zA-Z ]|[a-zA-Z ][a-zA-Z ]*[a-zA-Z])$/.test(fullName)) || !(/^([a-zA-Z ]|[a-zA-Z ][a-zA-Z ]*[a-zA-Z ])$/.test(nameOnCard))){
        isValidated = false
        errorMessage = 'Name can only contain alphabet characters and white spaces'
    }

    //check for email field
    else if(!(/^[a-zA-Z-.0-9]+@([a-zA-Z0-9]+\.){1,3}[a-zA-Z0-9]{2,3}$/.test(email))){
        isValidated = false
        errorMessage = 'Please input a correct email. Email should contain "@" sign and a domain (e.g. "gmail.com")'
    }
     //check for credit card number
     else if(!(/\d{16}$/.test(creditCardNumber))){
        isValidated = false
        errorMessage = 'Please input a correct credit card number. Your credit card number should be 16 digits.'
    }
    //check for credit card expires on
    else if(!(/(0[1-9]|10|11|12)\/[2-9][0-9]$/.test(creditCardExpiresOn))){
        isValidated = false
        errorMessage = 'Please input a correct month and year. The expiration data format is MM/YY.'
    }
    //check for cvv
    else if(!(/^\d{3}$/.test(cvv))){
        isValidated = false
        errorMessage = 'Please input a correct CVV. You can find your 3-digit CVV number at the back of your card.'
    }

    if(!isValidated){
        alert(errorMessage)
    }

    return isValidated
}

const validateLogin = ({username, password, errorDom}) => {
    let isValidated = true
    let errorMessage = ''
    if(!username || !password){
        isValidated = false
        errorMessage = 'Username and password cannot be empty'
    }

    if(!isValidated){
        errorDom.innerHTML = errorMessage
    }
    return isValidated
}

const validateSignup = ({fullName, email, username, dateOfBirth, password, confirmPassword, errorDom}) => {
    let isValidated = true
    let errorMessage = ''

    if(!fullName || !email || !username || !dateOfBirth || !password || !confirmPassword){
        isValidated = false
        errorMessage = 'Username and password cannot be empty'
    }

    //validate full name
    else if(!(/^([a-zA-Z ]|[a-zA-Z][a-zA-Z ]*[a-zA-Z ])$/.test(fullName))){
        isValidated = false
        errorMessage = 'Name can only contain alphabet characters and white spaces'
    }

    //validate user name
    else if(!(/^([a-zA-Z]|[a-zA-Z][a-zA-Z ]*[a-zA-Z])$/.test(username))){
        isValidated = false
        errorMessage = 'username can only contain alphabet characters'
    }
    
    //check for email field
    else if(!(/^[a-zA-Z-.0-9]+@([a-zA-Z0-9]+\.){1,3}[a-zA-Z0-9]{2,3}$/.test(email))){
        isValidated = false
        errorMessage = 'Please input a correct email. Email should contain "@" sign and a domain (e.g. "gmail.com")'
    }
    //check for startDate field
    else if(Date.parse(dateOfBirth) >= new Date().getTime()){
        isValidated = false
        errorMessage = 'Your date of birth should not be later than today!'
    }
    //check for password field
    else if(password !== confirmPassword){
        isValidated = false
        errorMessage = 'Password does not match'
    }

    if(!isValidated){
        errorDom.innerHTML = errorMessage
    }
    return isValidated
}
