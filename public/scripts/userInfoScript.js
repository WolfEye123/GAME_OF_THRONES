$(document).ready(() => {
//regex
    const regExp = new RegExp(/[\/()\-§#!$%+&:;<=>?@_{|}~№«»€\d+]/i);

    /**
     * the method processes the input name with the focus on it
     * @type {HTMLElement}
     */
    const name = document.getElementById("rBlock_userName");
    name.addEventListener('focus', (e) => {
        const nameError = document.getElementById('nameError');
        name.oninput = function () {
            if (name.value.match(regExp) && name.value) {
                nameError.className = "showError";
            } else {
                nameError.className = "hideError";
            }
        }
    });
    /**
     * the method processes the input textarea with the focus on it
     * @type {HTMLElement}
     */
    const textArea = document.getElementById("rBlock_textarea");
    textArea.addEventListener('focus', (e) => {
        const textError = document.getElementById('textError');
        textArea.oninput = function () {
            if (textArea.value.match(regExp) && name.value) {
                textError.className = "showError";
            } else {
                textError.className = "hideError";
            }
        }
    });
});
