<template>
    <div class="panel rounded-top">
      <div class="panel-heading">
        <h3 class="text-success">
          Login
        </h3>
      </div>
      <div class="panel-body">
        <form autocomplete="off" method="POST" @submit.prevent="send" data-form="login">
          <div class="form-group">
            <input type="text" id="email" name="email" v-model="email" placeholder="Correo" class="form-control" autofocus required @keyup="validateEmail" />
          </div>

          <div class="form-group">
            <input type="password" id="password" name="password" v-model="password" placeholder="Contraseña" class="form-control" required @keyup="validatePassword" />
          </div>

          <div v-if="errors.length > 0" class="alert alert-danger">
            <p v-for="error in errors">
              {{ error }}
            </p>
          </div>

          <div class="row">
            <div class="col">
              <router-link to="/forgot" class="text-success">
                Forgot your password?
              </router-link>
            </div>
            <div class="col">
              <label>
                <input type="checkbox" name="remember" v-model="remember" />
                Remember me
              </label>
            </div>
            <div class="col">
              <button class="btn btn-primary btn-block login" disabled>
                Login
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
</template>

<script>
  import FormMix from './../mixins/FormMix';
  import axios from 'axios';

  export default {
    mixins: [FormMix],
    data:() => {
      return {
        email: null,
        password: null,
        remember: false,
        form: 'login'
      };
    },
    methods: {
      send(){
        this.errors = [];

        axios.post('/login', {
          email: this.email,
          password: this.password,
          remember: this.remember
        }).then((data) => {
          if (data.data.process == 'warning') {
            swal(data.data.msg);

            return;
          }

          this.$router.push('/');
        }).catch((errors) => {
          for(var error in errors.response.data.errors){
            this.errors.push(errors.response.data.errors[error][0]);
          }
        });
      }
    }
  }
</script>
