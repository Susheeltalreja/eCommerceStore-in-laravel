<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: #f5f5f5;
        }

        .checkout-container {
            display: flex;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 50px auto;
            gap: 20px;
        }

        .checkout-form,
        .cart-summary {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            flex: 1 1 400px;
            /* Makes both sides flexible */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .checkout-form h2,
        .cart-summary h2 {
            margin-top: 0;
        }

        .checkout-form input,
        .checkout-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .cart-summary table {
            width: 100%;
            border-collapse: collapse;
        }

        .cart-summary th,
        .cart-summary td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .cart-summary tfoot td {
            font-weight: bold;
        }

        .checkout-form button {
            padding: 12px 20px;
            background: #ff6600;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .checkout-form button:hover {
            background: #e65c00;
        }
    </style>
</head>

<body>

    <div class="checkout-container">

        <!-- Left Side: Form -->
        <div class="checkout-form">
            <h2>Billing Details</h2>
            <form action="/place-order" method="post">
                @csrf
                <input type="text" name="user_name" placeholder="Full Name" required>
                <input type="email" name="email" placeholder="Email Address" required>
                <input type="text" name="address" placeholder="Address" required>
                <input type="text" name="city" placeholder="City" required>
                <button type="submit">Place Order</button>
            </form>
        </div>

        <!-- Right Side: Cart Summary -->
        <div class="cart-summary">
            <h2>Your Cart</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @if ($cart != '')
                        @foreach ($cart as $items)
                            <tr>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->quantity }}</td>
                                <td>Rs. {{ $items->price }}</td>
                                <td>Rs. {{ $items->price * $items->quantity }}</td>
                            </tr>
                        @php
                        $total += $items->price * $items->quantity
                        @endphp
                        @endforeach
                    @else
                    {{ 'Cart is empty' }}
                    @endif
                </tbody>
                <tfoot>
                    <tr>
                        <td>Total</td>
                        <td></td>
                        <td>Rs. {{ $total }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>

</body>

</html>