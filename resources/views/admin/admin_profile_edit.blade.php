@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

            <div class="card-body">

                <h4 class="card-title">Edit Profile</h4>
            <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" value="{{ $editData->name }}" id="example-text-input">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="email" value="{{ $editData->email }}" id="example-text-input">
                    </div>
                </div>
                <!-- end row -->

                <div class="row mb-3">
                    <label for="example-text-input"  class="col-sm-2 col-form-label">Profile Image</label>
                    <div class="col-sm-10">
                        <input class="form-control" id="image" type="file" name="profile_image"  id="example-text-input">
                    </div>
                </div>
                <!-- end row -->
                <center>
                <div class="row mb-3">
                    <div class="col-sm-12">

                            <label for="example-text-input" class="col-sm-2 col-form-label">New Profile Image</label><br>
                            <img id="showImage" class="rounded-circle avatar-xl" src="{{ (!empty($editData->profile_image)) ?
                                                                    url('upload/admin_images/'.$editData->profile_image)
                                                                    :url('upload/standart.png')}}" alt="Card image cap">

                    </div>
                </div>
                </center>
                <!-- end row -->
                <center><br>
                <input type="submit" value="submit" class="btn btn-info waves-effect waves-light">
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
