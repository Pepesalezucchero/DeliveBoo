import { createRouter, createWebHistory } from "vue-router";

import HomePage from "./pages/HomePage.vue";

import About from "./pages/About.vue";

import Service from "./pages/Service.vue";

import Contact from "./pages/Contact.vue";

import Menu from "./components/Menu.vue";

import OrderRecap from "./components/OrderRecap.vue";

import ConfirmPayment from "./components/ConfirmPayment.vue";

import NotFound from "./pages/NotFound.vue";

const router = createRouter({
	history: createWebHistory(),
	// defizione path pages
	routes: [
		{
			path: "/",
			name: "homepage",
			component: HomePage,
		},
		{
			path: "/about",
			name: "about",
			component: About,
		},
		{
			path: "/service",
			name: "service",
			component: Service,
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
			path: "/order",
			name: "order",
			component: OrderRecap,
			props: true,
		},
		{
			path: "/success",
			name: "success",
			component: ConfirmPayment,
		},
		{
			path: "/:pathMatch(.*)*",
			name: "notfound",
			component: NotFound,
		},
	],
});
router.afterEach(() => {
	// Aggiungi un ritardo di 100ms prima di scorrere la finestra
	setTimeout(() => {
		// Scorri automaticamente fino all'inizio della pagina
		window.scrollTo(0, 0);
	}, 100);
});

export { router };
