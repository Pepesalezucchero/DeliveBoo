import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "./pages/LandingPage.vue";

import HomePage from "./pages/HomePage.vue";

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
	],
});
export { router };
