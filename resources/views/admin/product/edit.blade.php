@extends('layouts.admin')

@section('content')
    <div class="card-body">
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Kategori</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('product-update/' . $product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Gambar Produk:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input type="text" name="name"
                                    class="form-control @error('name') border border-danger @enderror"
                                    placeholder="Nama Produk..." value="{{ $product->name }}">
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
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
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
                                    placeholder="jumlah stok..." value="{{ $product->quantity }}">
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
                                    placeholder="harga produk" value="{{ $product->price }}">
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
                                    <option value="1" {{ $product->rating == 1 ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ $product->rating == 1.5 ? 'selected' : '' }}>1.5</option>
                                    <option value="3" {{ $product->rating == 2 ? 'selected' : '' }}>2</option>
                                    <option value="4" {{ $product->rating == 2.5 ? 'selected' : '' }}>2.5</option>
                                    <option value="5" {{ $product->rating == 3 ? 'selected' : '' }}>3.5</option>
                                    <option value="5" {{ $product->rating == 4 ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ $product->rating == 4.5 ? 'selected' : '' }}>4.5</option>
                                    <option value="5" {{ $product->rating == 5 ? 'selected' : '' }}>5</option>
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
                                    placeholder="deskripsi singkat...">{{ $product->small_description }}</textarea>
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
                                    placeholder="deskripsi kategori...">{{ $product->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-dark btn-sm" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
