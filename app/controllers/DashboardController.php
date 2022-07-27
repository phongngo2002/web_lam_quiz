<?php
namespace App\Controllers;

use App\Models\User;

class DashboardController{
    public function index(){
        if(!isset($_SESSION['id_user'])){
            header('location: '.BASE_URL.'login');
        }
        else if(User::find($_SESSION['id_user'])->role_id == 2){
            header('location: '.BASE_URL.'login');
        }else{
            $user = User::find($_SESSION['id_user']);
            // $VIEW_PAGE = "./app/views/dashboard.php";
            return view('dashboard.index',[
                'user' => $user


            ]);
        }
    }
}
?>