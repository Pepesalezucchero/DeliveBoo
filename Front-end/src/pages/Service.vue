<script>
import NavBar from "/src/components/NavBar.vue";
import Cart from "../components/Cart.vue";
import Footer from "/src/components/Footer.vue";
export default {
	components: {
		NavBar,
		Cart,
		Footer,
	},
};
</script>

<template>
	<NavBar />
	<cart />
	<Footer />
</template>
