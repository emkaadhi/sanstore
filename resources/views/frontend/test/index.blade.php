@extends('layouts.master')


@section('content')
    <div class="container">
        <div class="row mt-5">
            <a class="btn btn-primary my-2" href="{{ URL::to('/test/pdf') }}">Export to PDF</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($products as $product)
                        <tr>
                            <td scope="row">{{ $no++ }}</td>
                            <td><img src="{{ $product->image }}" alt="" width="100px"></td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name }}</td>
                            <td>{{ $product->price }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
