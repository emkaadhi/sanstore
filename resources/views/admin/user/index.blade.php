@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row my-3 ml-3">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pelanggan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip"
                            title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th s>
                                    Nama Customer
                                </th>
                                <th>
                                    Gambar Profile
                                </th>
                                <th>
                                    Alamat Customer
                                </th>
                                <th>
                                    Telephone Customer
                                </th>
                                <th>
                                    Jumlah Pemesanan
                                </th>
                                <th class="text-center">
                                    Status
                                </th>
                                <th s>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        #
                                    </td>
                                    <td>
                                        <a>
                                            {{ $user->name }}
                                        </a>
                                        <br>
                                        <small>
                                            bergabung : {{ $user->created_at->diffForHumans() }}
                                        </small>
                                    </td>
                                    <td>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                @if (empty($user->profile->image))
                                                    <img alt="Avatar" class="table-avatar"
                                                        src="{{ asset('images/profile/noimage.jpg') }}">
                                                @else
                                                    <img alt="Avatar" class="table-avatar"
                                                        src="{{ asset('images/profile/' . $user->profile->image) }}">
                                                @endif
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="project-actions text-left">
                                        @if (!empty($user->profile->address))
                                            {{ $user->profile->address }}
                                        @endif
                                    </td>
                                    <td class="project-actions text-left">
                                        @if (!empty($user->profile->phone))
                                            {{ $user->profile->phone }}
                                        @endif
                                    </td>
                                    <td class="project_progress text-center">
                                        <a href="{{ url('user_order/' . $user->id) }}">
                                            <small class="">
                                                {{ $user->order->count() }} kali
                                            </small>
                                        </a>
                                    </td>
                                    <td class="project-state">
                                        @if ($user->order->count() >= 1)
                                            <span class="badge badge-success">Aktif</span>
                                        @else
                                            <span class="badge badge-danger">Tidak Aktif</span>
                                        @endif

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection
