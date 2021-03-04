export function CreatePasarela(){
  // PROPIO
  var stripe = Stripe('pk_test_pTVgTx51yxGUmfDHuo18i3A0');
  // BRUCE
  // var stripe = Stripe('sk_test_bQYwJHe0YU38m1p8i73t4KzN');

  // Create an instance of Elements.

  var elements = stripe.elements();

  // Custom styling can be passed to options when creating an Element.
  // (Note that this demo uses a wider set of styles than the guide below.)

  var style = {
    base: {
      color: '#32325d',
      lineHeight: '18px',
      fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
      fontSmoothing: 'antialiased',
      fontSize: '16px',
      '::placeholder': {
        color: '#aab7c4'
      }
    },
    invalid: {
      color: '#fa755a',
      iconColor: '#fa755a'
    }
  };

  // Create an instance of the card Element.
  var card = elements.create('card', {style: style});

  // Add an instance of the card Element into the `card-element` <div>.
  card.mount('#card-element');


  // Handle real-time validation errors from the card Element.
  card.addEventListener('change', function(event) {
    var displayError = document.getElementById('card-errors');
    if (event.error) {
      displayError.textContent = event.error.message;
    } else {
      displayError.textContent = '';
    }
  });

  // Handle form submission.
  var form = document.getElementById('payment-form');
  console.log('CARD', form)
  form.addEventListener('submit', function(event) {
    event.preventDefault();
    console.log('FORM', form.serialize())
    stripe.createToken(card).then(function(result) {
      if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
      } else {
        // Send the token to your server.
        stripeTokenHandler(result.token);
      }
    });
  });

  function stripeTokenHandler(token) {
      // Insert the token ID into the form so it gets submitted to the server
      var form = document.getElementById('payment-form');
      var hiddenInput = document.createElement('input');
      hiddenInput.setAttribute('type', 'hidden');
      hiddenInput.setAttribute('name', 'stripeToken');
      hiddenInput.setAttribute('value', token.id);
      form.appendChild(hiddenInput);

      // Submit the form
      console.log('HIDDEN',hiddenInput)
      localStorage.setItem('TOKEN0', token.id)
      // form.submit();
    }
}
export function PagoStripe(){
  // privado
  // var stripe = Stripe('sk_test_mtLlCqQqN3rYMVJG7FUfOfoh');

  // publico
  var stripe = Stripe('pk_test_pTVgTx51yxGUmfDHuo18i3A0');

  var elements = stripe.elements();
  var cardNumber = elements.create('4242424242424242');
  cardNumber.mount('#card-number');
  // stripe.setPublishableKey('pk_test_pTVgTx51yxGUmfDHuo18i3A0');
  // var cardNumberElement = elements.create('4242 4242 4242 4242');

  stripe.createToken(cardNumber).then(function(result) {
    if (result.error) {
      console.log("result.error");
      // Inform the user if there was an error.
      // var errorElement = document.getElementById('card-errors');
      // errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
      console.log(result.token);
    }
  });;
}
