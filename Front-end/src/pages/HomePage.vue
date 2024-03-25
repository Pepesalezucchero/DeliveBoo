<script>
import NavBar from "../components/NavBar.vue";
import TypologyAndRestaurant from "../components/TypologyAndRestaurant.vue";
import Jumbotron from "../components/Jumbotron.vue";

export default {
	components: {
		NavBar,
		Jumbotron,
		TypologyAndRestaurant,
	},
};
</script>
<template>
	<NavBar />
	<Jumbotron />
	<TypologyAndRestaurant />
</template>
