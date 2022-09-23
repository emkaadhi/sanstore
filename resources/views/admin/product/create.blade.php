@extends('layouts.admin')

@section('content')
    <div class="card-body">
        <div class="col-md-8">
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title">Form Produk</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('product') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Gambar Produk:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>
                                <input type="file" class="form-control" name="image">
                            </div>
                            @error('image')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input type="text" name="name"
                                    class="form-control @error('name') border border-danger @enderror"
                                    placeholder="Nama Produk..." value="">
                            </div>
                            @error('name')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Kategori Produk :</label>
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input type="number" name="quantity"
                                    class="form-control @error('quantity') border border-danger @enderror"
                                    placeholder="jumlah stok..." value="">
                            </div>
                            @error('quantity')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input type="number" name="price"
                                    class="form-control @error('price') border border-danger @enderror"
                                    placeholder="harga produk" value="">
                            </div>
                            @error('price')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Rating</label>
                                <select class="form-control" name="rating">
                                    <option value="0">Rating Produk :</option>
                                    <option value="1">1</option>
                                    <option value="1.5">1.5</option>
                                    <option value="2">2</option>
                                    <option value="2.5">2.5</option>
                                    <option value="3">3</option>
                                    <option value="3.5">3.5</option>
                                    <option value="4">4</option>
                                    <option value="4.5">4.5</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            @error('rating')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                </div>
                                <textarea type="text" name="small_description"
                                    class="form-control @error('small_description') border border-danger @enderror"
                                    placeholder="deskripsi singkat..."></textarea>
                            </div>
                            @error('small_description')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                </div>
                                <textarea type="text" name="description"
                                    class="form-control @error('description') border border-danger @enderror"
                                    placeholder="deskripsi kategori..."></textarea>
                            </div>
                            @error('description')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-dark btn-sm" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
