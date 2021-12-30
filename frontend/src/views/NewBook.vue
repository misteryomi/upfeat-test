<template>
<div>

<div>
    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4">
    Add New Book
    </h3>
</div>

  <form class="space-y-8 divide-y divide-gray-200" enctype="multipart/form-data" method="post" action="#" @submit="submitBookData" id="newBookForm">
    <div class="space-y-8 divide-y divide-gray-200">
      <div>

        <p class="p-5 bg-red-100 rounded" v-if="errors">
            <b>{{ errorMessage }}</b>
            <ul>
                <li v-for="error in errors" :key="error">&bull; {{ error[0] }}</li>
            </ul>
        </p>

        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6  bg-white p-4 border border-gray-100 shadow rounded-md p-10">
            
          <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium text-gray-700">
              Book Title
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
               <input name="title" type="text" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400"/>
            </div>
          </div>

          <div class="sm:col-span-6">
            <label for="about" class="block text-sm font-medium text-gray-700">
              Book Description
            </label>
            <div class="mt-1">
              <textarea id="description" name="description" rows="3" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400"></textarea>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium text-gray-700">
              Author Name
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
               <input type="text" name="author" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400"/>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium text-gray-700">
              Amount
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
              <input type="number" name="amount" id="amount" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400"/>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium text-gray-700">
              ISBN
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
               <input type="text" name="isbn" class="flex-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full min-w-0 rounded-md sm:text-sm bg-white border-gray-400"/>
            </div>
          </div>

          <div class="sm:col-span-4">
            <label for="username" class="block text-sm font-medium text-gray-700">
              Book Cover Image
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <input type="file" name="cover_image" id="cover_image" />
            </div>
          </div>

        </div>
      </div>

    </div>

    <div class="pt-5">
      <div class="flex justify-end">
        <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          Save
        </button>
      </div>
    </div>
  </form>
</div>
</template>

<script>
import BaseInput from '../components/Forms/Input.vue';
import TextArea from '../components/Forms/TextArea.vue';
import api from '../utils/constants';

export default {
    components: {
        BaseInput,
        TextArea
    },
    data() {
        return {
            errors: null,
            errorMessage: null,
            loading: false,
        }
    },
    methods: {

         
        async submitBookData(e) {
            e.preventDefault();

            //Clear errors
            this.errors = null;
            this.errorMessage = null;
            
            //Get form data
    		    var _formData = new FormData(document.querySelector('#newBookForm'));    

            //Submit form data
            const response = await fetch(`${api.baseURL}books`, {
                    method: 'POST',
                    body: _formData
                });

            const data = await response.json();

            if(data.errors) {
                this.errors = data.errors
                this.errorMessage = data.message

                this.$toast.open({
                        message: data.message,
                        type: 'error',
                    });

            } else {
                this.$toast.open({
                        message: 'Book added successfully!',
                        type: 'success'
                    });

                //Redirect to book page
                this.$router.push({ path: `/book/${data.data.id}`})
            }

            this.loading = false;
            
        },
    },
}
</script>
