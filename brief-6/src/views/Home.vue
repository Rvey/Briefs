<template>

  <Hero />
  <cards />
  <Footer />
</template>

<script>


import Hero from "@/components/hero.vue"
import cards from "@/components/cards.vue"
import Footer from "@/components/footer.vue"
export default {
  name: "Home",
  components: {
    Footer ,
    Hero,
    cards,
  },

};
</script>
