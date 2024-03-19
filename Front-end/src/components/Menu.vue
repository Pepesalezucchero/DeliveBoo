<script>
import axios from "axios";
export default {
	name: "Menu",
	data() {
		return {
			dishes: [],
		};
	},
	methods: {
		getDishes() {
			const restaurantId = this.$route.params.id;
			axios
				.get(
					`http://localhost:8000/api/deliveboo/restaurants/${restaurantId}/dishes`
				)
				.then((res) => {
					console.log(res.data);
					this.dishes = res.data.dishes;
				})
				.catch((err) => {
					console.log(err);
				});
		},
	},
	mounted() {
		this.getDishes();
	},
};
</script>

<template>
	<div class="container">
		<div class="row gy-3 mt-5">
			<h2 class="text-center">I nostri piatti: {{ dishes.length }}</h2>
			<div class="col-3" v-for="(dish, index) in dishes" :key="index">
				<div class="card">
					<img
						src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
						class="card-img-top"
						alt="immagine ristoranti"
					/>
					<div class="card-body">
						<h5 class="card-title">{{ dish.name }}</h5>
						<p class="card-text d-flex">{{ dish.price }} &euro;</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss"></style>
