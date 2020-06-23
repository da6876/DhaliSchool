@extends("admin_index")
@section('admin-content')
    <div class="main-panel">

        <div class="content-wrapper">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        {{--<h4 class="card-title">User Add form elements</h4>
                        <p class="card-description">
                            Enter All The Information Of Your User
                        </p>--}}
                        <?php
                        $msg = Session::get('msg');
                        if ($msg){

                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php
                            echo $msg;
                            Session::put('msg', null);

                            ?>
                        </div>

                        <?php
                        }
                        ?>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <h4 class="card-title">User Add form elements</h4>
                                <p class="card-description">
                                    Enter All The Information Of Your User
                                </p>
                            </div>
                            <div class="form-group col-md-2">
                                <a href="{{url('/show-user-list')}}" class="btn btn-info pull-right text-white">View
                                    User List</a>
                            </div>
                        </div>
                        <form class="forms-sample" action="{{url('/admin-user-add')}}" method="post"
                              enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName1">Full Name</label>
                                    <input type="text" class="form-control" name="admin_fullName"
                                           placeholder="Enter Full Name">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="exampleSelectGender">Gender</label>
                                    <select class="form-control" name="admin_gender">
                                        <option value="1">Male</option>
                                        <option value="2">Female</option>
                                        <option value="3">Others</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName1">Email Address</label>
                                    <input type="email" class="form-control" name="admin_Email"
                                           placeholder="Enter Email Address">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail3">Phone Number address</label>
                                    <input type="number" maxlength="11" class="form-control" name="admin_Phone"
                                           placeholder="Enter Phone Number">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName1">User Name</label>
                                    <input type="text" class="form-control" name="admin_userName"
                                           placeholder="Enter Your User Name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail3">Password</label>
                                    <input type="password" class="form-control" name="admin_Passwrod"
                                           placeholder="Enter A Password">
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Image</label>
                                    <input type="file" name="admin_Image" class="file-upload-default">
                                    <div class="input-group col-xs-12">
                                        <input type="text" name="admin_Image" class="form-control file-upload-info"
                                               disabled
                                               placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                    type="button">Upload</button>
                                        </span>
                                    </div>
                                </div>
                                <?php
                                $userType = DB::table('ds_user_type')
                                    ->select('user_type_id', 'user_type_name', 'user_type_status')
                                    ->where('user_type_status', 'A')
                                    ->get();
                                ?>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail3">User Type</label>
                                    <select class="form-control" name="admin_user_type">
                                        <option value="0">Select User Type</option>
                                        @foreach($userType as $userType)
                                            <option value="{{$userType->user_type_id}}">{{$userType->user_type_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group  col-md-12">
                                    <label for="exampleTextarea1">Address</label>
                                    <textarea class="form-control" name="admin_Address" rows="4"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button type="reset" class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection