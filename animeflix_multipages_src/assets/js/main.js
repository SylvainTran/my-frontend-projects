$(document).ready(setup);

function setup() {
    $('#modal__reg-input--username').change(validateRegUser);
    $('#modal__reg-input--password').change(validateRegPass);
    $('#modal__registration-form').change(registrationHandler);
    // $('#content__admin-product-list-bt').on("click", toggleAdminList);
}

function validateRegUser() {
    let userName=document.getElementById('modal__reg-input--username');
    let messageDiv=document.getElementsByClassName('reg-input--username')[0];

    if(userName.value === "" || userName.value === null) {

    }
    else {
        // 6 to 16 chars a-zA-Z0-9_ on one line
        let username_template=/\w{6,16}$/;
        let userRegExp=new RegExp(username_template);
        if(userRegExp.test(userName.value)) {
            // Change the html validator styling
            userName.classList.remove("is-invalid");
            userName.classList.add("is-valid");

            messageDiv.classList.remove("invalid-feedback");
            messageDiv.classList.add("valid-feedback");
            messageDiv.innerHTML = "Excellent!";
            return true;
        }
    }
    userName.classList.remove("is-valid");
    userName.classList.add("is-invalid");
    messageDiv.classList.remove("valid-feedback");
    messageDiv.classList.add("invalid-feedback");
    messageDiv.innerHTML = "Identifiant incorrect.";
    return false;
}

function validateRegPass() {
    let password=document.getElementById('modal__reg-input--password');
    let messageDiv=document.getElementsByClassName('reg-input--pass')[0];

    if(password.value === "" || password.value === null) {

    }
    else {
        // 6 to 8 chars, a-zA-Z0-9_ on one line
        let password_template=/\w{6,8}$/;
        let passRegExp=new RegExp(password_template);
        if(passRegExp.test(password.value)) {
            // Change the html validator styling
            password.classList.remove("is-invalid");
            password.classList.add("is-valid");

            messageDiv.classList.remove("invalid-feedback");
            messageDiv.classList.add("valid-feedback");
            messageDiv.innerHTML = "Excellent!";
            return true;
        }
    }
    password.classList.remove("is-valid");
    password.classList.add("is-invalid");
    messageDiv.classList.remove("valid-feedback");
    messageDiv.classList.add("invalid-feedback");
    messageDiv.innerHTML = "Password incorrect.";
    return false;
}

function registrationHandler() {
    $('#modal__registration-form').mousemove( () => {
        validateRegistration();
    });
}

/**
 * 
 * Validate the registration username and password using regexp.
 * 
 */
function validateRegistration() {
    let regFormConnectBtn=document.getElementById('modal__registration-form--connect');
    if(validateRegUser() && validateRegPass()) {
        regFormConnectBtn.disabled = false;
        return true;
    }
    regFormConnectBtn.disabled = true;
    return false;
}

function toggleAdminList(event) {
    adminList=document.getElementById('form--admin-register-new');
    if(adminList.style.display==="block") {
        adminList.style.display="none";
    } else {
        adminList.style.display="block";
    }
}

function toggleDeleteList(event) {
    adminList=document.getElementById('form--admin-delete');
    if(adminList.style.display==="block") {
        adminList.style.display="none";
    } else {
        adminList.style.display="block";
    }
}