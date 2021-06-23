<template>
  <div class=" dash  mx-auto px-4 sm:px-8 h-screen  ">
    <div class="py-8 mt-auto">
      <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto flex mt-10">
        <div
            class="inline-block min-w-full shadow rounded-lg overflow-hidden mt-32"
        >
          <h1
              class="text-white uppercase font-play text-4xl mb-32 text-center "
          >
            appointment booking and schedule
          </h1>

          <div class="flex items-center gap-4 m-4">
            <h1 class="text-2xl font-semibold text-white">Select Date : </h1>
            <input
                class="inp text-gray-500 text-2xl"
                @change="dataPick()"
                v-model="date"
                :min="dateNow"
                type="date"
            />
          </div>
          <table class="min-w-full leading-normal hidden" >
            <thead class="bg-white bg-opacity-30 ">
            <tr class="">
              <!-- lawyer -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal "
              >
                Appointment
              </th>
              <!-- Schdule number -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal"

              >
                Date
              </th>
              <!-- Schadule -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal"
              >
                schedule
              </th>
              <!-- availability -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal text-center"
              >
                Action
              </th>

            </tr>
            </thead>
            <tbody class="">
            <tr
                v-for="item in schedule"
                :key="item.id"
                class="bg-white bg-opacity-30 border-b border-gray-300 candice " v-bind:id="item.id"
            >
              <!-- lawyer -->
              <td class="px-5 py-5 text-base font-medium tracking-wider  ">
                <div class="flex items-center ">
                  <div class="ml-3">
                    <p class="text-white whitespace-no-wrap rdvId ">
                      {{ item.id }}
                    </p>
                  </div>
                </div>
              </td>
              <!-- Schdule date -->
              <td class="px-5 py-5 text-base font-medium tracking-wider ">
                <div class="flex items-center">
                  <div class="ml-3">
                    <p class="text-white whitespace-no-wrap">
                      {{ date }}
                    </p>
                  </div>
                </div>
              </td>
              <!-- Schedule time -->
              <td class="px-5 py-5 text-base font-medium tracking-wider ">
                <div class="flex items-center">
                  <div class="ml-3">
                    <p class="text-white whitespace-no-wrap">
                      {{ item.start }}
                    </p>
                  </div>
                </div>
              </td>
              <!-- availability -->
              <td v-bind:id="item.id" class="px-5 py-5 text-sm action ">
                  <button @click="send(item.id, item.start)" class=" w-full py-2 px-6 bg-black text-white hover:bg-gray-800 rounded-xl ">
                    Book Now
                  </button>
              </td>
            </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Table",
  data() {
    return {
      schedule: [],
      dateNow: new Date().toISOString().slice(0, 10),
      token: sessionStorage.getItem("token"),
      RdvId: "",
      date: "--/--/----",
      myRdv: "",
    };
  },
  mounted() {
    fetch("http://localhost/Api/api/api.php")
        .then((response) => response.json())
        .then((data) => (this.schedule = data))
        .then(this.checkRdvExist);
    // this.checkRdvExist();
    this.sendRdv();
    this.CheckSess();

  },

  methods: {
    send(id, start) {
      fetch(
          "http://localhost/brief-6/api/insertRdv.php?rdv_id=" + id + "&time=" + start + "&date=" + this.date + "&token=" + this.token,
          {
            method: "get",
          }
      ).then((response) => response.json());
      this.$router.push("/MyRdv");
    },

    dataPick() {
      // get reserve rdv id in the current date
      this.sendRdv();
      document.querySelector('table').classList.remove('hidden')
      fetch("http://localhost/brief-6/api/getRdv.php?date=" + this.date, {
        method: "get",
      })
          .then((response) => response.json())
          .then((data) => (this.RdvId = data))
          .then(this.checkRdvExist)
    },

    checkRdvExist() {
      const checkStatus = document.querySelectorAll(".action");
      checkStatus.forEach((el) => {
        el.querySelector("button").style.display = ('block');
        // console.log("stats");
      });

      // check if the rdv in the current date is taken
      if (this.RdvId.length !== 0) {
        checkStatus.forEach((element) => {
          this.RdvId.forEach((item) => {
            if (parseInt(item.Rdv_id) == parseInt(element.id)) {
              element.querySelector("button").style.display = ('none');
              // console.log( 'rdv id' , item.Rdv_id)
              // console.log( 'status id ' ,  element.id)
            }
          });
        });
      }
    },

    // get my reserve
    sendRdv() {
      fetch(
          "http://localhost/brief-6/api/getExistRdv.php?token=" + this.token,
          {
            method: "get",
          }
      )
          .then((response) => response.json())
          .then((data) => (this.myRdv = data));
    },
    CheckSess() {
      if (!sessionStorage.getItem("token")) {
        this.$router.push("/login");
      }
    },
  },

};
</script>

<style scoped></style>
