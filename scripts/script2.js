const name = document.getElementById("rBlock_userName");
const textArea = document.getElementById("rBlock_textarea");
const submit = document.getElementById("rBlock_submit2");
const house = document.getElementById("houseInput");

name.addEventListener('focus', (e) => {
    const nameError = document.getElementById('nameError');
    const regExpName = new RegExp(/[\/()\-§#!$%+&:;<=>?@_{|}~№«»€\d+]/i);
    name.oninput = function () {
        if (name.value.match(regExpName)){
            nameError.className = "showError";
        } else {
            nameError.className = "hideError";
            disableSubmit();
        }
    }
});

textArea.addEventListener('focus', (e) => {
    const textError = document.getElementById('textError');
    const regExpName = new RegExp(/[\/()\-§#!$%+&:;<=>?@_{|}~№«»€\d+]/i);
    textArea.oninput = function () {
        if (textArea.value.match(regExpName)){
            textError.className = "showError";
        } else {
            textError.className = "hideError";
            disableSubmit();
        }
    }
});

function disableSubmit() {
    if(name.value != "" && textArea.value != "" && house.value != ""){
        submit.disabled = false;
    }
}