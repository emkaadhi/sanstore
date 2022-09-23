@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="card my-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                {{-- <h3 class="card-title">Halaman Kategori</h3> --}}
                <a href="{{ url('product-create') }}" type="submit" class="btn btn-primary btn-sm">create</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th style="width: 15%">Gambar Produk</th>
                            <th style="width: 15%">Nama</th>
                            <th style="width: 15%">Kategori</th>
                            <th style="width: 15%">Deskripsi</th>
                            <th style="width: 15%">Jumlah Stok</th>
                            <th style="width: 15%">Harga</th>
                            <th style="width: 15%">Rating</th>
                            <th style="width: 15%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td><img src="{{ asset('images/product/' . $product->image) }}" alt="" width="100px">
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->small_description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>Rp. {{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->rating }}</td>
                                <td class="d-flex">
                                    <a href="{{ url('product-show/' . $product->id) }}" type="button"
                                        class="btn btn-info btn-sm">
                                        Show</a>
                                    <a href="{{ url('product-edit/' . $product->id) }}" type="button"
                                        class="btn btn-warning btn-sm mx-2">
                                        Edit</a>
                                    <a href="{{ url('product-delete/' . $product->id) }}" type="button"
                                        class="btn btn-danger btn-sm">
                                        Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th style="width: 15%">Gambar Produk</th>
                            <th style="width: 15%">Nama</th>
                            <th style="width: 15%">Kategori</th>
                            <th style="width: 15%">Deskripsi</th>
                            <th style="width: 15%">Jumlah Stok</th>
                            <th style="width: 15%">Harga</th>
                            <th style="width: 15%">Rating</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endpush
