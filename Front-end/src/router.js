import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "./pages/LandingPage.vue";

import HomePage from "./pages/HomePage.vue";

import About from "./pages/About.vue";

import Contact from "./pages/Contact.vue";

import RestaurantPage from "./pages/RestaurantPage.vue";

const router = createRouter({
	history: createWebHistory(),
	// defizione path pages
	routes: [
		{
			path: "/",
			name: "/",
			component: LandingPage,
		},
		{
			path: "/homepage",
			name: "homepage",
			component: HomePage,
		},
		{
			path: "/about",
			name: "about",
			component: About,
		},
		{
			path: "/contact",
			name: "contact",
			component: Contact,
		},
		{
			path: "/restaurant",
			name: "restaurant",
			component: RestaurantPage,
		},
	],
});
export { router };
