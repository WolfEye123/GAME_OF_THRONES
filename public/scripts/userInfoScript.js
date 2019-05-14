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
				nameError.className = 'showError';
			} else {
				nameError.className = 'hideError';
			}
		}
	});

	/**
	 * the method processes the input textarea with the focus on it
	 * @type {HTMLElement}
	 */
	const textArea = document.getElementById('rBlock_textarea');
	textArea.addEventListener('focus', (e) => {
		const textError = document.getElementById('textError');
		textArea.oninput = function () {
			if (textArea.value.match(regExp) && name.value) {
				textError.className = 'showError';
			} else {
				textError.className = 'hideError';
			}
		}
	});

	/**
	 * ajax request to the server to fill in user information fields
	 */
	const submit = document.getElementById('rBlock_submit2');
	submit.addEventListener('click', (e) => {
		e.preventDefault();
		const userName = document.getElementById('rBlock_userName').value;
		const house = document.getElementById('houseInput').value;
		const textarea = document.getElementById('rBlock_textarea').value;

		if (!userName && !house && !textarea) {
			return false;
		}

		$.ajax({
			type: 'POST',
			url: "http://localhost/GAME_OF_THRONES/resources/php/userInfo.php",
			data: {
				'userName': userName,
				'house': house,
				'textarea': textarea
			},
			error: function (data) {
				console.log(data);
			},
			success: function (data) {
				document.location.href = data;
			}
		});
	})
});
