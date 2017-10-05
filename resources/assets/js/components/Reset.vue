<template>
  <div class="panel">
    <div class="panel-heading">
      <h3 class="text-success">
        Reset Password
      </h3>
    </div>

    <div class="panel-body">
      <form method="POST" class="form-horizontal" autocomplete="off" @submit.prevent="send">
        <div class="form-group">
          <input type="text" class="form-control" v-model="email" id="email" name="email" placeholder="Ingresa tu Correo" required autofocus
            @keyup="validateEmail">
        </div>

        <div v-if="errors.length > 0" class="alert alert-danger">
          <p v-for="error in errors">
            {{ error }}
          </p>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary reset" disabled>
            Reset Password
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
  import FormMix from './../mixins/FormMix';
  import axios from 'axios';

  export default{
    mixins: [FormMix],
    data: () => {
    	return {
    		email: null,
        form: 'reset'
    	};
    },

    methods: {
      send(){
        this.errors = [];

        axios.post('/reset', {
          email: this.email,
          password: this.password,
          remember: this.remember
        }).then((data) => {
          if (data.data.process == 'warning') {
            swal(data.data.msg);

            return;
          }

          swal(data.data.msg);

          this.$router.push('/login');
        }).catch((errors) => {
          for(var error in errors.response.data.errors){
            this.errors.push(errors.response.data.errors[error][0]);
          }
        });
      }
    }
  }
</script>