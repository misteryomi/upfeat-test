<template>
  <div class="home">
    <books-list />
  </div>
</template>

<script>
// @ is an alias to /src
import BooksList from '../components/BooksList.vue';

export default {
  name: "home",
  components: {
    BooksList
  }
};
</script>
