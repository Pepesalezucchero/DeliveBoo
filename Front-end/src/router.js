import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "./pages/LandingPage.vue";

import HomePage from "./pages/HomePage.vue";

import About from "./pages/About.vue";

import Contact from "./pages/Contact.vue";

import Location from "./pages/Location.vue";

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
			path: "/Location",
			name: "Location",
			component: Location,
		},
	],
});
export { router };
