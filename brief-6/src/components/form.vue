<template>
  <div class="login flex flex-col h-screen ">
    <!-- Auth Card -->
    <form @submit.prevent="login()"
          class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12
            px-6 py-10 sm:px-10 sm:py-6
             rounded-lg shadow-md lg:shadow-lg m-auto "
    >
      <!-- Card Title -->
      <h2
          class="text-center font-semibold text-3xl lg:text-4xl text-white font-play tracking-wider"
      >
        LOGIN
      </h2>


      <!-- Fname Input -->
      <label class="block text-xs font-semibold text-white uppercase "
      >Email</label
      >
      <input
          type="text"
          placeholder="Enter your Last name"
          autocomplete="email"
          class="block w-full py-3 px-1 mt-2
                    text-white appearance-none field
                    "
          v-model="email"
          required
      />

      <!-- Token Input -->
      <label class="block text-xs font-semibold text-white uppercase mt-3"
      >token</label
      >
      <input
          type="text"
          placeholder="Enter your Token"
          class="block w-full py-3 px-1 mt-2
                    text-white appearance-none field
                    "
          v-model="token"
          required
      />


      <!-- Auth Buttton -->
      <button

          type="submit"
          class="w-full py-3 mt-10 bg-gray-400 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-500  font-benne "
      >
        Login
      </button>

      <!-- Another Auth Routes -->
      <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">


        <router-link class="text-white underline font-play m-auto" to="/Register">Register</router-link>
      </div>
    </form>
  </div>

</template>

<script>

export default {
  name: "Form",

  data() {
    return {
      email: '',
      token: '',
      userData: '',
      users: []
    }
  },
  methods: {
    login() {
      fetch('http://localhost/brief-6/api/getUser.php?email=' + this.email + '&token=' + this.token, {

        method: 'get',

      })
          .then(response => response.json())
          .then(data => this.userData = data)
          .then(this.check)


    },
    check() {

      if (this.userData === 'error') {

        this.$router.push('/login')


      } else {

        // store data locally


        sessionStorage.setItem("email", this.email);
        sessionStorage.setItem("token", this.token);


        this.$router.push('/')


      }


    }


  }

}

</script>

<style scoped></style>
