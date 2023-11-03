import './bootstrap';

function show(){
    let eyeiconhidden = document.getElementById('eye-hidden');
    let eyeiconshow = document.getElementById('eye-show');
    let password = document.getElementById('password');

    eyeiconhidden.onclick = function(){
        if(password.type == "password"){
            password.type = "text";
            eyeiconshow.style.display = "block"
            eyeiconhidden.style.display = "none"
        }
    }

    eyeiconshow.onclick = function(){
        if(password.type == "text"){
            password.type = "password";
            eyeiconhidden.style.display = "block"
            eyeiconshow.style.display = "none"
        }
    }
}
function showconfirm(){
    let eyeiconhidden = document.getElementById('eye-hidden-confirm');
    let eyeiconshow = document.getElementById('eye-show-confirm');
    let password = document.getElementById('password_confirmation');

    eyeiconhidden.onclick = function(){
        if(password.type == "password"){
            password.type = "text";
            eyeiconshow.style.display = "block"
            eyeiconhidden.style.display = "none"
        }
    }

    eyeiconshow.onclick = function(){
        if(password.type == "text"){
            password.type = "password";
            eyeiconhidden.style.display = "block"
            eyeiconshow.style.display = "none"
        }
    }
}

show()
showconfirm()