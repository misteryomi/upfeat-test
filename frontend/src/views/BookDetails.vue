<template>
  <div class="bg-white">

    <book-details-skeleton v-if="loading" />

    <div v-else class="max-w-2xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:max-w-7xl lg:px-8 lg:grid lg:grid-cols-2 lg:gap-x-8">
      <!-- Product details -->
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

          <div class="mt-4 space-y-6">
            <p class="text-base text-gray-500">{{ book.description }}</p>
          </div>

          <div class="mt-6 flex items-center">
            <CheckIcon class="flex-shrink-0 w-5 h-5 text-green-500" aria-hidden="true" />
            <p class="ml-2 text-sm text-gray-500">In stock and ready to ship</p>
          </div>
        </section>
      </div>

      <!-- Product image -->
      <div class="mt-10 lg:mt-0 lg:col-start-2 lg:row-span-2 lg:self-center">
        <div class="aspect-w-1 aspect-h-1 rounded-lg overflow-hidden">
          <img :src="book.image_url" :alt="book.title" class="w-full h-full object-center object-cover" />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { CheckIcon, QuestionMarkCircleIcon, StarIcon } from '@heroicons/vue/solid'
import { RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption } from '@headlessui/vue'
import { ShieldCheckIcon } from '@heroicons/vue/outline'
import { useRoute } from "vue-router";

import api from '../utils/constants';
import BookDetailsSkeleton from '../components/skeletons/BookDetailsSkeleton.vue';

export default {
  components: {
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
    CheckIcon,
    QuestionMarkCircleIcon,
    ShieldCheckIcon,
    StarIcon,
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
        
        const response = await fetch(`${api.baseURL}books/details/${id}`);
        const data = await response.json();

        this.book = data;

        this.loading = false;
    }
  }
}
</script>

