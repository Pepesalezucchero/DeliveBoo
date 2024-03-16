<script>
import { store } from "../store";
export default {
	data() {
		return {
			store,
		};
	},
};
</script>

<template>
	<div class="container-fluid py-5">
		<div class="row gy-4 justify-content-sm-center">
			<div
				class="col-sm-6 col-md-4 col-lg-3 border d-flex justify-content-center"
				v-for="restaurant in 50"
			>
				<div class="card">
					<img
						src="https://www.italiaatavola.net/images/contenutiarticoli/kuiri-food-delivery.jpeg"
						class="card-img-top"
						alt="immagine ristoranti"
					/>
					<div class="card-body">
						<h5 class="card-title">Nome Ristorante</h5>
						<p class="card-text">descrizione ristorante</p>
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
