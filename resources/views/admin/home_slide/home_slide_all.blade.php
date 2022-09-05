@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Home Slide Page</h4>
                            <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeslide->id }}">
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="title" value="{{ $homeslide->title }}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="short_title" value="{{ $homeslide->short_title}}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="video_url" value="{{ $homeslide->video_url}}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="file" name="home_slide" value="{{ $homeslide->home_slide}}" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <center>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">

                                            <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide Image</label><br>
                                            <img id="showImage" class="rounded avatar-lg" src="{{ (!empty($homeslide->home_slide))? url($homeslide->home_slide):url('upload/no_image.jpg') }}"
                                                 alt="Card image cap">
                                        </div>
                                    </div>
                                </center>
                                <!-- end row -->
                                <center><br>
                                    <input type="submit" value="Update Slide" class="btn btn-info waves-effect waves-light">
                                </center>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <script type="text/javascript">

        $(document).ready(function (){
            $('#image').change(function (e){
                var reader = new FileReader();
                reader.onload= function (e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection
