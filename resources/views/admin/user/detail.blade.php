@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-start align-items-center">
                    <h4>Detail Order</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Produk</th>
                                <th>Image</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($order_details))
                                @foreach ($order_details as $order_detail)
                                    <tr>
                                        <td></td>
                                        <td>{{ $order_detail->product->name }}</td>
                                        <td>
                                            <img src="{{ asset('images/product/' . $order_detail->product->image) }}"
                                                width="100px">
                                        </td>
                                        <td>{{ $order_detail->quantity }}</td>
                                        <td>Rp.{{ number_format($order_detail->price_amount, 2) }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
