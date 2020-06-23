<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

use DB;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function addUser()
    {
        return view('admin.add_user');
    }

    public function addTeacher()
    {
        return view('admin.add_teacher');
    }

    public function addStudent()
    {
        return view('admin.add_student');
    }

    public function addWebMenu()
    {
        return view('admin.add_web_menu');
    }

    public function addWebSlider()
    {
        return view('admin.add_web_sider');
    }

    public function login()
    {
        return view('login');
    }

    public function adminLogin(Request $request)
    {
        $admin_userName = $request->admin_userName;
        $admin_password = md5($request->admin_password);
        $result = DB::table('ds_admin_user')
            ->where('admin_userName', $admin_userName)
            ->where('admin_password', $admin_password)
            ->first();
        if ($result) {
            Session::put('admin_id', $result->admin_id);
            Session::put('admin_userName', $result->admin_userName);
            Session::put('admin_name', $result->admin_name);
            Session::put('admin_image', $result->admin_image);
            return Redirect::to('/admin-dashbord');
        } else {
            Session::put('msg', 'User Name Password Is Invalid !');
            return Redirect::to('/login');
        }
    }

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

        echo "<pre>";
        print_r($data);
        echo "</pre>";
        exit();
        /*$Admins_image = $request->admin_Image;
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
            DB::table('tbl_product')->insert($data);
            Session::put('msg', 'New User Added Successfully without Image!');
            return Redirect::to('/add-user');
        }*/
    }

}
