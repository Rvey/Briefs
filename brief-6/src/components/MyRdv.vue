<template>
  <section class="myRdv h-screen text-gray-600 body-font">
    <div class="  container px-5 py-24 mx-auto">
      <!--      cards header-->
      <div class="flex flex-col">
        <h1 class="text-white text-5xl mb-3 font-benne ">My Appointment </h1>
        <div class="h-1 bg-gray-200 rounded overflow-hidden">

        </div>
        <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
          <!--          <h1 class="sm:w-2/5 text-gray-200 font-medium title-font text-2xl mb-2 sm:mb-0">Welcome {{ token }}</h1>-->
        </div>
      </div>
      <!--      cards container-->
      <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
        <div v-for="(item,index)  in myRdv ">
          <div class="shadow-lg rounded-xl bg-gray-200 w-full md:w-64 p-6 relative overflow-hidden m-4 ">

            <p class="text-black text-xl flex items-center gap-2">
             <span class="rounded-lg p-2 bg-gray-300 text-black">
<svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path
    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </span>
              Appointment {{ index + 1 }}
            </p>
            <div class="flex items-center my-4 text-blue-500 rounded justify-between">
              <div class="flex flex-col w-full ml-2 items-start justify-evenly">
                <p class="text-black  font-semibold text-lg">
                  Time
                </p>
                <p class="text-gray-500  font-semibold text-lg">
                  {{ item.time }}
                </p>
              </div>
            </div>
            <div class="flex items-center text-blue-500 rounded justify-between">
              <div class="flex flex-col w-full ml-2 items-start justify-evenly">
                <p class="text-black  font-semibold text-lg">
                  Day
                </p>
                <p class="text-gray-500  font-semibold text-lg">
                  {{ item.date }}
                </p>
              </div>
            </div>
            <div class="mt-4">
              <button @click="DeleteRdv(item.id)" type="button"
                      class="py-2 px-4  bg-red-300 hover:bg-red-800  focus:ring-offset-blue-200 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg ">
                Delete
              </button>
            </div>
          </div>


        </div>
      </div>
    </div>
  </section>


</template>

<script>
export default {
  name: "MyRdv",
  data() {
    return {
      token: sessionStorage.getItem('token'),
      myRdv: ''
    }
  },
  mounted() {
    this.sendRdv()
    this.CheckSess()
  }
  ,
  methods: {
    // get my reserve
    sendRdv() {
      fetch('http://localhost/brief-6/api/getExistRdv.php?token=' + this.token, {
        method: 'get'
      })
          .then(response => response.json())
          .then(data => this.myRdv = data)
      console.log(this.myRdv)
    },
    DeleteRdv(id) {
      fetch('http://localhost/brief-6/api/DeleteRdv.php?id=' + id, {
        method: 'get'
      })
      this.sendRdv()
    },

    CheckSess() {
      if (!sessionStorage.getItem('token')) {
        this.$router.push('/login')
      }
    }

  }
}
</script>

<style scoped>

</style>