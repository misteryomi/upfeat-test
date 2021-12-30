<template>
  <div class="test">
    <br/>

    <h1 class="title">
      This is the Upfeat Test for PHP Laravel backend and Vue Frontend
    </h1>

    <br/><br/>

    <p>See <code>README.md</code> for more information.</p>

    <p>
      Recommended IDE setup:
      <a href="https://code.visualstudio.com/" target="_blank">VSCode</a>
      +
      <a href="https://github.com/johnsoncodehk/volar" target="_blank">Volar</a>
    </p>

    <p>
      <a href="https://vitejs.dev/guide/features.html" target="_blank">
        Vite Docs
      </a>
      |
      <a href="https://v3.vuejs.org/" target="_blank">Vue 3 Docs</a>
    </p>

    <p>
      Edit
      <code>components/Test.vue</code> to test hot module replacement.
    </p>

    <br/><br/>

    <p v-if="serverMessage"><strong>Backend server message: </strong>{{ serverMessage }}</p>

    <button type="button" @click="count++">Click Test - Count: {{ count }}</button>
  </div>

</template>

<script setup lang="ts">
import { ref } from 'vue'

const count = ref(0)
const serverMessage = ref('')

const init = async () => {
  const response = await fetch("/api/start");
  const data = await response.json();
  serverMessage.value = data.message;
};

init();
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.test {
  .title {
  }
}

a {
  color: #42b983;
}

br {
  margin-top: 2rem;
  margin-bottom: 2rem;
}

label {
  margin: 0 0.5em;
  font-weight: bold;
}

code {
  background-color: #eee;
  padding: 2px 4px;
  border-radius: 4px;
  color: #304455;
}
</style>
