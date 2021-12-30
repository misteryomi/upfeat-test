<template>
  <div id="app">
    <navbar />
    <div class="m-10">
      <router-view/>
    </div>
  </div>
</template>

<!--script setup lang="ts"-->
<script>
import Navbar from './components/Navbar.vue'

export default {
  components: {
    Navbar,
  },
}
</script>

