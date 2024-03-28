import { createRouter, createWebHistory } from "vue-router";

import HomePage from "./pages/HomePage.vue";

import About from "./pages/About.vue";

import Service from "./pages/Service.vue";

import Contact from "./pages/Contact.vue";

import Menu from "./components/Menu.vue";

import OrderRecap from "./components/OrderRecap.vue";

import ConfirmPayment from "./components/ConfirmPayment.vue";

import NotFound from "./pages/NotFound.vue"

import TypologyNotFound from "./components/TypologyNotFound.vue";

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
		{
			path: "/success",
			name: "success",
			component: ConfirmPayment,
		},
		{
            path: '/:pathMatch(.*)*',
            name: 'notfound',
            component: NotFound,
        },
	],
});
export { router };
