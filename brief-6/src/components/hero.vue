<template>

  <div
      class="relative pt-16 pb-32 flex content-center items-center justify-center"
      style="min-height: 100vh;"
  >
    <div
        class="back absolute top-0 w-full h-full bg-center bg-cover"

    >
          <span
              id="blackOverlay"
              class="w-full h-full absolute opacity-75 bg-black"
          ></span>
    </div>
    <div class="container relative mx-auto">
      <div class="items-center flex flex-wrap">
        <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
          <div>
            <h1 class="text-white font-medium text-5xl font-play">
              The Law Offices of Homer Perliss
            </h1>
            <p class="mt-4 text-lg text-gray-300 font-benne">
              Former California Prosecutor Now Fighting For You. We are experts from both sides of the courtroom.
              "I am kind to the weak, I am brave against the strong, I will fight for those who cannot fight, I will
              help those who call me for help." By Sanford Perliss
            </p>
          </div>
        </div>
      </div>
    </div>
    <div
        class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
        style="height: 70px;"
    >
      <svg
          class="absolute bottom-0 overflow-hidden"
          xmlns="http://www.w3.org/2000/svg"
          preserveAspectRatio="none"
          version="1.1"
          viewBox="0 0 2560 100"
          x="0"
          y="0"
      >
        <polygon
            class="text-gray-300 fill-current"
            points="2560 0 2560 100 0 100"
        ></polygon>
      </svg>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Hero',
  setup() {

  },
}
</script>