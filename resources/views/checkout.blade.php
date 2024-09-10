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
            <h1 class="p-5 text-white">Stripe Hosted Payment Demo</h1>
        </div>

    </nav>
    <main class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">

        <div class="block  p-6 text-center border border-gray-200 rounded-lg shadow">

            <h2 class="mb-2 text-2xl">Awesome Product</h2>
            <p>Price: 8.00</p>

            <form action="/checkout" method="POST">
              @csrf
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800  rounded-lg text-sm my-10 px-5 py-2.5 me-2 mb-2">Checkout</button>
            </form>
        </div>

    </main>

</body>

</html>
