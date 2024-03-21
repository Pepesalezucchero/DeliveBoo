<script>
import axios from 'axios';
export default {
	name: "OrderRecap",
	data() {
		return {
			cart: [],
			order: {
        		name: '',
        		email: '',
        		phone: ''
      		}
		};
	},
	methods: {
		calcTotal() {
			let total = 0;
			for (let i = 0; i < this.cart.length; i++) {
				// moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
				total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
			}
			return total.toFixed(2); // mostra solo due cifre dopo la virgola
		},
		submitOrder() {
			const orderData = {
				customer_name: this.order.name,
				customer_email: this.order.email,
				customer_phone: this.order.phone,
				dishes: this.cart.map(item => ({
					dish_id: item.id,
					quantity: item.quantity
				}))
			};
			
			axios.post('http://localhost:8000/api/deliveboo/orders', orderData)
				.then(res => {
					console.log(res.data);
				})
				.catch(error => {
					console.error('Errore durante la creazione dell\'ordine:', error);
				});
			},
	},
	created() {
		const storedCart = localStorage.getItem('cart');
    	if (storedCart) {
			// Se ci sono, carica i dettagli del carrello
			this.cart = JSON.parse(storedCart);
		}
	},
}
</script>

<template>
	<div class="container">
		<h2>Riepilogo ordine</h2>

		<!-- Visualizza i dettagli del carrello -->
		<div v-if="cart.length > 0">
			<table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Quantità</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in cart" :key="index">
                        <td>{{ item.name }}</td>
                        <td>{{ item.price }} &euro;</td>
                        <td>{{ item.quantity }}</td>
                    </tr>
                </tbody>
            </table>
			<h4>Totale: {{ calcTotal() }}</h4>
		</div>

		<!-- Messaggio se il carrello è vuoto -->
		<div v-else>
			<p>Il carrello è vuoto</p>
		</div>

		<div class="mt-5">
			<h3>Inserisci i tuoi dati:</h3>
			<form @submit.prevent="submitOrder" class="needs-validation" novalidate>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
						<label for="name">Nome e Cognome:</label>
						<input type="text" name="name" id="name" v-model="order.name" class="form-control" required>
						<div class="invalid-feedback">
							Inserisci il tuo Nome e Cognome.
						</div>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="email" id="email" v-model="order.email" class="form-control" required>
						<div class="invalid-feedback">
							Inserisci un'email valida.
						</div>
					</div>
					</div>
				</div>
				<div class="form-group">
					<label for="phone">Telefono:</label>
					<input type="text" name="phone" id="phone" v-model="order.phone" class="form-control" required>
					<div class="invalid-feedback">
						Inserisci il tuo numero di telefono.
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-3">Invia Ordine</button>
			</form>
      	</div>
	</div>
</template>

<style scoped lang="scss"></style>
