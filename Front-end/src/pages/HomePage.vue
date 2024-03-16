<script>
import { store } from "../store";
import axios from "axios";
// import NavBar from "/src/components/NavBar.vue";
// import Jumbotron from "/src/components/Jumbotron.vue";
// import Carousel from "/src/components/Carousel.vue";
// import Footer from "/src/components/Footer.vue";

export default {
	components: {
		// NavBar,
		// Jumbotron,
		// Carousel,
		// Footer,
	},
	data() {
		return {
			store,
			typology: [],
		};
	},
	methods: {},
	mounted() {
		axios
			.get("http://localhost:8000/api/v1/...")
			.then((res) => {
				console.log(res.data);
				this.events = res.data;
			})
			.catch((err) => {
				console.log(err);
			});
	},
};
</script>

<template>
	<!-- <NavBar /> -->
	<section class="py-5">
		<div class="container">
			<div class="row">
				<h2 class="text-center">cosa vuoi mangiare?</h2>
				<div class="col-12 d-flex justify-content-center flex-wrap">
					<div class="choices pb-4" v-for="typology in 8">
						<input type="checkbox" class="me-1" name="" value="" />
						<label class="me-4" for="name">Typology</label>
					</div>
				</div>
			</div>

			<div class="row gy-4 justify-content-sm-center">
				<div
					class="col-sm-6 col-md-4 col-lg-3 d-flex justify-content-center"
					v-for="restaurant in 8"
				>
					<div class="card shadow-sm">
						<img
							src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
							class="card-img-top"
							alt="immagine ristoranti"
						/>
						<div class="card-body text-center">
							<h5 class="card-title">Restaurant.name</h5>
							<p class="card-text">restaurant.tipology</p>
							<a href="#" class="btn btn-primary">vedi piatti</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- <Jumbotron /> -->
	<!-- <Carousel /> -->
	<!-- <Footer /> -->
</template>

<style scoped lang="scss">
section {
	background-color: #ddd;
	height: 100vh;
}

.container {
	width: 100%;
	margin: 0 auto;
}
</style>
