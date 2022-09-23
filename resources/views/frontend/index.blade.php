@extends('layouts.master')

@section('content')
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <div class="text-jumbotron">
                <h2>Discount akhir tahun hingga 15%</h2>
                <h1 class="display-3">Hanya di SanStore</h1>
                <p class="lead">Kami Selalu mengedankan kualitas dengan harga yang terjangkau.produk yang kami jual
                    dijamin
                    keaslian-nya.
                </p>
                <button type="submit" class="btn-jumbotron">cari tahu</button>
            </div>
        </div>
    </div>
    <div class="heading">
        <h2>Kategori Pilihan</h2>
    </div>
    <hr class="hr-heading">
    <div class="container">
        <div class="row">
            <div class="card-group">
                @foreach ($categories as $category)
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('images/category/' . $category->image) }}"
                            alt="Card image cap">
                        <a href="{{ url('category/' . $category->id) }}">
                            <div class="cat-text">
                                <h2>{{ $category->name }}</h2>
                                <p>2021 Collection</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <section class="product">
        <div class="heading">
            <h2>Produk Pilihan</h2>
        </div>
        <hr class="hr-heading">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mt-3">
                        <div class="card-prod">
                            <div class="image-container">
                                <div class="first">
                                    <div class="d-flex justify-content-between align-items-center"> <span
                                            class="discount">-15%</span> <span class="wishlist"><i
                                                class="fas fa-heart text-danger"></i></span> </div>
                                </div> <img src="{{ asset('/images/product/' . $product->image) }}"
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
                                        <h3 class="discount-percent mt-2"><a
                                                href="{{ url('view-product/' . $product->id) }}"
                                                class="text-white">Detail</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
