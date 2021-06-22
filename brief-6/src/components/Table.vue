<template>
  <div class=" dash  mx-auto px-4 sm:px-8 h-screen ">
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
          <table class="min-w-full leading-normal  ">
            <thead class="bg-white bg-opacity-30 ">
            <tr>
              <!-- lawyer -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal"
              >
                Lawyer
              </th>
              <!-- Schdule number -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal"
              >
                Lawyer
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
                  class="px-5 py-3 text-white text-left text-sm uppercase font-normal"
              >
                availability
              </th>
              <!-- actions -->
              <th
                  scope="col"
                  class="px-5 py-3 text-white  text-sm uppercase font-normal text-center"
              >
                Action
              </th>
            </tr>
            </thead>
            <tbody class="">
            <tr
                v-for="item in schedule"
                :key="item.id"
                class="bg-white bg-opacity-30 border-b border-gray-300"
            >
              <!-- lawyer -->
              <td class="px-5 py-5 text-base font-medium tracking-wider ">
                <div class="flex items-center">
                  <div class="ml-3">
                    <p class="text-white whitespace-no-wrap rdvId">
                      {{ item.id }}
                    </p>
                  </div>
                </div>
              </td>
              <!-- Schdule number -->
              <td class="px-5 py-5 text-base font-medium tracking-wider ">
                <div class="flex items-center">
                  <div class="ml-3">
                    <p class="text-white whitespace-no-wrap">
                      {{ date }}
                    </p>
                  </div>
                </div>
              </td>
              <!-- Schedule -->
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
              <td v-bind:id="item.id" class="px-5 py-5 text-sm status ">
                  <span class=" py-2 px-4 bg-red-500 rounded-xl ">
                    free
                  </span>
              </td>
              <!-- actions -->
              <td v-bind:id="item.id" class=" text-sm candice">
                <svg
                    @click="send(item.id, item.start)"
                    class="w-6 h-6 m-auto text-white cursor-pointer "
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"
                  ></path>
                </svg>
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
      date: "",
      myRdv: "",
    };
  },
  mounted() {
    fetch("http://localhost/Api/api/api.php")
        .then((response) => response.json())
        .then((data) => (this.schedule = data))
        .then(this.checkRdvExist);
    this.checkRdvExist();
    this.sendRdv();
    this.CheckSess();
  },

  methods: {
    send(id, start) {
      fetch(
          "http://localhost/brief-6/api/insertRdv.php?rdv_id=" +
          id +
          "&time=" +
          start +
          "&date=" +
          this.date +
          "&token=" +
          this.token,
          {
            method: "get",
          }
      ).then((response) => response.json());
      this.$router.push("/MyRdv");
    },
    dataPick() {
      this.sendRdv();
      fetch("http://localhost/brief-6/api/getRdv.php?date=" + this.date, {
        method: "get",
      })
          .then((response) => response.json())
          .then((data) => (this.RdvId = data))
          .then(this.checkRdvExist);

      console.log(this.RdvId);
    },
    checkRdvExist() {
      var checkStatus = document.querySelectorAll(".status");

      checkStatus.forEach((el) => {
        el.querySelector("span").style.backgroundColor = "green";

        console.log("yes");
      });

      if (this.checkStatus !== 0) {
        checkStatus.forEach((element) => {
          if (this.RdvId.length != 0) {
            this.RdvId.forEach((item) => {
              if (parseInt(item.Rdv_id) == parseInt(element.id)) {
                element.querySelector("span").innerHTML = "Taken";
                element.querySelector("span").style.backgroundColor = "red";
              }
            });
          }
        });
      }

      var blockRes = document.querySelectorAll(".candice");

      blockRes.forEach((el) => {
        el.querySelector("svg").style.display = "block";
        console.log("yes");
      });

      if (this.blockRes !== 0) {
        blockRes.forEach((element) => {
          if (this.RdvId.length != 0) {
            this.RdvId.forEach((item) => {
              if (parseInt(item.Rdv_id) == parseInt(element.id)) {
                element.querySelector("svg").style.visibility = "hidden";
              }
            });
          }
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
      console.log(this.myRdv);
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
