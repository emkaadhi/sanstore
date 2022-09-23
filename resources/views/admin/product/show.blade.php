@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/product/' . $product->image) }}" alt="" width="70%">
                </div>
                <div class="col-md-6">
                    <ul class="list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Nama
                            <span class="badge badge-primary badge-pill">{{ $product->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Kategori
                            <span class="badge badge-primary badge-pill">{{ $product->category->name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Jumlah Stok
                            <span class="badge badge-primary badge-pill">{{ $product->quantity }} pcs</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Harga
                            <span class="badge badge-primary badge-pill">Rp.{{ number_format($product->price, 2) }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Rating
                            <span class="badge badge-primary badge-pill">{{ $product->rating }}</span>
                        </li>
                        <li class="list-group-item">
                            Description:
                            <p>{{ $product->description }}</p>
                        </li>
                    </ul>
                    <a class="btn btn-dark btn-sm ml-5" href="{{ url('product') }}">back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
