$(document).ready(() => {

// elements from DOM
	const email = document.getElementById('rBlock_email');
	const emailError = document.getElementById('emailError');
	const pass = document.getElementById('rBlock_pass');
	const passError = document.getElementById('passError');

// regex
	const regExpEmail = new RegExp(/[aA-zZ0-9]+@[a-z]+\.[a-z]+/);
	const regExpPass = new RegExp(/[0-9aA-zZ]{8,}/);


	/**
	 * the method processes the input email with the focus on it
	 * @type {HTMLElement}
	 */
	email.addEventListener('focus', (e) => {
		if (emailError.className === 'showError') {
			emailError.className = 'hideError';
			email.oninput = function () {
				if (!email.value.match(regExpEmail) && email.value) {
					emailError.className = 'showError';
				} else {
					emailError.className = 'hideError';
				}
			}
		}
	});

	/**
	 * the method processes the input email at the end of the focus on it
	 */
	email.addEventListener('blur', (e) => {
		if (!email.value.match(regExpEmail) && email.value) {
			emailError.className = 'showError';
		}
	});

	/**
	 * the method processes the input password with the focus on it
	 * @type {HTMLElement}
	 */
	pass.addEventListener('focus', (e) => {
		if (passError.className === 'showError') {
			passError.className = 'hideError';
			pass.oninput = function () {
				if (!pass.value.match(regExpPass) && pass.value) {
					passError.className = 'showError';
				} else {
					passError.className = 'hideError';
				}
			}
		}
	});

	/**
	 * the method processes the input password at the end of the focus on it
	 */
	pass.addEventListener('blur', (e) => {
		if (!pass.value.match(regExpPass) && pass.value) {
			passError.className = 'showError';
		}
	});
});
