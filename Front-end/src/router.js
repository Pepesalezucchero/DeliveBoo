import { createRouter, createWebHistory } from "vue-router";

import LandingPage from "./pages/LandingPage.vue";

import HomePage from "./pages/HomePage.vue";

import About from "./pages/About.vue";

import Contact from "./pages/Contact.vue";

import Menu from "./components/Menu.vue";

import OrderRecap from "./components/OrderRecap.vue";

import TypologyNotFound from "./components/TypologyNotFound.vue";

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
			path: "/menu/:id/:name",
			name: "menu",
			component: Menu,
			props: true,
		},
		{
			path: "/notfound",
			name: "notfound",
			component: TypologyNotFound,
		},
		{
			path: "/order",
			name: "order",
			component: OrderRecap,
			props: true,
		},
	],
});
export { router };
