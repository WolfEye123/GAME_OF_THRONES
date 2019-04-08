let myData;
getFile('../json/data.json'); //путь к файлу
function getFile(fileName) {
    let request = new XMLHttpRequest();
    request.open('GET', fileName);
    request.onloadend = function () {
        parse(request.responseText);
    };
    request.send();
}

function parse(obj) {
    myData = JSON.parse(obj);
    console.log(myData);
}


/**
 * the method processes the input email with the focus on it
 * @type {HTMLElement}
 */
const email = document.getElementById("rBlock_email");
email.addEventListener('focus', (e) => {
    const unknownUser = document.getElementById("unknownUser");
    const emailError = document.getElementById("emailError");
    if (emailError.className === "showError" || unknownUser.className === "showError") {
        const email = document.getElementById("rBlock_email");
        const regExpEmail = new RegExp(/\w+\@\w+\.\w+/);
        email.oninput = function () {
            if (!email.value.match(regExpEmail) && email.value != "") {
                emailError.className = "showError";
            } else {
                unknownUser.className = "hideError";
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
    const emailValue = document.getElementById("rBlock_email").value;
    const emailError = document.getElementById("emailError");
    const passError = document.getElementById("passError");
    if (passError.className === "showError") {
        const pass = document.getElementById("rBlock_pass");
        pass.oninput = function () {
            if (pass.value.length < 8 && pass.value != "") {
                passError.className = "showError";
            } else {
                passError.className = "hideError";
                if (emailError.className == "hideError") {
                    getJson(emailValue, pass.value);
                }
            }
        }
    }
});

/**
 * the method processes the input password at the end of the focus on it
 */
pass.addEventListener('blur', (e) => {
    const emailValue = document.getElementById("rBlock_email").value;
    const emailError = document.getElementById("emailError");
    const pass = document.getElementById("rBlock_pass").value;
    const passError = document.getElementById("passError");
    if (pass.length < 8 && pass != "") {
        passError.className = "showError";
    } else {
        passError.className = "hideError";
        if (emailError.className == "hideError") {
            getJson(emailValue, pass);
        }
    }
});


function getJson(user, pass) {
    const unknownUser = document.getElementById("unknownUser");
    const passInput = document.getElementById("rBlock_pass").value;
    const passError = document.getElementById("passError");
    const submit = document.getElementById("formSubmit");
    for (let userName in myData){
        if (user == userName) {
            if (myData[user].email == user) {
                unknownUser.className = "hideError";
                if (myData[user].password == pass) {
                    passError.className = "hideError";
                    submit.disabled = false;
                    console.log('come in');
                    return;
                } else {
                    passError.className = "showError";
                    return;
                }
            } else {
                unknownUser.className = "showError";
                passInput.text = "";
                return;
            }
        } else {
            unknownUser.className = "showError";
            passInput.text = "";
        }
    }
}