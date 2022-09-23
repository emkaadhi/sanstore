@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h3><i class="fas fa-calendar"></i> Riwayat Belanja</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Jumlah Harga</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (!empty($orders))
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $order->date }}</td>
                                    <td>
                                        @if ($order->status == 1)
                                            <span class="badge badge-warning">Sudah pesan dan proses
                                                pembayaran</span>
                                        @else
                                            <span class="badge badge-success">Sudah dibayar dan proses pengiriman</span>
                                        @endif
                                    </td>
                                    <td>Rp. {{ number_format($order->total_price) }}</td>
                                    <td><a href="{{ url('history') }}/{{ $order->id }}"><i
                                                class="fas fa-eye"></i>&nbsp;Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
