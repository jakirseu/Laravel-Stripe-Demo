<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com/"></script>
</head>
<body>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
                    <h1 class="p-5">Hello</h1>
        </div>

    </nav>
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <form action="/charge" method="POST">
            @csrf
            <label for="amount">
                Amount (in cents):
                <input type="text" name="amount" id="amount">
            </label>

            <label for="email">
                Email:
                <input type="text" name="email" id="email">
            </label>

            <label for="card-element">
                Credit or debit card
            </label>
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>

            <!-- Used to display form errors. -->
            <div id="card-errors" role="alert"></div>

            <button type="submit">Submit Payment</button>
        </form>




    </main>
    <!-- Stripe JS -->
    <script src="https://js.stripe.com/v3/"></script>
</body>
</html>
