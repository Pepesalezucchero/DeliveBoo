<script>
export default {
	name: "CartBurger",
	props: ["cart"],
	data() {
		return {
			visibility: false,
			dishes: [],
			quantity: 1,
			showConfirmationModal: false,
			showRestaurantCartModal: false,
			itemIndexToRemove: null,
			windowWidth: window.innerWidth,
		};
	},
	methods: {
		ShowMenu() {
			this.visibility = true;
		},
		CloseMenu() {
			this.visibility = false;
		},

		increaseQuantity(index) {
			this.cart[index].quantity++;
			this.saveCartToLocalStorage();
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
		},
		removeItem() {
			this.cart.splice(this.itemIndexToRemove, 1);
			this.showConfirmationModal = false;
			this.$emit("carrelloCancellato");
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
		clearCart() {
			this.cart = [];
			localStorage.clear();
			console.log(this.clearCart);
			this.$emit("carrelloCancellato");
			this.showRestaurantCartModal = false;
			this.CloseMenu();
		},
		cancelAddToCart() {
			this.showRestaurantCartModal = false;
		},
		updateWindowWidth() {
			this.windowWidth = window.innerWidth;
		},
	},
	computed: {
		isMobile() {
			return this.windowWidth < 768; // Cambia il breakpoint se necessario
		},
	},
	mounted() {
		window.addEventListener("resize", this.updateWindowWidth);
	},
	beforeDestroy() {
		window.removeEventListener("resize", this.updateWindowWidth);
	},
};
</script>

<template>
	<div v-if="cart.length === 0">
		<div
			class="cart d-flex align-items-center justify-content-center rounded-circle"
		>
			<i
				class="fa-solid fa-cart-shopping p-2"
				@click.stop="ShowMenu"
				:class="{ opened: visibility }"
			></i>
		</div>
	</div>
	<div v-else>
		<h5 class="btn cart-order border" @click="ShowMenu">Il Tuo Ordine</h5>
	</div>

	<div
		class="container-fluid shadow-lg"
		:class="{ 'w-100': isMobile, 'w-50': !isMobile }"
		:style="{ right: visibility ? '0' : '-100%' }"
	>
		<div class="row">
			<i
				class="fa-solid fa-xmark text-end text-white pt-2 fs-2"
				@click="CloseMenu"
			></i>
			<div
				class="col-12 d-flex flex-column text-center align-items-center pt-3"
			>
				<div v-if="cart.length == 0">
					<h3 class="text-white">Il tuo carrello è vuoto</h3>
					<i class="fa-solid fa-cart-shopping text-white fs-3 mt-3"></i>
				</div>

				<div v-else>
					<h5 class="mb-3 text-white fs-3">Il tuo ordine</h5>
				</div>
				<div class="row">
					<div
						class="col-12 d-flex justify-content-around text-start"
						v-for="(item, index) in cart"
						:key="index"
					>
						<div class="col-4">
							<p>{{ item.name }}</p>
						</div>

						<div class="d-flex col-7 justify-content-end border">
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
							<p class="ps-3">{{ item.price }} &euro;</p>
						</div>
					</div>
					<div class="text-center">
						<div v-if="cart.length > 0">
							<h6 class="my-3">Totale {{ calcTotal() }} &euro;</h6>

							<router-link to="/order" class="btn btn-light">
								Riepilogo ordine
							</router-link>
							<button
								class="btn btn-light mx-3"
								@click="
									$emit('deleteCart');
									CloseMenu();
								"
							>
								Svuota carrello
							</button>
						</div>
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
				<button class="btn btn-secondary px-5" @click="cancelRemove">No</button>
			</div>
		</div>
	</div>
	<!-- Modal per confermare lo svuotamento del carrello -->
	<div class="modal" v-if="showClearCartModal">
		<div class="modal-content text-center">
			<p>Sei sicuro di voler svuotare il carrello?</p>
			<div class="modal-buttons">
				<button class="btn btn-secondary px-5" @click="confirmClearCart">
					Sì
				</button>
				<button class="btn btn-secondary px-5" @click="cancelClearCart">
					No
				</button>
			</div>
		</div>
	</div>
</template>

<style scoped lang="scss">
.cart {
	position: fixed;
	top: 135px;
	right: 2%;
	width: 50px;
	height: 50px;
	z-index: 50;
	background-color: #e69c23;
	background-color: white;
	.fa-solid {
		font-size: 25px;
		color: white;
		color: #e69c23;
	}
}

.cart-order {
	position: fixed;
	top: 135px;
	right: 0.4%;
	z-index: 50;
	background-color: #e69c23;
	color: white;
	&:hover {
		color: black;
	}
}

.container-fluid {
	position: fixed;
	height: 100vh;
	top: 120px;
	z-index: 60;
	border-top-left-radius: 10px;
	border-bottom-left-radius: 10px;
	transition: right 0.8s linear;
	background-color: white;
	background-image: url("../../public/img/wave.svg");
	background-repeat: no-repeat;
	background-size: cover;
	background-position-x: 35%;
}
@media all and (max-width: 991px) {
	.container-fluid {
		border-top-left-radius: 0px;
		border-bottom-left-radius: 0px;
	}
}

.modal {
	display: block;
	animation: slide-in 0.4s linear;
	position: fixed;
	top: 0%;
	right: 0%;
	width: 100%;
	margin: 0 auto;
	height: 140px;
	color: white;
	border-radius: 0;
	border: 0;
}
.modal-content {
	padding: 20px;
	background-color: #333;
	border: 0;
	border-radius: 0;

	border: 0;
}
@keyframes slide-in {
	from {
		top: -10%;
		opacity: 0;
	}
	to {
		top: 0%;
		opacity: 1;
	}
}

.modal-buttons button {
	cursor: pointer;
	margin: 0 30px;
	background-color: #e69c23;
}

.btn {
	transition: 0.5s;
	&:hover {
		color: black;
	}
}
</style>
