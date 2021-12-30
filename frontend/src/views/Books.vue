<template>
  <div class="books">
    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
    Books Store
    </h3>


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
