<?php

namespace App\Controllers;

use App\Models\Role;
use App\Models\Subject;
use App\Models\User;

class UserController
{
    public function index()
    {
        $query = User::select()->orderBy('id', 'desc');
        $users = $query->get();
        $user = User::find($_SESSION['id_user']);
        // $VIEW_PAGE = "./app/views/users/index.php";
        // include_once "./app/views/layout.php";
        return view('users.index', [
            'users' => $users,
            'user' => $user
        ]);
    }
    public function addForm()
    {
        $user = User::find($_SESSION['id_user']);

        $roles = Role::all();
        // $VIEW_PAGE = "./app/views/users/add-form.php";
        // include_once "./app/views/layout.php";
        return view('users.add-form', [
            'user' => $user,
            'roles' => $roles
        ]);
    }
    public function saveAdd($site = 'default')
    {
        $img = $_FILES['avatar']['name'];
        $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        if (strlen($img) > 0) {
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . '/web_lam_quiz/img/' . $_FILES['avatar']['name']);
        } else {
            $img = '20e10d7f0556722e4b4e32c7241d0638.jpg';
        }

        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $hashed_password,
            'avatar' => $img,
            'role_id' => $_POST['role']
        ];
        $model = new User();
        $model->name = $_POST['name'];
        $model->email = $_POST['email'];
        $model->password = $hashed_password;
        $model->avatar = $img;
        $model->role_id = $_POST['role'];
        // $model = User::create($data);
        $model->save();
        if ($site == 9999) {
            $_SESSION['login']['email'] = $_POST['email'];
            header('location: ' . BASE_URL . 'login');
            die;
        } else {
            header('location: ' . BASE_URL . 'resign');
            die;
        }
    }
    public function updateForm($id)
    {

        $roles = Role::all();
        $userUpdate = User::find($id);
        $user = User::find($_SESSION['id_user']);
        return view('users.update-form', [
            'roles' => $roles,
            'data' => $userUpdate,
            'user' => $user,
            'id' => $id

        ]);
        // $VIEW_PAGE = "./app/views/users/update-form.php";
        // include_once "./app/views/layout.php";
    }
    public function saveUpdate()
    {
        $password = null;
        $id = $_POST['id'];
        $img = $_FILES['avatar']['name'];
        $user = User::find($id);
        if (strlen($img) > 0) {
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"] . '/web_lam_quiz/img/' . $_FILES['avatar']['name']);
        } else {
            $img = $user->avatar;
        }
        if ($_POST['new_password'] == "") {
            $password = $_POST['password'];
        } else {
            if (password_verify($_POST['confirm_password'], $user->password)) {
                $password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
            } else {
                header('location: ' . BASE_URL . 'user/cap-nhat?id=' . $id . '&loi');
                die;
            }
        }
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $password,
            'avatar' => $img,
            'role_id' => $_POST['role']
        ];
        $user = User::find($id);
        $user->name = $_POST['name'];
        $user->email = $_POST['email'];
        $user->password = $password;
        $user->avatar = $img;
        $user->role_id = $_POST['role'];
        $user->save();
        // $user->id = $id;
        // $user->update($data);
        header('location: ' . BASE_URL . 'user');
        die;
    }

    public function remove($id)
    {
        User::destroy($id);
        header('location: ' . BASE_URL . 'user');
        die;
    }

    public function profileAdmin()
    {
        $user = User::find($_SESSION['id_user']);
        $role = Role::find($user->role_id)->name;
        $subjects = Subject::where('author_id', '=', $user->id)->get();
        // $VIEW_PAGE = './app/views/users/profile-user.php';
        // include "./app/views/layout.php";
        return view('users.profile-user', [
            'user' => $user,
            'rold' => $role,
            'subjects' => $subjects
        ]);
    }
}
