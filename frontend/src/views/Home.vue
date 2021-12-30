<template>
  <div class="home">
    <h3 class="text-xl text-center leading-6 font-medium text-gray-900 mb-4">
    Welcome to School Bookstore
    </h3>

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
