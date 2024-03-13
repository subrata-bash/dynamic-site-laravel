@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Change Password Page</h4><br>

                        @if(count($errors))
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show">
                                    {{ $error }}
                                </p>
                            @endforeach
                        @endif

                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="password" name="oldpassword" value=""
                                           id="oldpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="password" name="newpassword" value=""
                                           id="newpassword">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="password" name="confirm_password" value=""
                                           id="confirm_password">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

