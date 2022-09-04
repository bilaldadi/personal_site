@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <h4 class="card-title">Change Password</h4> <br><br>

                            @if(count($errors))
                                @foreach($errors->all() as $error)
                                    <p class="alert alert-danger alert-dismissible fade show ">{{ $error }}</p>
                                @endforeach
                            @endif


                            <form method="post" action="{{ route('update.password') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="oldPassword"  id="oldPassword">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="newPassword"  id="newPassword">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="password" name="confirmPassword" id="confirmPassword">
                                    </div>
                                </div>
                                <!-- end row -->

                                <center><br>
                                    <input type="submit" value="Change Password" class="btn btn-info waves-effect waves-light">
                                </center>

                            </form>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>


@endsection
