@extends('layouts.master')

@section('content')
    <div class="container bg-white rounded-top mt-5" id="zero-pad">
        @if (!empty($order))
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 col-12">
                    <div class="d-flex flex-column pt-2">
                        <div>
                            <h5 class="text-uppercase font-weight-normal mb-2">KERANJANG BELANJA</h5>
                        </div>
                    </div>
                    <div class="d-flex flex-row px-lg-5 mx-lg-5 mobile mt-2" id="heading">
                        <div class="px-lg-5 mr-lg-5" id="produc">PRODUK</div>
                        <div class="px-lg-5 ml-lg-5" id="prc">HARGA</div>
                        <div class="px-lg-5 ml-lg-1" id="quantity">JUMLAH</div>
                        <div class="px-lg-5 ml-lg-3" id="total">TOTAL</div>
                    </div>
                    @foreach ($order_details as $order_detail)
                        <div
                            class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">
                            <div class="d-flex flex-row align-items-center">
                                <div><img src="{{ asset('images/product/' . $order_detail->product->image) }}" width="150"
                                        height="150" alt="" id="image">
                                </div>
                                <div class="d-flex flex-column pl-md-3 pl-1">
                                    <div style="width: 150px">
                                        <h6>{{ $order_detail->product->name }}</h6>
                                    </div>

                                </div>
                            </div>
                            <div class="pl-md-0 pl-1"><b class="text-right">Rp.
                                    {{ number_format($order_detail->product->price, 2) }}</b>
                            </div>
                            <div class="pl-md-0 pl-2"><span class="px-md-3 px-1">{{ $order_detail->quantity }}</span>
                            </div>
                            <div class="pl-md-0 pl-1"><b>Rp. {{ number_format($order_detail->price_amount, 2) }}</b>
                            </div>
                            <form action="{{ url('checkout') }}/{{ $order_detail->id }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" class="border-0" onclick="alert('are you sure ?')"><i
                                        class="fas fa-minus-circle text-danger"></i></button>
                            </form>
                        </div>
                    @endforeach
                </div>
                @if (!empty($order))
                    <div class="ms-auto my-3"> <b class="pl-md-4">TOTAL HARGA<span class="pl-md-4">Rp.
                                {{ number_format($order->total_price, 2) }}</span></b>
                    </div>
                @endif
            </div>
            <div class="container bg-light rounded-bottom py-4" id="zero-pad">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10 col-12">
                        <div class="d-flex justify-content-between align-items-center">
                            {{-- <div> <a href="{{ url('product') }}" class="btn btn-sm bg-light border border-dark">KEMBALI
                                </a>
                            </div> --}}
                            <div>
                                <a href="{{ url('cancel') }}" class="btn btn-sm bg-light border border-dark">BATALKAN
                                    PESANAN
                                </a>
                                <a href="{{ url('confirm') }}"
                                    class="btn btn-sm bg-dark text-white px-lg-5 px-3">KONFIRMASI</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="alert alert-danger" role="alert">
                Dengan menekan tombol konfimasi anda tidak dapat membatalkan pesanan
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Anda belum memasukkan daftar belanja anda !
            </div>
        @endif
    </div>

@endsection
