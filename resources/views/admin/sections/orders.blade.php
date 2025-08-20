@extends('admin.dashboard')

@section('orders')
    <div class="container py-4">
        <h2 class="mb-4 text-center text-primary">All User Orders</h2>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $index => $order)
                        <tr>
                            <td>{{ $index + $orders->firstItem() }}</td>
                            <td>{{ $order->user->user_name }}</td>
                            <td>{{ $order->product_name }}</td>
                            <td>
                                <span class="badge bg-info text-dark">{{ $order->quantity }}</span>
                            </td>
                            <td>Rs. {{ number_format($order->price, 2) }}</td>
                            <td>Rs. {{ number_format($order->total, 2) }}</td>
                            <td>
                                <img src="{{ asset('uploads/product/' . $order->image) }}" class="img-thumbnail"
                                    style="width: 60px; height: 60px;" alt="Product Image">
                            </td>
                            <td>{{ $order->status }}</td>
                            <td>
                                <!-- Action Buttons -->
                                <form action="{{'/admin/order/' . $order->cartId }}" method="POST" class="d-flex gap-2">
                                    @csrf
                                    @method('PATCH')

                                    <!-- Picked Up Button -->
                                    <button type="submit" name="status" value="picked" class="btn btn-success btn-sm">
                                        Pick Up
                                    </button>

                                    <!-- Cancel Button -->
                                    <button type="submit" name="status" value="cancelled" class="btn btn-danger btn-sm">
                                        Cancel
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection