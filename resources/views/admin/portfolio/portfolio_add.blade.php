@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Portfolio Page</h4><br><br>
                            <form method="post" action="{{ route('store.portfolio') }}" enctype="multipart/form-data">
                                @csrf


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="portfolio_name" id="example-text-input">
                                        @error('portfolio_name')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="portfolio_title" id="example-text-input">
                                        @error('portfolio_title')
                                        <span class="text-danger"> {{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->


                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">portfolio Description</label>
                                    <div class="col-sm-10">
                                        <textarea id="elm1" name="portfolio_description"></textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" id="image" type="file" name="portfolio_image" id="example-text-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <center>
                                    <div class="row mb-3">
                                        <div class="col-sm-12">

                                            <label for="example-text-input" class="col-sm-2 col-form-label"></label><br>
                                            <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}"
                                                 alt="Card image cap">
                                        </div>
                                    </div>
                                </center>
                                <!-- end row -->
                                <center><br>
                                    <input type="submit" value="Add Portfolio" class="btn btn-info waves-effect waves-light">
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
