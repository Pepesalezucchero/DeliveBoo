<!-- <script>
export default{
    name: 'Payment',
    props:{
        authorization:{
            require: true,
            type: String,
        }
    },
    data(){
        return{

        }
    },
    methods: {
    onSuccess (payload) {
      let nonce = payload.nonce;
    },
    onError (error) {
      let message = error.message;
    }
  }
}
var button = document.querySelector('#submit-button');

  braintree.dropin.create({
    // Insert your tokenization key here
    authorization: 'sandbox_4xv6ycm3_twmvqx3w3pnj3rps',
    container: '#dropin-container'
  }, function (createErr, instance) {
    button.addEventListener('click', function () {
      instance.requestPaymentMethod(function (requestPaymentMethodErr, payload) {
        // When the user clicks on the 'Submit payment' button this code will send the
        // encrypted payment information in a variable called a payment method nonce
        $.ajax({
          type: 'POST',
          url: 'http://localhost:8000/api/payments',
          data: {
                    'token': payload.nonce,
                    'amount' : 'totale'
                }
        }).done(function(result) {
          // Tear down the Drop-in UI
          instance.teardown(function (teardownErr) {
            if (teardownErr) {
              console.error('Could not tear down Drop-in UI!');
            } else {
              console.info('Drop-in UI has been torn down!');
              // Remove the 'Submit payment' button
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
</script>


<template>

    <div id="dropin-wrapper">
    <div id="checkout-message"></div>
    <div id="dropin-container"></div>
    <button id="submit-button">Submit payment</button>
    </div>
    <h2>pagamento</h2>
    <v-braintree 
        :authorization="authorization"
        @success="onSuccess"
        @error="onError"
    ></v-braintree> -->
<!-- </template> -->

<!-- <style lang="scss" scoped>

</style> -->