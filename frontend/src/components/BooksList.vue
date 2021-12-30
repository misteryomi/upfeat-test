<template>
  <section aria-labelledby="books-heading" class="max-w-2xl mx-auto pt-12 pb-16 px-4 sm:pt-16 sm:pb-24 sm:px-6 lg:max-w-7xl lg:px-8">
    <skeleton :count=4 v-if="loading"/>

    <div v-else>
      <div class="grid grid-cols-1 gap-y-10 sm:grid-cols-2 gap-x-6 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8" v-if="books.length > 0">
        <a v-for="book in books" :key="book.id" :href="`/book/${book.id}`" class="group">
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

        <div>
          <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
              <div>
                <p class="text-sm text-gray-700">
                  Showing
                  
                  <span class="font-medium">{{ meta.per_page }}</span>
                  
                  of
                  
                  <span class="font-medium">{{ meta.total }}</span>
                   
                  results
                </p>
              </div>     
            </div>
            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

              <a v-for="i in meta.links" :key="i" href="#" aria-current="page" class="z-10 bg-gray-50 border-gray-500 text-indigo-600 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                {{ i }}
              </a>
            </nav>

        </div>
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
        const response = await fetch(`${api.baseURL}books`);
        const data = await response.json();

        let _data = data.data;

        if(_data && data.status) {
          this.books = _data.data;
          this.meta = _data.meta;
        }
        this.loading = false;
    }
  }
}
</script>