<script>
export default {
	name: "CartBurger",
	props: ["cart"],
	data() {
		return {
			visibility: true,
			dishes: [],
			quantity: 1,
			showConfirmationModal: false,
			showRestaurantCartModal: false,
			itemIndexToRemove: null,
			cart: this.cart,
		};
	},
	methods: {
		ShowMenu() {
			this.visibility = !this.visibility;
		},
		CloseMenu() {
			this.visibility = false;
		},

		addToCart(dish) {
			// se il carrello è vuoto o se restaurant_id non è uguale per tutti i piatti del carrello allora mando avviso
			if (
				this.cart.length === 0 ||
				this.cart.every((item) => item.restaurant_id === dish.restaurant_id)
			) {
				const existingCartItemIndex = this.cart.findIndex(
					(item) => item.id === dish.id
				);

				if (existingCartItemIndex !== -1) {
					this.cart[existingCartItemIndex].quantity++;
				} else {
					const cartItem = Object.assign({}, dish); // Clono l'oggetto dish
					cartItem.quantity = 1; // Imposto la quantità iniziale a 1
					this.cart.push(cartItem);
				}

				// Salva il carrello nel localStorage
				this.saveCartToLocalStorage();
			} else {
				this.showRestaurantCartModal = true;
			}
		},
		increaseQuantity(index) {
			this.cart[index].quantity++;
			this.saveCartToLocalStorage();
			console.log("+1");
		},
		decreaseQuantity(index) {
			if (this.cart[index].quantity > 1) {
				this.cart[index].quantity--;
				this.saveCartToLocalStorage();
			} else {
				this.itemIndexToRemove = index;
				this.cart[index].quantity = 0;
				this.showConfirmationModal = true;
				this.saveCartToLocalStorage();
			}
			console.log("-1");
		},
		removeItem() {
			this.cart.splice(this.itemIndexToRemove, 1);
			this.showConfirmationModal = false;
			localStorage.clear();
		},
		cancelRemove() {
			this.showConfirmationModal = false;
			this.cart[this.itemIndexToRemove].quantity = 1;
		},
		calcTotal() {
			let total = 0;
			for (let i = 0; i < this.cart.length; i++) {
				// moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
				total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
			}
			return total.toFixed(2);
		},
		saveCartToLocalStorage() {
			localStorage.setItem("cart", JSON.stringify(this.cart)); // salva il carrello come stringa JSON nel localStorage
		},
		loadCartFromLocalStorage() {
			const savedCart = localStorage.getItem("cart"); // ottiene il carrello salvato dal localStorage
			if (savedCart) {
				this.cart = JSON.parse(savedCart); // se ci sono dati nel localStorage, li carica nel carrello del componente
			}
		},
		clearCart() {
			this.cart = [];
			localStorage.clear();
			this.showRestaurantCartModal = false;
			console.log(this.clearCart);
		},
		cancelAddToCart() {
			this.showRestaurantCartModal = false;
			console.log("svuota carrello");
		},
	},
	mounted() {
		this.loadCartFromLocalStorage();
	},
};
</script>

<template>
	<div>
		<div
			class="cart d-flex align-items-center justify-content-center rounded-circle"
			v-if="!visibility"
		>
			<i
				class="fa-solid fa-cart-shopping p-2"
				@click.stop="ShowMenu"
				:class="{ opened: visibility }"
			></i>
		</div>

		<div
			class="container shadow-lg"
			:style="{ right: visibility ? '0' : '-250px' }"
			@click.stop
		>
			<div class="row">
				<i
					class="fa-solid fa-xmark text-end text-white pt-2 fs-2"
					@click.stop="ShowMenu"
				></i>
				<div class="col-12 d-flex flex-column align-items-center pt-5">
					<div v-if="cart.length == 0">
						<h3>Il tuo carrello è vuoto</h3>
						<i class="fa-solid fa-cart-shopping"></i>
					</div>

					<div v-else>
						<h5 class="mb-3">Il tuo ordine</h5>
					</div>
					<div class="row">
						<div
							class="col-12 text-center"
							v-for="(item, index) in cart"
							:key="index"
						>
							<p class="">{{ item.name }} - {{ item.price }}&euro;</p>

							<div
								style="height: 30px"
								class="d-flex justify-content-center align-item-center my-2"
							>
								<i
									class="fa-solid fa-minus mt-1"
									@click="decreaseQuantity(index)"
								></i>
								<p class="mb-1 mx-2" v-if="item.quantity > 0">
									{{ item.quantity }}
								</p>
								<span v-else class="item-quantity mx-2">0</span>
								<i
									class="fa-solid fa-plus mt-1"
									@click="increaseQuantity(index)"
								></i>
							</div>
						</div>
						<div v-if="cart.length > 0">
							<h6 class="my-3">Totale {{ calcTotal() }} &euro;</h6>

							<router-link to="/order" class="btn btn-secondary mb-sm-3">
								Riepilogo ordine
							</router-link>
							<button
								class="btn btn-secondary mb-sm-3 ms-xl-2"
								@click="clearCart"
							>
								Svuota carrello
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal" v-if="showConfirmationModal">
			<div class="modal-content text-center">
				<p>Sei sicuro di voler rimuovere questo elemento dal carrello?</p>
				<div class="modal-buttons">
					<button class="btn btn-secondary px-5" @click="removeItem">Sì</button>
					<button class="btn btn-secondary px-5" @click="cancelRemove">
						No
					</button>
				</div>
			</div>
		</div>
		<!-- modal di avviso mono carrello e opzione svuota carrello -->
		<div class="modal" v-if="showRestaurantCartModal">
			<div class="modal-content text-center">
				<p>
					Non è possibile aggiungere piatti di diversi ristoranti allo stesso
					carrello.
				</p>
				<div class="modal-buttons">
					<button class="btn btn-secondary" @click="clearCart()">
						Svuota carrello
					</button>
					<button class="btn btn-secondary" @click="cancelAddToCart()">
						Annulla
					</button>
				</div>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
.cart {
	position: fixed;
	top: 130px;
	right: 1%;
	width: 50px;
	height: 50px;
	background-color: #e69c23;
	background-color: white;
	z-index: 500;
	transition: 0.3s;
	.fa-solid {
		font-size: 25px;
		color: white;
		color: #e69c23;
	}
}

.container {
	position: fixed;
	width: 400px;
	height: 100vh;
	right: 0;
	top: 120px;
	z-index: 999;
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
	transition: right 1s;
	background-color: white;
	animation: slide-in 0.5;
	background-image: url("../../public/img/wave.svg");
	background-repeat: no-repeat;
	background-size: cover;
	background-position-x: 35%;
}
@keyframes slide-in {
	from {
		right: -250px;
	}

	to {
		right: 0;
	}
}
</style>
