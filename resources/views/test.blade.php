<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <a class="btn btn-primary" href="{{ URL::to('/test/pdf') }}">Export to PDF</a>
    <div class="container">
        <div class="row my-5">
            <div class="col-md-10">
                <div class="card">
                    <div class="text-left logo p-2 px-5"> <img src="{{ asset('images/site/sanstore.png') }}"
                            width="125">
                    </div>
                    <div class="invoice p-2">
                        <h5>Pesanan anda telah terkonfirmasi</h5> <span class="font-weight-bold d-block mt-4">Halo,
                            {{ $order->user->name }}
                        </span>
                        <span>Pesanan akan dikirim dalam 2 hari setelah anda melakukan pembayaran , silakan cek di
                            riwayat
                            belanja anda untuk memastikan pembayaran anda</span>
                        <div class="payment border-top mt-3 mb-3 border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Order
                                                    Date</span>
                                                <span>{{ $order->date }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Order
                                                    No</span>
                                                <span>SS-ECOM-{{ $order->id }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="py-2"> <span
                                                    class="d-block text-muted text-center">Pembayaran</span>
                                                <span><img src="{{ asset('images/site/gopay.png') }}"
                                                        width="40" /></span>
                                                <span><img src="{{ asset('images/site/ovo.png') }}"
                                                        width="40" /></span>
                                                <span><img src="{{ asset('images/site/bri.png') }}"
                                                        width="40" /></span>
                                                <span><img src="{{ asset('images/site/mandiri.png') }}"
                                                        width="40" /></span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="py-2"> <span class="d-block text-muted">Shiping
                                                    Alamat</span>
                                                <span>{{ $profile->address }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="product border-bottom table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach ($order->order_detail as $order_detail)
                                        <tr>
                                            <td width="20%"> <img src="{{ $order_detail->product->image }}"
                                                    width="90">
                                            </td>
                                            <td width="60%"> <span
                                                    class="font-weight-bold">{{ $order_detail->product->name }}</span>
                                                <div class="product-qty"><span
                                                        class="d-block">{{ $order_detail->quantity }}
                                                        pcs</span>
                                                </div>
                                            </td>
                                            <td width="20%">
                                                <div class="text-right"> <span
                                                        class="text-lead">Rp.{{ number_format($order_detail->product->price, 2) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row d-flex justify-content-end">
                            <div class="col-md-5">
                                <table class="table table-borderless">
                                    <tbody class="totals">
                                        <tr>
                                            <td>
                                                <div class="text-left"> <span
                                                        class="text-muted">Subtotal</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right">
                                                    <span>Rp.{{ number_format($order->total_price, 2) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="text-left"> <span class="text-muted">Ongkos
                                                        Kirim</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right"> <span>Rp. 20.000,00</span> </div>
                                            </td>
                                        </tr>

                                        <tr class="border-top border-bottom">
                                            <td>
                                                <div class="text-left"> <span class="font-weight-bold">Total
                                                        Bayar</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="text-right"> <span class="font-weight-bold">Rp.
                                                        {{ number_format($order->total_price + 20000, 2) }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <p>Kami akan mengirimkan melalui email jika pengiriman telah berhasil dilakukan!</p>
                        <p class="font-weight-bold mb-0">Terima kasih telah mempercayai kami sebagai mitra terpercaya
                            anda !
                        </p> <span>SanStore Team</span>
                    </div>
                    <div class="d-flex justify-content-between footer p-3"> <span>{{ $order->date }}</span> </div>
                </div>
            </div>
            {{-- <div class="col-md-2">
                <a href="" class="text-dark">
                    <i class="fas fa-print mr-2"></i><span>cetak invoice</span>
                </a>
            </div> --}}
        </div>
    </div>
</body>

</html>
