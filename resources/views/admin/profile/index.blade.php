@extends('admin.admin_master')

@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <br>
                        <br>
{{--                        <img class="card-img-top img-fluid" src="{{ asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">--}}
                        <center>
                            <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin/profile_images/'.$adminData->profile_image) : asset('backend/assets/images/small/img-5.jpg') }}" alt="Card image cap">
                        </center>
                        <div class="card-body">
                            <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                            <hr>
                            <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                            <hr>
                            <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                            <hr>
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light">Edit profile</a>
{{--                            <p class="card-text">This is a wider card with supporting text below as a--}}
{{--                                natural lead-in to additional content. This content is a little bit--}}
{{--                                longer.</p>--}}
{{--                            <p class="card-text">--}}
{{--                                <small class="text-muted">Last updated 3 mins ago</small>--}}
{{--                            </p>--}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
