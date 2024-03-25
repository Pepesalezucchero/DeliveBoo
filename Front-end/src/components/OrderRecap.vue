<script>
import axios from 'axios';
// import Payment from './Payment.vue';
export default {
	name: "OrderRecap",
	components:{
		// Payment
	},
	data() {
		return {
			cart: [],
			order:{
				address:'',
				date:'',
				amount:'',
				customer_name:'',
				customer_email: '',
				customer_phone: '',
				// dishes: ''
			},
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
		postOrder(){
			const orderData = {
				address: this.order.address,
				date: this.order.date,
				amount: this.order.amount,
				customer_name: this.order.customer_name,
				customer_email: this.order.customer_email,
				customer_phone: this.order.customer_phone,
				// dishes: this.cart
			};
			console.log(orderData);
			axios.post('http://localhost:8000/api/deliveboo/orders', orderData)
				.then((res) => {
					console.log(res.data);
				})
				.catch((err) =>{
					console.log(err);
				})

			this.order.address = '';
			this.order.date = '';
			this.order.amount = '';
			this.order.customer_name = '';
			this.order.customer_email = '';
			this.order.customer_phone = '';
			// Svuota il carrello
			// localStorage.removeItem('cart');
			// this.cart = [];
		}
	},
	created() {
		const storedCart = localStorage.getItem('cart');
    	if (storedCart) {
			// Se ci sono, carica i dettagli del carrello
			this.cart = JSON.parse(storedCart);
		}

		this.order.date = new Date().toISOString().slice(0, 19).replace('T', ' ');
		this.order.amount = this.calcTotal();
	},
	mounted(){
		const button = document.querySelector('#submit-button');
		const self = this;

		braintree.dropin.create({
			authorization: 'sandbox_4xv6ycm3_twmvqx3w3pnj3rps',
			container: '#dropin-container'
		}, function (err, instance) {
			if (err) {
				console.error(err);
				return;
			}
			
			button.addEventListener('click', function () {
				instance.requestPaymentMethod(function (payload) {
					$.ajax({
						type: 'POST',
						url: 'http://localhost:8000/api/payments',
						data: {
							'token': payload.nonce,
							'amount' : self.order.amount
						}
					}).done(function(result) {
						instance.teardown(function (teardownErr) {
							if (teardownErr) {
								console.error('Could not tear down Drop-in UI!');
							} else {
								console.info('Drop-in UI has been torn down!');
								$('#submit-button').remove();
							}
						});

						if (result.success) {
							$('#checkout-message').html('<h1>Success</h1><p>Your Drop-in UI is working! Check your <a href="https://sandbox.braintreegateway.com/login">sandbox Control Panel</a> for your test transactions.</p><p>Refresh to try another transaction.</p>');
						} else {
							console.log(result);
							$('#checkout-message').html('<h1>Error</h1><p>Check your console.</p>');
						}
					});
				});
			});
		});
	}
}

</script>


<template>
	<div class="container">
		<h2 class="mt-3">Riepilogo ordine</h2>

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
			<h4>Totale: {{ calcTotal() }} &euro;</h4>
		</div>

		<!-- Messaggio se il carrello è vuoto -->
		<div v-else>
			<p>Il carrello è vuoto</p>
		</div>

		<div class="mt-5">
			<h3>Inserisci i tuoi dati:</h3>
			<form class="needs-validation" novalidate @submit.prevent="postOrder()">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_name">Nome e Cognome:</label>
							<input type="text" name="customer_name" id="customer_name" class="form-control" v-model="order.customer_name" required>
							<div class="invalid-feedback">
								Inserisci il tuo Nome e Cognome.
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_email">Email:</label>
							<input type="email" name="customer_email" id="customer_email" class="form-control" v-model="order.customer_email" required>
							<div class="invalid-feedback">
								Inserisci un'email valida.
							</div>
						</div>
					</div>
				
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_phone">Telefono:</label>
							<input type="text" name="customer_phone" id="customer_phone" class="form-control" v-model="order.customer_phone" required>
							<div class="invalid-feedback">
								Inserisci il tuo numero di telefono.
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="customer_phone">Indirizzo:</label>
							<input type="text" name="address" id="address" class="form-control" v-model="order.address" required>
							<div class="invalid-feedback">
								Inserisci il tuo indirizzo.
							</div>
						</div>
					</div>
					<div class="col-md-6 d-none">
						<div class="form-group">
							<label for="customer_phone">Data:</label>
							<input type="text" name="date" id="date" class="form-control" v-model="order.date" required readonly>
							<div class="invalid-feedback">
								Inserisci la data di oggi.
							</div>
						</div>
					</div>
					<div class="col-md-6 d-none">
						<div class="form-group">
							<label for="customer_phone">Totale:</label>
							<input type="text" name="amount" id="amount" class="form-control" v-model="order.amount" required readonly>
							<div class="invalid-feedback">
								Inserisci l'importo.
							</div>
						</div>
					</div>
					<!-- <div class="col-md-6">
						<div class="form-group">
							<label for="dishes">Prodotti:</label>
							<input type="text" name="dishes" id="dishes" class="form-control" v-model="order.dishes" required>
							<div class="invalid-feedback">
								Inserisci l'importo.
							</div>
						</div>
					</div> -->
				</div>

				<!-- pagamento -->
				<div class="mt-2" id="dropin-wrapper">
					<div id="checkout-message"></div>
					<div id="dropin-container"></div>
					<button id="submit-button">Invia Ordine</button>
				</div>

				<button type="submit" class="btn btn-primary mt-3">Invia Ordine</button>
			</form>
      	</div>
	</div>
</template>

<style scoped lang="scss"></style>
