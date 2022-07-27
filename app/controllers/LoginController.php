<?php

namespace App\Controllers;

use App\Models\User;

class LoginController
{
    public function index()
    {
        $email = null;
        if(isset($_SESSION['login']['email'])){
            $email = $_SESSION['login']['email'];
        }
        return view('login.index',[
            'email' => $email
        ]);
        // $VIEW_PAGE = "./app/views/login/index.php";
        // include_once "./app/views/layout.php";
    }
    public function dang_nhap()
    {
        $check = false;
        $users = User::all();
        $email = $_POST['form-email'];
        $pass = $_POST['form-password'];
        foreach ($users as $user) {
            if ($user->email == $email && password_verify($pass, $user->password)) {
                $check = true;
                $_SESSION['id_user'] = $user->id;
                if(isset($_SESSION['login'])){
                    unset($_SESSION['login']);
                }
                break;

            }
        }
        if ($check == true && User::find($_SESSION['id_user'])->role_id == 1) {
            header('location: ' . BASE_URL . 'dashboard');
            die;
        } else if ($check == true && User::find($_SESSION['id_user'])->role_id == 2) {
                header('location: ' . BASE_URL . '');
                die;
        } else {
            header('location: ' . BASE_URL . 'login');
            die;
        }
    }

    public function logout()
    {
        unset($_SESSION['id_user']);
        header('location: ' . BASE_URL . 'login');
    }

    public function resignForm()
    {
        return view('login.resign',[]);
    }
}
