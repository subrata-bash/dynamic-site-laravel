@extends('admin.admin_master')
@section('admin')

    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-6">
                <div class="card">
                    <img class="p-1 mb-2 rounded me-2" width="300" src="{{ (!empty($adminData->profile_image)) ? url('upload/admin_images/'.$adminData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Name: {{ $adminData->name }}</h4>
                        <hr>
                        <h4 class="card-title">Email: {{ $adminData->email }}</h4>
                        <hr>
                        <h4 class="card-title">Username: {{ $adminData->username }}</h4>
                        <hr>
                        <a class="btn btn-info btn-rounded waves-effect" href="{{ route('edit.profile') }}">Edit profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
