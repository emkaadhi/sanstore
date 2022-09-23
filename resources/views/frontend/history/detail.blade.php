@extends('layouts.master')

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>image</th>
                            <th>product</th>
                            <th>harga</th>
                            <th>quantity</th>
                            <th>sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $order_detail)
                            <tr>
                                <td scope="row">{{ $order_detail->product->name }}</td>
                                <td><img src="{{ asset('images/product/' . $order_detail->product->image) }}" width="100">
                                </td>
                                <td>Rp.{{ number_format($order_detail->product->price, 2) }}</td>
                                <td>{{ $order_detail->quantity }}</td>
                                <td>Rp.{{ number_format($order_detail->quantity * $order_detail->product->price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
