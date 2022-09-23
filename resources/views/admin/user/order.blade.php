@extends('layouts.admin')


@section('content')
    <div class="container">
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header d-flex justify-content-start align-items-center">
                    <h4>Order Pelanggan</h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Hari</th>
                                <th>Status</th>
                                <th>Total Harga</th>
                                <th>Detail Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($orders))
                                @foreach ($orders as $order)
                                    <tr>
                                        <td></td>
                                        <td>{{ $order->date }}</td>
                                        <td>
                                            @if ($order->status != 1)
                                                <span class="badge bg-success">sudah bayar , proses pengiriman</span>
                                            @else
                                                <span class="badge bg-warning"> belum bayar</span>
                                            @endif
                                        </td>
                                        <td>Rp.{{ number_format($order->total_price, 2) }}</td>
                                        <td>
                                            <a href="{{ url('order_detail/' . $order->id) }}">
                                                <i class="fas fa-folder text-primary mr-1">
                                                </i>
                                                lihat detail
                                            </a>
                                        </td>
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
