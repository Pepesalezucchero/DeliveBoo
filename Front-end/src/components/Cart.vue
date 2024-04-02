<script>
import CartBurger from "./CartBurger.vue";
export default {
	props: ["changing", "reset"],
	components: {
		CartBurger,
	},
	data() {
		return {
			cart: [],
		};
	},
	created() {
		this.loadCartFromLocalStorage();
	},
	watch: {
		changing: function () {
			this.loadCartFromLocalStorage();
		},
		reset: function () {
			this.cart = [];
			//this.loadCartFromLocalStorage();
		},
	},
	methods: {
		clearCart() {
			this.cart = [];
			localStorage.clear();
			this.showRestaurantCartModal = false;
			console.log(this.clearCart);
			this.$emit("carrelloCancellato");
			this.$emit("svuotaCarrello");
		},

		loadCartFromLocalStorage() {
			const savedCart = localStorage.getItem("cart"); // ottiene il carrello salvato dal localStorage
			if (savedCart) {
				this.cart = JSON.parse(savedCart); // se ci sono dati nel localStorage, li carica nel carrello del componente
			}
		},
	},
};
</script>

<template>
	<CartBurger :cart="this.cart" @deleteCart="clearCart" />
</template>
