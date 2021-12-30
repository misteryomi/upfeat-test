import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import Home from '@/views/Home.vue';
import Books from '@/views/Books.vue';
import About from '@/views/About.vue';
import BookDetails from '@/views/BookDetails.vue';
import NewBook from '@/views/NewBook.vue';
import EditBook from '@/views/EditBook.vue';


const routes: Array<RouteRecordRaw> = [
  { path: '/', name: 'home', component: Home },
  { path: '/books', name: 'books', component: Books },
  { path: '/books/new', name: 'new-book', component: NewBook },
  { path: '/book/:id', name: 'book-details', component: BookDetails },
  { path: '/book/edit/:id', name: 'edit-book', component: EditBook },
  { path: '/about', name: 'About', component: About },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});
export default router;
