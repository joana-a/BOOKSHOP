const email= document.querySelector("#email");
const password= document.querySelector("#password");

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordRegex = /^.{6,}$/;
function login(){
    if(!emailRegex.test(email.value) && !passwordRegex.test(password.value)){
        event.preventDefault();
        alert('invalid email and password');
    }
    
    else if(emailRegex.test(email.value) && !passwordRegex.test(password.value)){
        event.preventDefault();
        alert('password must be at least 6 characters long');
    }
    else if(!emailRegex.test(email.value) && passwordRegex.test(password.value)){
        event.preventDefault();
        alert('email format is invalid');
    }
}


