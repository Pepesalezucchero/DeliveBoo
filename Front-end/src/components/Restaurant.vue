<script>
import { store } from "../store";
import axios from 'axios';
export default {
	data() {
		return {
			store,
			restaurants: [],
		};
	},
	mounted(){
		axios
		.get("http://localhost:8000/api/deliveboo/restaurants")
		.then((res) => {
			console.log(res.data);
			this.restaurants = res.data.restaurants;
		})
		.catch((err) => {
				console.log(err);
		});

	}
};
</script>

<template>
	<div class="container-fluid py-5">
		<div class="row gy-4 justify-content-sm-center">
			<div
				class="col-sm-6 col-md-4 col-lg-3 border d-flex justify-content-center"
				v-for="(restaurant, index) in restaurants" :key="index"
			>
				<div class="card">
					<img
						src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
						class="card-img-top"
						alt="immagine ristoranti"
					/>
					<div class="card-body">
						<h5 class="card-title">{{ restaurant.name }}</h5>
						<p class="card-text">{{ restaurant.address }}</p>
						<a href="#" class="btn btn-primary">vedi piatti</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
@use "../styles/restaurant";
</style>
