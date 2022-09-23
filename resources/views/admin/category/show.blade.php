@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('images/category/' . $category->image) }}" alt="" width="70%">
                </div>
                <div class="col-md-6">
                    <ul class="list-group-flush">
                        <li class="list-group-item">{{ $category->name }}</li>
                        <li class="list-group-item">{{ $category->description }}</li>
                    </ul>
                    <a class="btn btn-dark btn-sm ml-5" href="{{ url('category') }}">back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
