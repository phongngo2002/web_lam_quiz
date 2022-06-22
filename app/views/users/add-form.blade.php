@extends('layouts.main')
@section('content')
                <h2 class="font-bold mb-2 text-xl text-danger">Thêm người dùng</h2>
                <form action="{{BASE_URL . 'user/tao-moi'}}" method="post" enctype="multipart/form-data" id="form-resign">
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Họ và tên người dùng</label>
                        <input type="text" class="form-control" name="name" id="form-name">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Avatar</label>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                    <div class="mb-3 form-input">
                    <label for="exampleInputEmail1" class="form-label">Vai trò</label>
                        <select class="form-select w-full" aria-label="Default select example" name="role">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endforeach
                        </select>
                        <small class="text-danger"></small>
                    </div>
                    <button type="button" class="btn btn-primary" id="btnSubmit">Lưu</button>
                </form>


    <script src="{{BASE_URL.'js/validate/resign.js'}}" type="module"></script>
@endsection