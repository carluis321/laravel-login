<template>
  <div class="col-md-6">
    <router-view></router-view>
  </div>
</template>

<script>
  import axios from 'axios';

  export default{
    created(){
      axios.get('/is-auth').then((data) => {
        if (!data.data) {
          this.$router.push('/login');

          return;
        }

        this.$router.push('/');
      });
    }
  }
</script>
