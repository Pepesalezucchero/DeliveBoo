import { createRouter, createWebHistory } from "vue-router";

import Index from "./pages/index.vue";

const router = createRouter({
	history: createWebHistory(),
	// defizione path pages
	routes: [
		{
			path: "/",
			name: "index",
			component: Index,
		},
	],
});
export { router };
