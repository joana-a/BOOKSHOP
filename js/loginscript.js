const email= document.querySelector("#email");
const password= document.querySelector("#password");

const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordRegex = /^.{6,}$/;
function login(){
    event.preventDefault();
    if(emailRegex.test(email.value) && passwordRegex.test(password.value)){
        window.location.href= "home.html";
    }

    else if(emailRegex.test(email.value) && !passwordRegex.test(password.value)){
        alert('password must be at least 6 characters long');
    }
    else if(!emailRegex.test(email.value) && passwordRegex.test(password.value)){
        alert('email format is invalid');
    }
    else{
        alert('invalid email and password');
    }    
}


