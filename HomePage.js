let login = document.querySelector("#login");
login.addEventListener("click", function() {
    document.querySelector(".login-popup-bg").classList.add("show-login-popup-bg");
    document.querySelector("#loginPopup").classList.add("show-login-popup");
});

let lRegistration = document.querySelector("#lregistration");
lRegistration.addEventListener("click", function() {
    document.querySelector(".registration-popup").classList.add("show-registration-popup");
    document.querySelector("#loginPopup").classList.remove("show-login-popup");
});

let loginClose = document.querySelector(".login-close");
loginClose.addEventListener("click", function() {
    document.querySelector(".login-popup-bg").classList.remove("show-login-popup-bg");
    document.querySelector("#loginPopup").classList.remove("show-login-popup");
});

let signup = document.querySelector("#signup");
signup.addEventListener("click", function() {
    document.querySelector(".login-popup-bg").classList.add("show-login-popup-bg");
    document.querySelector(".registration-popup").classList.add("show-registration-popup");
});

let rLogin = document.querySelector("#rlogin");
rLogin.addEventListener("click", function() {
    document.querySelector(".registration-popup").classList.remove("show-registration-popup");
    document.querySelector("#loginPopup").classList.add("show-login-popup");
});

let registrationClose = document.querySelector("#closeRegistration");
registrationClose.addEventListener("click", function() {
    document.querySelector(".login-popup-bg").classList.remove("show-login-popup-bg");
    document.querySelector("#registrationPopup").classList.remove("show-registration-popup");
});