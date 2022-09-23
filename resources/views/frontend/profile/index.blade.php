@extends('layouts.master')


@section('content')
    <div class="container">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark">
                        <i class="fas fa-user"></i>&nbsp; Profile
                    </div>
                    @if (!empty($profile))
                        <div class="d-flex justify-content-center mt-2">
                            <img class="rounded-circle img-thumbnail"
                                src="{{ asset('images/profile/' . $profile->image) }}" alt="User profile picture"
                                width="50%">
                        </div>
                    @endif
                    <div class="card-body">
                        <ul class="list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Name
                                <span class="badge badge-primary badge-pill">{{ $user->name }}</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Email
                                <span class="badge badge-primary badge-pill">{{ $user->email }}</span>
                            </li>
                            @if (!empty($profile))
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Phone
                                    <span class="badge badge-primary badge-pill">{{ $profile->phone }}</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    Address
                                    <span class="badge badge-primary badge-pill">{{ $profile->address }}</span>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                @if (!empty($profile))
                    <div class="card">
                        <div class="card-header bg-dark">
                            <i class="fas fa-edit"></i> &nbsp; Edit
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('profile/' . $profile->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image" value=""
                                            required autocomplete="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name='phone'
                                            value="{{ $profile->phone }}" required autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ $profile->address }}" required autocomplete="address" autofocus>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-warning">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @else
                    <div class="card">
                        <div class="card-header bg-dark">
                            <i class="fas fa-edit"></i> &nbsp; Create
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="image"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                    <div class="col-md-6">
                                        <input id="image" type="file"
                                            class="form-control @error('image') is-invalid @enderror" name="image" value=""
                                            required autocomplete="image">
                                        @error('image')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>
                                    <div class="col-md-6">
                                        <input id="phone" type="text"
                                            class="form-control @error('phone') is-invalid @enderror" name='phone' value=""
                                            required autocomplete="phone" autofocus>
                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address"
                                        class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
                                    <div class="col-md-6">
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="" required autocomplete="address" autofocus>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-dark">
                                            {{ __('Submit') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
