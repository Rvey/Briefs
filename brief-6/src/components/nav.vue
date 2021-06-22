<template>
  <nav
      class="menu top-0 absolute z-50 w-full flex flex-wrap items-center justify-between px-2 py-3 "
  >
    <div
        class="menu container px-4 mx-auto flex flex-wrap items-center justify-between"
    >
      <div
          class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
      >
        <router-link
            to="/"
            class="text-sm font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase text-white bg-none"
        >homr
        </router-link>
        <!-- burger-menu -->

        <button
            @click="toggleNavbar()"
            class="  menu cursor-pointer leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
            type="button"
        >
          <svg
              class="w-9 h-9 text-white"
              fill="none"
              stroke="currentColor"
              viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg"
          >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16m-7 6h7"
            ></path>
          </svg>
        </button>
      </div>
      <!-- menu -->
      <div
          class=" menu lg:flex flex-grow  lg:bg-transparent lg:shadow-none lg:relative lg:h-1 sm:top-0 sm:right-0 bg-gray-900 w-80 px-3  "
          :class="{ hidden: !showMenu, block: showMenu }"
      >
        <ul
            class="flex flex-col items-center p-3  lg:flex-row list-none lg:ml-auto "
        >
          <li class="flex items-center">
            <router-link
                @click="toggleNavbar()"
                to="/login"
                class="bg-none border-gray-50 lg:border-2 border-b-2  text-white text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            >login
            </router-link>
          </li>
          <li class="flex items-center">
            <router-link
                @click="toggleNavbar()"
                to="/register"
                class="bg-none border-gray-50 lg:border-2 border-b-2  text-white text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            >Register
            </router-link>
          </li>
          <li class="flex items-center">
            <router-link
                @click="toggleNavbar()"
                to="/dashboard"
                class="bg-none border-gray-50 lg:border-2 border-b-2  text-white text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            >Reservations
            </router-link>
          </li>
          <li class="flex items-center">
            <router-link
                @click="toggleNavbar()"
                to="/MyRdv"
                class="bg-none border-gray-50 lg:border-2 border-b-2   text-white text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
            >MyRdv
            </router-link>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "Nav",
  data() {
    return {
      showMenu: false,
    };
  },
  methods: {
    toggleNavbar: function () {
      this.showMenu = !this.showMenu;
    },
  },
};
</script>
