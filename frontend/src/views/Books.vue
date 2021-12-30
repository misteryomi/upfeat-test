<template>
  <div class="books">
    <books-list />
  </div>
</template>

<script>
// @ is an alias to /src
import BooksList from '../components/BooksList.vue';

export default {
  name: "books",
  components: {
    BooksList
  }
};
</script>
