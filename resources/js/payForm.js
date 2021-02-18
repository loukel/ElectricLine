// Init stripe
const stripe = Stripe(
  'pk_test_51IMFuXCd6Q7iPk8RE2IyGxA2eNyVC7UDJnWWZz11eoPKDZpmDSpfQMLdmSIrfoYkYgwOlldBwmufiZAVcNM3ech500OKjQ4a7m');
const elements = stripe.elements();

// Custom styling can be passed to options when creating an Element
var style = {
  base: {
    // Add your base input styles here. For example:
    fontSize: '16px',
    color: '#32325d',
    padding: '5px',
  },
};

// Create an instance of the card Element
const cardElement = elements.create('card', {
  style: style
});

// Add an instance of the card Element into the `card-element` <div>
cardElement.mount('#card-element');

// Get card elements
const cardHolderName = document.getElementById('card-holder-name');
const cardButton = document.getElementById('card-button');

// Validate the card input
let validCard = false;
const cardError = document.getElementById('card-errors');

cardElement.addEventListener('change', function (event) {
  // Display errors as user enters card details
  if (event.error) {
    validCard = false;
    cardError.textContent = event.error.message;
    cardError.classList.remove('d-none');
  } else {
    validCard = true;
    cardError.textContent = '';
    cardError.classList.add('d-none');
  }
});

// Create a token or display an error when the form is submitted.
var form = document.getElementById('pay-form');

cardButton.addEventListener('click', async (e) => {
  event.preventDefault();
  const {
    paymentMethod,
    error
  } = await stripe.createPaymentMethod(
    'card', cardElement, {
      billing_details: {
        name: cardHolderName.value
      }
    }
  );

  if (error) {
    console.log(error.message)
  } else {
    // The card has been verified successfully...

    // Insert the token ID into the form so it gets submitted to the server
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'payment-method-id');
    hiddenInput.setAttribute('value', paymentMethod.id);
    form.appendChild(hiddenInput);
    // Submit the form
    form.submit();
  }
});
