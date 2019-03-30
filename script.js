const email = document.getElementById("rBlock_fInput-email");
email.addEventListener('focus', (e) => {
    const emailError = document.getElementById("emailError");
    emailError.innerText = "";
});


email.addEventListener('blur', (e) => {
    const email = document.getElementById("rBlock_fInput-email").value;
    const emailError = document.getElementById("emailError");
    const regExpEmail = new RegExp(/\w+\@\w+\.\w+/);
    if (!email.match(regExpEmail)) {
        emailError.className = "error";
        emailError.innerText = "Incorrect email";
    }
});

const pass = document.getElementById("rBlock_sInput-pass");
pass.addEventListener('focus', (e) => {
    const passError = document.getElementById("passError");
    emailError.innerText = "";
});

pass.addEventListener('blur', (e) => {
    const pass = document.getElementById("rBlock_sInput-pass").value;
    const passError = document.getElementById("passError");
    const regExpPass = new RegExp(/\d+/);
    if (!pass.match(regExpPass)) {
        passError.className = "error";
        passError.innerText = "Incorrect password";
    }
});

const form = document.getElementById("formSubmit");
form.addEventListener('click', (e) => {
    const loginFormStyle = document.getElementById("form1");
    const aboutFormStyle = document.getElementById("form2");
    loginFormStyle.className = "hide";
    aboutFormStyle.className = "show";
});