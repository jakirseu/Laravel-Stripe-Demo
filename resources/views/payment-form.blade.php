<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stripe Payment</title>

<style>
    /* Reset some default browser styles */
body, html {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

/* Center the form on the page */
body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background-color: #f7f7f7;
}

#payment-form {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
}

h1 {
    font-size: 24px;
    margin-bottom: 20px;
    color: #333;
    text-align: center;
}

input, button {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input:focus, button:focus {
    outline: none;
    border-color: #007bff;
}

button {
    background-color: #007bff;
    color: #ffffff;
    border: none;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

#card-element {
    margin: 10px 0;
}


    </style>

</head>
<body>
    <form id="payment-form">

        <h2 class="mb-2 text-2xl">Awesome Product</h2>
        <p>Price: 8.00</p>
        <input type="text" id="card-holder-name" placeholder="Cardholder Name">
        <div id="card-element"></div>
        <button id="card-button" data-secret="{{ $clientSecret }}">Pay</button>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe('{{ env('STRIPE_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#card-element');

        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;

        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();

            const { error, paymentIntent } = await stripe.confirmCardPayment(clientSecret, {
                payment_method: {
                    card: cardElement,
                    billing_details: {
                        name: document.getElementById('card-holder-name').value,
                    },
                },
            });

            if (error) {
                alert(`Payment failed: ${error.message}`);
            } else if (paymentIntent.status === 'succeeded') {
                alert('Payment successful!');
            }
        });
    </script>
</body>
</html>
