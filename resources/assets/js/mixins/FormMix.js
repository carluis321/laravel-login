export default{
	data: () => {
		return {
      validations: {
        email: false,
        password: false,
      },
			form: '',
    	errors: []
		};
	},

	methods: {
		validateEmail(e){
      let value = e.target.value;

      if (!value.match(/([a-zA-Z0-9\.\-]{3,})\@[a-z0-9]+(\.)+[a-z]{2,}$/g)) {
      	$('.login').attr('disabled', true);

      	$(e.target).css({
      		border: '1px solid red'
      	});

      	this.validations.email = false;

      	return;
      }

      $(e.target).css({
      	border: '1px solid rgba(0, 0, 0, 0.15)'
      });

      this.validations.email = true;
      this.canSend();

      return;
		},

		validatePassword(e){
      let value = e.target.value;

      if (value.length < 3 ) {
      	$('.login').attr('disabled', true);

      	$(e.target).css({
      		border: '1px solid red'
      	});

      	this.validations.password = false;

      	return;
      }

      $(e.target).css({
      	border: '1px solid rgba(0, 0, 0, 0.15)'
      });

      this.validations.password = true;
      this.canSend();

      return;
		},

		canSend(){
      switch (this.form) {
      	case 'login':
      		if (this.validations.password && this.validations.email) {
      			$('.login').attr('disabled', false);
      		}
      	break;

      	case 'reset':
      		if (this.validations.email) {
      			$('.reset').attr('disabled', false);
      		}
      	break;
      }
		},
	}
}