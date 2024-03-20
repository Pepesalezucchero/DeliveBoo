<script>
export default {
	name: "OrderRecap",
	data() {
		return {
			cart: [],
		};
	},
	methods: {},
	created() {
		this.cart = JSON.parse(this.$route.params.cartDetails);
	},
};
</script>

<template>
	<div class="container">
		<h2>Riepilogo ordine</h2>

		<!-- Visualizza i dettagli del carrello -->
		<div v-if="cart.length > 0">
			<ul>
				<li v-for="(item, index) in cart" :key="index">
					<p>{{ item.name }} - {{ item.price }} &euro;</p>
				</li>
			</ul>
		</div>

		<!-- Messaggio se il carrello è vuoto -->
		<div v-else>
			<p>Il carrello è vuoto</p>
		</div>
	</div>
</template>

<style scoped lang="scss"></style>
