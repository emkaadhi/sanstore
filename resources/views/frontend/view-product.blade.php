@extends('layouts.master')

@section('content')

    <div class="container">
        <div class="row my-5">
            <aside class="col-sm-5 border-right">
                <article class="gallery-wrap">
                    <div class="img-big-wrap">
                        <div> <a href="#"><img src="{{ asset('images/product/' . $product->image) }} "
                                    class="img-thumbnail"></a></div>
                    </div> <!-- slider-product.// -->
                </article> <!-- gallery-wrap .end// -->
            </aside>
            <aside class="col-sm-7">
                <article class="card-body p-5">
                    <h3 class="title mb-3">{{ $product->name }}</h3>
                    <p class="price-detail-wrap">
                        <span class="price h3 text-warning">
                            <span class="currency">Rp. {{ number_format($product->price, 2) }}</span>
                        </span>
                    </p>
                    <hr>
                    <dl class="item-property">
                        <dt class="mb-2">Deskripsi Produk</dt>
                        <dd>
                            <p>{{ $product->description }}</p>
                        </dd>
                    </dl>
                    <dl class="param param-feature">
                        <dt class="mb-2">Barang tersedia</dt>
                        <dd>{{ $product->quantity }} pcs</dd>
                    </dl>

                    <hr>
                    <div class="row ml-1">
                        <form action="{{ url('order/' . $product->id) }}" method="post">
                            @csrf
                            <input type="number" name="quantity" class="form-control w-50 my-3" value="1">
                            <button type="submit" class="mt-2 btn btn-outline-primary btn-lg"><i
                                    class="fas fa-shopping-cart"></i>&nbsp;&nbsp; Add To Cart</button>
                        </form>
                    </div>
                </article> <!-- card-body.// -->
            </aside> <!-- col.// -->
        </div> <!-- row.// -->
    </div>
    </div>
@endsection
