@extends('admin.admin_master')
@section('admin')
{{--    For Jquery--}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Profile Page</h4>
                        <form action="{{ route('store.profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">name</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="text" name="name" value="{{ $editData->name }}"
                                           id="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">User Email</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="email" name="email" value="{{ $editData->email }}"
                                           id="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="text" name="username" value="{{ $editData->username }}"
                                           id="username">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="file" name="profile_image"
                                           id="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="co̵l-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" width="300" src="{{ (!empty($editData->profile_image)) ? url('upload/admin_images/'.$editData->profile_image) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function (e) {
            var reader = new FileReader ();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result)
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection
