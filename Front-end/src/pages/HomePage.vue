<script>
import NavBar from "/src/components/NavBar.vue";
import Jumbotron from "/src/components/Jumbotron.vue";
import Carousel from "/src/components/Carousel.vue";
import Footer from "/src/components/Footer.vue";

export default {
	components: {
		NavBar,
		Jumbotron,
		Carousel,
		Footer,
	},
};
</script>

<template>
	<NavBar />
	<Jumbotron />
	<Carousel />
	<Footer />
</template>
