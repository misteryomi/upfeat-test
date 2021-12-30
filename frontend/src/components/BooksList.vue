<template>
  <section aria-labelledby="books-heading" class="max-w-2xl mx-auto pt-12 pb-16 px-4 sm:pt-16 sm:pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <h2 id="books-heading">Books</h2>

    <skeleton :count=4 v-if="loading"/>

    <div v-else>
      <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8" v-if="books.length > 0">
        <a v-for="book in books" :key="book.id" :href="'/book/1'" class="group">
          <div class="w-full aspect-w-1 aspect-h-1 bg-gray-200 rounded-lg overflow-hidden xl:aspect-w-7 xl:aspect-h-8">
            <img :src="book.image_url" :alt="book.title" class="w-full h-full object-center object-cover group-hover:opacity-75" />
          </div>
          <h3 class="mt-4 text-sm text-gray-700">
            {{ book.title }}
          </h3>
          <p class="mt-1 text-lg font-medium text-gray-900">
            {{ book.currency }}{{ book.amount }}
          </p>
        </a>
      </div>

      <p v-else>No book found</p>
    </div>
  </section>
</template>

<script>
import Skeleton from './skeletons/BookSkeleton.vue';
import api from '../utils/constants';


export default {
  components: {
    Skeleton,
  },
  data() {
    return {
      books: [],
      meta: [],
      loading: true,
    }
  },
  mounted() {
    this.fetchBooks();
  },
  methods: {
    async fetchBooks() {
        const response = await fetch(`${api.baseURL}/api/books/list`);
        const data = await response.json();

        this.books = data.data;
        this.meta = data.meta;

        this.loading = false;
    }
  }
}
</script>