@extends('admin.admin_master')
@section('admin')
    {{--    For Jquery--}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Home Slide Page</h4>
                        <form action="{{ route('update.slide') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $homeSlide->id }}">

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="text" name="title" value="{{ $homeSlide->title }}"
                                           id="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="text" name="short_title" value="{{ $homeSlide->short_title }}"
                                           id="email">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="text" name="video_url" value="{{ $homeSlide->video_url }}"
                                           id="username">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="co̵l-sm-10">
                                    <input class="form-control" type="file" name="home_slide"
                                           id="image">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="co̵l-sm-10">
                                    <img id="showImage" class="rounded avatar-lg" width="300" src="{{ (!empty($homeSlide->home_slide)) ? url($homeSlide->home_slide) : url('upload/no_image.jpg') }}" alt="Card image cap">
                                </div>
                            </div>
                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Slide">
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
