<script>
import NavBar from "../components/NavBar.vue";
import Jumbotron from "../components/Jumbotron.vue";
import TypologyAndRestaurant from "../components/TypologyAndRestaurant.vue";
import BannerFood from "../components/BannerFood.vue";
import BusinessPart from "../components/BusinessPart.vue";
import Footer from "../components/Footer.vue";

export default {
	components: {
		NavBar,
		Jumbotron,
		TypologyAndRestaurant,
		BannerFood,
		BusinessPart,
		Footer,
	},
};
</script>
<template>
	<NavBar />
	<Jumbotron />
	<TypologyAndRestaurant />
	<BannerFood />
	<BusinessPart />
	<Footer />
</template>
