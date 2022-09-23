@extends('layouts.master')

@section('content')
    <div class="container">
        <h1 class="text-center text-uppercase">{{ $category->name }}</h1>
        <hr class="hr-heading">
    </div>
    <div class="container">
        <div class="row py-5">
            @foreach ($products as $product)
                <div class="col-md-3 mt-3">
                    <div class="card-prod">
                        <div class="image-container">
                            <div class="first">
                                <div class="d-flex justify-content-between align-items-center"> <span
                                        class="discount">-15%</span> <span class="wishlist"><i
                                            class="fas fa-heart text-danger"></i></span> </div>
                            </div> <img src="{{ asset('images/product/' . $product->image) }}"
                                class="img-fluid rounded thumbnail-image">
                        </div>
                        <div class="product-detail-container p-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 class="dress-name">{{ $product->name }}</h5>
                                <div class="d-flex flex-column mb-2">
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <small>Kategori : {{ $product->category->name }}</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <small>{{ $product->small_description }}</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <div> <i class="fas fa-star rating-star text-warning"></i> <span
                                        class="rating-number">5</span> </div> <span
                                    class="buy">Rp.{{ number_format($product->price, 2) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2">
                        <div class="card voutchers">
                            <div class="voutcher-divider">
                                <div class="voutcher-left text-center"> <span class="voutcher-name">Barang tersedia
                                        :</span>
                                    <h5 class="voutcher-code">{{ $product->quantity }} pcs</h5>
                                </div>
                                <div class="voutcher-right text-center border-left">
                                    <h3 class="discount-percent mt-2"><a href="{{ url('view-product/' . $product->id) }}"
                                            class="text-white">Detail</a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
