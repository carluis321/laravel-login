"use strict"

var validations = {
	email: false,
	password: false,
};

$('#email').on('keyup', (e) => {
	let value = e.target.value;

	if (!value.match(/([a-zA-Z0-9\.\-]{3,})\@[a-z0-9]+(\.)+[a-z]{2,}$/g)) {
		$('.login').attr('disabled', true);

		$(e.target).css({
			border: '1px solid red'
		});

		validations.email = false;

		return;
	}

	$(e.target).css({
		border: '1px solid rgba(0, 0, 0, 0.15)'
	});

	validations.email = true;
	canSend();

	return;
});

$('#password').on('keyup', (e) => {
	let value = e.target.value;

	if (value.length < 3 ) {
		$('.login').attr('disabled', true);

		$(e.target).css({
			border: '1px solid red'
		});

		validations.password = false;

		return;
	}

	$(e.target).css({
		border: '1px solid rgba(0, 0, 0, 0.15)'
	});

	validations.password = true;
	canSend();

	return;
});

function canSend(){
	if (validations.password && validations.email) {
		$('.login').attr('disabled', false);
	}
}