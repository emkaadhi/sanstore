@extends('layouts.master')

@section('content')
    <section class="bg-img1 txt-center p-lr-15 p-tb-92"
        style="background-image: url('https://images.unsplash.com/photo-1629978162634-d64c0e747334?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8NDl8fGNyb3dkZWQlMjBzdHJlZXR8ZW58MHwwfDB8fA%3D%3D&auto=format&fit=crop&w=600&q=60');">
        <h2 class="text-about text-center d-flex justify-content-center align-item-center">
            Hubungi Kami
        </h2>
    </section>
    <!-- section contact -->
    <section id="contact" class="my-3">
        <div class="container">
            <div class="row">
                <div class="col-md-6 my-5">
                    <div class="card card-body bg-custom">
                        <div class="card-title text-center">
                            <h3 class="text-capitalize">Kirimkan Pesan ke kami</h3>
                        </div>
                        <form method="POST">
                            <!--input group 2-->
                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <div class="fa fa-user"></div>
                                    </span>
                                </div>
                                <input type="text" name="name" class="form-control" placeholder="isikan nama anda..">
                            </div>
                            <!-- end of input group 2-->
                            <!--input group 2-->
                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <div class="fas fa-phone-square-alt"></div>
                                    </span>
                                </div>
                                <input type="tel" name="telephone" class="form-control"
                                    placeholder="nomor telephone yang bisa dihubungi..">
                            </div>
                            <!-- end of input group 2-->
                            <!--input group 2-->
                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <div class="fas fa-envelope"></div>
                                    </span>
                                </div>
                                <input type="text" name="_replyto" class="form-control"
                                    placeholder="alamat email anda...">
                            </div>
                            <!-- end of input group 2-->
                            <!--input group 2-->
                            <div class="input-group my-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <div class="fas fa-pen"></div>
                                    </span>
                                </div>
                                <textarea class="form-control" name="message" id="" cols="10" rows="3"
                                    placeholder="Masukkan pesan anda..."></textarea>
                            </div>
                            <!-- end of input group 2-->
                            <button type="submit" class="btn btn-outline-warning btn-block text-uppercase">Kirim</button>
                        </form>
                    </div>
                </div>
                <!-- google maps -->
                <div class="col-md-6 my-5">
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31637.419842278814!2d110.78531103955082!3d-7.610030799999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a3e01d130a737%3A0x421b9f4d887a273a!2sRuko%20Mariposa%2C%20Solo%20Baru!5e0!3m2!1sen!2sid!4v1637412145377!5m2!1sen!2sid"
                            width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of section contact -->
@endsection
