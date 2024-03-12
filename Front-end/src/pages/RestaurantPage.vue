<script>
import NavBar from "/src/components/NavBar.vue";

import Restaurant from "/src/components/Restaurant.vue";

import Footer from "/src/components/Footer.vue";

export default {
	components: {
		NavBar,
		Restaurant,
		Footer,
	},
};
</script>

<template>
	<NavBar />
	<Restaurant />
	<Footer />
</template>
