<script>
    import ConfirmPayment from './ConfirmPayment.vue';
    import axios from 'axios';
    // import dropin from 'braintree-web-drop-in';
    export default {
        name: "OrderRecap",
        components:{
            ConfirmPayment,
        },
        data() {
            return {
                cart: [],
                order:{
                    address:'',
                    date:'',
                    amount: 0.0,
                    customer_name:'',
                    customer_email: '',
                    customer_phone: '',
                },
                confirmPayment: false,
				isFormValid: false,
				isSwitchedOn: false
            };
        },
        methods: {
            calcTotal() {
                let total = 0;
                for (let i = 0; i < this.cart.length; i++) {
                    // moltiplico il prezzo del piatto per la sua quantità e aggiungi al totale
                    total += parseFloat(this.cart[i].price) * this.cart[i].quantity;
                }
                this.order.amount = parseFloat(total.toFixed(2));
                return this.order.amount; // mostra solo due cifre dopo la virgola
            },
            postOrder() {
                var oggetti = [];
                var quantita = [];

                this.cart.forEach((item) => {
                    oggetti.push(item.id);
                    quantita.push(item.quantity);
                });

                const orderData = {
                    address: this.order.address,
                    date: this.order.date,
                    quantita: quantita,
                    oggetti: oggetti,
                    amount: this.order.amount,
                    customer_name: this.order.customer_name,
                    customer_email: this.order.customer_email,
                    customer_phone: this.order.customer_phone,
                };
                console.log(orderData);
                axios
                    .post("http://localhost:8000/api/deliveboo/orders", orderData)
                    .then((res) => {
                        console.log(res.data);
						// this.order.address = "";
						// this.order.date = "";
						// this.order.amount = "";
						// this.order.customer_name = "";
						// this.order.customer_email = "";
						// this.order.customer_phone = "";
                        localStorage.clear()

                        setTimeout(() => {
                            this.$router.push("/success");
                        }, 2000);
                    })
                    .catch((err) => {
                        console.log(err);
                    });
            },
            getPayment(payload){
                const data = {
                            token: payload,
                            amount : this.order.amount
                };
                
                axios.post('http://localhost:8000/api/payments', data)
                .then((res) => {
                    console.log(res);
                    this.success = res.data.success;
                    if(this.success == true){
                        this.confirmPayment = true;
                    }
                })
                .catch((err) =>{
                    console.log(err);
                })
            },
            delayConfirm() {
				setTimeout(() => {
					if (this.confirmPayment) {
						this.$router.push("/success");
					}
				}, 2000);
			},
			validateForm() {
				const forms = document.querySelectorAll('.needs-validation');
				let isValid = true;
				Array.from(forms).forEach(form => {
					if (!form.checkValidity()) {
						isValid = false;
					}
				});
				return isValid;
			}
        },
		watch: {
			'order': {
				handler: function() {
					this.isFormValid = this.validateForm();
				},
				deep: true
			},
			'order.address': function() {
				this.isFormValid = this.validateForm();
			},
			'order.date': function() {
				this.isFormValid = this.validateForm();
			},
			'order.amount': function() {
				this.isFormValid = this.validateForm();
			},
			'order.customer_name': function() {
				this.isFormValid = this.validateForm();
			},
			'order.customer_email': function() {
				this.isFormValid = this.validateForm();
			},
			'order.customer_phone': function() {
				this.isFormValid = this.validateForm();
			}
		},
        created() {
            const storedCart = localStorage.getItem("cart");
            if (storedCart) {
                // Se ci sono, carica i dettagli del carrello
                this.cart = JSON.parse(storedCart);
            }

            this.order.date = new Date().toISOString().slice(0, 19).replace('T', ' ');
        },
        mounted(){
            const button = document.querySelector('#submit-button');
            const self = this;

            braintree.dropin.create({
                authorization: 'sandbox_4xv6ycm3_twmvqx3w3pnj3rps',
                selector: '#dropin-container'
                }, (err, instance) => {
                    if (err) {
                    console.error('Error initializing Braintree:', err);
                    return;
                    }
                    button.addEventListener('click', () => {
                    instance.requestPaymentMethod((err, payload) => {
                        if (err) {
                        console.error('Error requesting payment method:', err);
                        return;
                        }
                        
                        var paymentMethodNonce = payload.nonce;
                        this.getPayment(paymentMethodNonce); 
                    });
                });
            });

            const forms = document.querySelectorAll('.needs-validation')

            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
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
			<div class="silverware w-100">
                <div class="text-silverware">
                    <i class="fa-solid fa-utensils fa-xl p-0 pe-2"></i>
                    <b>posate</b>
                    <p v-show="!isSwitchedOn">Richiedi le posate solo quando ne hai bisogno. <i class="fa-solid fa-recycle fa-xl p-0 ps-2" style="color: #0d9f17;"></i></p>
                    <p v-if="isSwitchedOn">Il ristorante aggiungerà le posate per te, se disponibili.</p>
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" v-model="isSwitchedOn">
                    <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                </div>
                </div>

			<h4 id="total-style">Totale: {{ calcTotal() }} &euro;</h4>

            <div class="mt-5">
                <h3>Inserisci i tuoi dati:</h3>
                <form class="needs-validation d-flex flex-column" novalidate @submit.prevent="postOrder()">

                    <!-- pagamento -->
                    <div class="mt-2" id="dropin-wrapper">
                        <div id="checkout-message"></div>
                        <div id="dropin-container"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_name" class="form-label"><strong>* </strong>Nome e Cognome:</label>
                                <input type="text" name="customer_name" id="customer_name" class="form-control" v-model="order.customer_name" required>
                                <div class="invalid-feedback">Inserisci il tuo Nome e Cognome.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_email" class="form-label"><strong>* </strong>Email:</label>
                                <input type="email" name="customer_email" id="customer_email" class="form-control" v-model="order.customer_email" required>
                                <div class="invalid-feedback">Inserisci un'email valida.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_phone" class="form-label"><strong>* </strong>Telefono:</label>
                                <input type="text" name="customer_phone" id="customer_phone" class="form-control" v-model="order.customer_phone" required>
                                <div class="invalid-feedback">Inserisci il tuo numero di telefono.</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="address" class="form-label"><strong>* </strong>Indirizzo:</label>
                                <input type="text" name="address" id="address" class="form-control" v-model="order.address" required>
                                <div class="invalid-feedback">Inserisci il tuo indirizzo.</div>
                            </div>
                        </div>

                        <div class="text-center">
                            <button id="submit-button" class="btn btn-primary mt-2 w-50" :disabled="!isFormValid" type="submit">Invia Ordine</button>
                        </div>
                        <span class="d-block mt-3">* <em>Campi obbligatori</em></span>
                    </div>
                </form>
            </div>
		</div>

		<!-- Messaggio se il carrello è vuoto -->
		<div class="carrello-vuoto" v-else>
			<p>Il carrello è vuoto</p>
            <router-link to="/homepage" class="btn btn-secondary  my-sm-3">
                Torna ai ristoranti
            </router-link>
		</div>

	</div>
</template>

<style scoped lang="scss">
@use "../styles/OrderRecap.scss";
</style>
