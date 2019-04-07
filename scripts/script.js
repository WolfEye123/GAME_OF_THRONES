/**
 * the method processes the input email with the focus on it
 * @type {HTMLElement}
 */
const email = document.getElementById("rBlock_email");
email.addEventListener('focus', (e) => {
    const emailError = document.getElementById("emailError");
    if (emailError.className === "showError") {
        const email = document.getElementById("rBlock_email");
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
    const email = document.getElementById("rBlock_email").value;
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
const pass = document.getElementById("rBlock_pass");
pass.addEventListener('focus', (e) => {
    const passError = document.getElementById("passError");
    if (passError.className === "showError") {
        const pass = document.getElementById("rBlock_pass");
        pass.oninput = function () {
            if (pass.value.length < 8 && pass.value != "") {
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
    const pass = document.getElementById("rBlock_pass").value;
    const passError = document.getElementById("passError");
    if (pass.length < 8 && pass != "") {
        passError.className = "showError";
    }
});