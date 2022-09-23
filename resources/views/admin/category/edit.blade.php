@extends('layouts.admin')

@section('content')
    <div class="card-body">
        <div class="col-md-6">
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Kategori</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('category-update/' . $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-image"></i></span>
                                </div>
                                <input type="file" class="form-control" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Nama:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pen"></i></span>
                                </div>
                                <input type="text" name="name"
                                    class="form-control @error('name') border border-danger @enderror"
                                    placeholder="nama kategori..." value="{{ $category->name }}">
                            </div>
                            @error('name')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Deskripsi:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-book"></i></span>
                                </div>
                                <textarea type="text" name="description"
                                    class="form-control @error('description') border border-danger @enderror"
                                    placeholder="deskripsi kategori...">{{ $category->description }}</textarea>
                            </div>
                            @error('description')
                                <div class="text-danger text-sm mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn btn-warning btn-sm" type="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
