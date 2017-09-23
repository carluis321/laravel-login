import VueRouter from 'vue-router';

import Index from './components/Index';
import Login from './components/Login';
import Reset from './components/Reset';

const routes = [
	{ path: '/', component: Index },
  { path: '/login', component: Login },
  { path: '/forgot', component: Reset }
]

export default new VueRouter({
  routes
});