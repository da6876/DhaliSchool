<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

use DB;
use Yajra\DataTables\DataTables;


class AddUserController extends Controller
{
    public function adminUserAdd(Request $request)
    {
        $data = array();
        $data['admin_userName'] = $request->admin_userName;
        $data['admin_password'] = md5($request->admin_Passwrod);
        $data['admin_name'] = $request->admin_fullName;
        $data['admin_gender'] = $request->admin_gender;
        $data['admin_phone'] = $request->admin_Phone;
        $data['admin_email'] = $request->admin_Email;
        $data['address'] = $request->admin_Address;
        $data['admin_user_type'] = $request->admin_user_type;
        /*echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();*/
        $Admins_image = $request->admin_Image;
        if ($Admins_image) {
            $image_rand_num_one = str_random(5);
            $image_rand_num_two = str_random(5);
            $ext = strtolower($Admins_image->getClientOriginalExtension());
            $image_full_name = $image_rand_num_one . '_' . $image_rand_num_two . '_admin_img.' . $ext;
            $upload_path = "ImageFiles/UserImage/";
            $image_url = $upload_path . $image_full_name;
            $success = $Admins_image->move($upload_path, $image_full_name);
            if ($success) {
                $data['admin_image'] = $image_url;
                DB::table('ds_admin_user')->insert($data);
                Session::put('msg', 'New User Added Successfully !');
                return Redirect::to('/add-user');
            }
        } else {
            $data['admin_image'] = 'No Image';
            DB::table('ds_admin_user')->insert($data);
            Session::put('msg', 'New User Added Successfully without Image!');
            return Redirect::to('/add-user');
        }
    }

    public function showUserList(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('ds_admin_user')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    $buttons = '<div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" onclick="showDataFrom('.$data->admin_id.')" name="view" id="' . $data->admin_id . '" class="btn btn-info btn-sm">
                                    <i class="ti-info-alt"></i>
                                  </button>
                                  <button type="button" name="edit" id="' . $data->admin_id . '" class="btn btn-warning btn-sm">
                                    <i class="ti-pencil-alt2"></i>
                                  </button>
                                  <a type="button" name="delete" href="..'. $data->admin_id . '" class="btn btn-danger btn-sm">
                                    <i class="ti-trash"></i>
                                  </a>
                                </div>';
                    return $buttons;
                })
                ->addColumn('actions', function ($data) {
                    $gender = $data->admin_gender;
                    if ($data->admin_gender == '1') {
                        $gender = "Male";
                    } else {
                        $gender = "Fe-Male";
                    }
                    return $gender;
                })
                ->addColumn('adminImage', function ($data) {
                    $image = $data->admin_image;
                    if ($data->admin_image == "No Image") {
                        return $image = 'No Image';
                    } else {
                        return '<img src="' . $data->admin_image . '" width="80px" height="80px"/>';
                    }
                })
                ->rawColumns(['actions', 'adminImage', 'action'])
                ->make(true);
        }
        return view('admin.user_list');

    }


    public function show($id)
    {
        $adminInfo=DB::table('ds_admin_user')
            ->where('admin_id', $id)
            ->first();
        /*echo "<pre>";
        print_r($adminInfo);
        echo "</pre>";
        exit();*/
        return $adminInfo;
    }
}
