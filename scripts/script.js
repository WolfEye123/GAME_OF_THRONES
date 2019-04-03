/**
 * the method processes the input email with the focus on it
 * @type {HTMLElement}
 */
const email = document.getElementById("rBlock_fInput-email");
email.addEventListener('focus', (e) => {
    const emailError = document.getElementById("emailError");
    if (emailError.className === "showError") {
        const email = document.getElementById("rBlock_fInput-email");
        const regExpEmail = new RegExp(/\w+\@\w+\.\w+/);
        email.oninput = function () {
            if (!email.value.match(regExpEmail) && email.value != "") {
                emailError.className = "showError";
            } else {
                emailError.className = "hideError";
            }
        }
    }
});

/**
 * the method processes the input email at the end of the focus on it
 */
email.addEventListener('blur', (e) => {
    const email = document.getElementById("rBlock_fInput-email").value;
    const emailError = document.getElementById("emailError");
    const regExpEmail = new RegExp(/\w+\@\w+\.\w+/);
    if (!email.match(regExpEmail) && email != "") {
        emailError.className = "showError";
    }
});

/**
 * the method processes the input password with the focus on it
 * @type {HTMLElement}
 */
const pass = document.getElementById("rBlock_sInput-pass");
pass.addEventListener('focus', (e) => {
    const passError = document.getElementById("passError");
    if (passError.className === "showError") {
        const pass = document.getElementById("rBlock_sInput-pass");
        const regExpPass = new RegExp(/\d+/);
        pass.oninput = function () {
            console.log(pass.length);
            if (!pass.value.match(regExpPass) && pass.value != "") {
                passError.className = "showError";
            } else {
                passError.className = "hideError";
            }
        }
    }
});

/**
 * the method processes the input password at the end of the focus on it
 */
pass.addEventListener('blur', (e) => {
    const pass = document.getElementById("rBlock_sInput-pass").value;
    const passError = document.getElementById("passError");
    const regExpPass = new RegExp(/\d+/);
    console.log(pass.length);
    if (!pass.match(regExpPass) && pass != "") {
        passError.className = "showError";
    }
});

/**
 * the method hides the first form and shows the second after validation of all fields
 * @type {HTMLElement}
 */
const form = document.getElementById("formSubmit");
form.addEventListener('click', (e) => {
    const loginFormStyle = document.getElementById("form1");
    const aboutFormStyle = document.getElementById("form2");
    const emailError = document.getElementById("emailError");
    const passError = document.getElementById("passError");
    if (emailError.className === "hideError" && passError.className === "hideError") {
        loginFormStyle.className = "hide";
        aboutFormStyle.className = "show";
    }
});