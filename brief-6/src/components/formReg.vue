<template>
  <div class="login flex flex-col h-screen bg-gray-800">

    <form @submit.prevent="send()"
          class="w-11/12 p-12 sm:w-8/12 md:w-6/12 lg:w-5/12 2xl:w-4/12
            px-6 py-10 sm:px-10 sm:py-6
             rounded-lg shadow-md lg:shadow-lg m-auto"
    >
      <h2
          class="text-center font-semibold text-3xl lg:text-4xl text-white font-play tracking-wider"
      >
        REGISTER
      </h2>

      <div class="mt-10">
        <label class="block text-xs font-semibold text-white uppercase "
        >First Name</label
        >
        <input
            type="text"
            placeholder="Enter your Fisrt name"
            class="block w-full py-3 px-1 mt-2
                    text-white appearance-none field
                    "
            v-model="Name"
            required
        />
        <label class="block text-xs font-semibold text-white uppercase mt-3"
        >Last Name</label
        >
        <input
            type="text"
            placeholder="Enter your Last name"
            class="block w-full py-3 px-1 mt-2
                    text-white appearance-none field
                    "
            v-model="lastName"
            required
        />
        <label class="block text-xs font-semibold text-white uppercase mt-3"
        >Email</label
        >
        <input
            type="email"
            placeholder="Enter your Email"
            autocomplete="email"
            class="block w-full py-3 px-1 mt-2
                    text-white appearance-none field
                    "
            v-model="email"
            required
        />

        <!-- Auth Buttton -->
        <button
            @click="token()"
            type="submit"
            class="w-full py-3 mt-10 bg-gray-400 rounded-sm
                    font-medium text-white uppercase
                    focus:outline-none hover:bg-gray-500  font-benne "
        >
          Register
        </button>

        <!-- Another Auth Routes -->
        <div class="sm:flex sm:flex-wrap mt-8 sm:mb-4 text-sm text-center">


          <router-link class="m-auto font-play text-white underline " to="/login">Login</router-link>
        </div>
      </div>
    </form>

  </div>

  <div>
    <div
        :class=" showToken ? 'block' : 'hidden'"
        class="w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-black bg-opacity-10">
      <div class="flex flex-col  bg-white shadow-md hover:shodow-lg">
        <div class="flex items-center justify-between  rounded-2xl">
          <div class="p-4 bg-red-500 text-indigo-50">
            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
            </svg>
          </div>
          <h4 class="p-4 bg-gray-100 rounded-md ">{{ tokenG }}</h4>
          <button class="p-4" @click="token(); redirect()">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

import Form from "./form"


export default {
  name: "formReg",
  components: {Form},
  data() {
    return {
      showToken: false,
      Name: '',
      lastName: '',
      email: '',
      tokenG: ''
    }
  }
  ,
  methods: {

    send() {

      fetch('http://localhost/brief-6/api/insertUser.php?Name=' + this.Name + '&lastName=' + this.lastName + '&email=' + this.email, {

        method: 'get',

      })
          .then(response => response.json())
          .then(data => this.tokenG = data)
          .then(this.token)


    },
    token() {
      if (this.tokenG.length) {
        this.showToken = !this.showToken

      }


    },

    redirect() {
      this.$router.push('/login')
    }


  }

}


</script>

<style scoped>

</style>