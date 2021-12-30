<template>
  <div class="bg-white">

    <book-details-skeleton v-if="loading" />

    <div v-else class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
      <!-- Book details -->
      <div class="lg:max-w-lg lg:self-end">
        <nav aria-label="Breadcrumb">
          <ol role="list" class="flex items-center space-x-2">
            <li v-for="(breadcrumb, breadcrumbIdx) in breadcrumbs" :key="breadcrumb.id">
              <div class="flex items-center text-sm">
                <router-link :to="breadcrumb.href" class="font-medium text-gray-500 hover:text-gray-900">
                  {{ breadcrumb.name }}
                </router-link>
                <svg v-if="(breadcrumbIdx !== breadcrumbs.length - 1)" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="currentColor" aria-hidden="true" class="ml-2 flex-shrink-0 h-5 w-5 text-gray-300">
                  <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
              </div>
            </li>
          </ol>
        </nav>

        
        <div class="mt-4">
          <h1 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ book.title }}</h1>
        </div>

        <section aria-labelledby="information-heading" class="mt-4">
          <h2 id="information-heading" class="sr-only">Book information</h2>

          <div class="flex items-center">
            <p class="text-lg text-gray-900 sm:text-xl">{{ book.currency }} {{ book.amount }}</p>
          </div>

          <div class="flex items-center mt-2">
            <p class="text-gray-700 text-sm font-bold uppercase">ISBN: {{ book.isbn }}</p>
          </div>

          <div class="mt-4 space-y-6">
            <p class="text-base text-gray-500">{{ book.description }}</p>
          </div>

          <div class="mt-6 items-center">
            <p class="text-sm text-gray-500 flex">
              <router-link :to="`/book/edit/${book.id}`" class="mr-4 flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>              
              Edit Details</router-link>
              <a @click.prevent="handleDelete" class="flex">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="red">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>              
              Delete Book</a>
            </p>
          </div>
        </section>
      </div>

      <!-- Book image -->
      <div class="mt-10 lg:mt-0 lg:col-start-2 lg:row-span-2 lg:self-center">
        <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
          <img :src="book.image_url" :alt="book.title" class="w-full h-full object-center object-cover" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { PencilIcon, TrashIcon } from '@heroicons/vue/solid'
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { useRoute } from "vue-router";

import api from '../utils/constants';
import BookDetailsSkeleton from '../components/skeletons/BookDetailsSkeleton.vue';

export default {
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    TrashIcon,
    PencilIcon,
    BookDetailsSkeleton,
  },
  setup() {
    const route = useRoute()

    const breadcrumbs = [
        { id: 1, name: 'Books', href: '/books' },
        { id: 2, name: `Book #${route.params.id}`, href: '#' },
    ];
      
      return { breadcrumbs };
  },
 data() {
    return {
      book: {},
      loading: true,
    }
  },
  mounted() {
    this.getBookDetails();
  },
  methods: {
    async getBookDetails() {
        let id = this.$route.params.id;
        
        const response = await fetch(`${api.baseURL}books/${id}`);
        const data = await response.json();

        let _data = data.data;

        if(_data && data.status) {
          this.book = _data;
        }

        this.loading = false;
    },

    async handleDelete() {
        let id = this.$route.params.id;
        
        const response = await fetch(`${api.baseURL}books/${id}`, {method: 'DELETE'});
        const data = await response.json();

        let _data = data.data
        
        if(_data && data.status) {
            this.$toast.open({
                    message: 'Book deleted successfully!',
                    type: 'success'
                });

            //Redirect to books
        } else {
            this.$toast.open({
                    message: data.message,
                    type: 'error'
                });          
        }
        this.$router.push({ path: `/books`})

    }
  }
}
</script>

