@extends('layouts.main')
@section('content')
                <h2 class="font-bold mb-2 text-xl text-danger">Thêm người dùng</h2>
                <form action="{{BASE_URL . 'user/cap-nhat'}}" method="post" enctype="multipart/form-data" id="form-resign">
                    <div class="mb-3 form-input">
                        <input type="hidden" value="{{$data->id}}" name="id">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $data->email}}">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" value="{{ $data->password}}" readonly>
                        <small></small>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" name="new_password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Xác nhận mật khẩu cũ (nếu đổi mật khẩu)</label>
                        <input type="password" class="form-control" name="confirm_password">
                        <p class="text-danger">{{isset($_GET['loi']) ? 'Xác nhận mật khẩu không chính xác' : ''}}</p>
                    </div>
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Họ và tên người dùng</label>
                        <input type="text" class="form-control" name="name" value="{{ $data->name}}" id="form-name">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1">
                            <img src="{{IMAGE_URL.''.$data->avatar}}" alt="" class="rounded-circle" style="max-height: 125px; ">
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Avatar</label>
                        <input type="file" class="form-control" name="avatar">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Vai trò</label>
                        <select class="form-select w-full" aria-label="Default select example" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id}}" {{$role->id == $data->role_id ? 'selected' : ''}}>{{ $role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="btnSubmit">Lưu</button>
                </form>

    <script src="{{BASE_URL.'js/validate/resign.js'}}" type="module"></script>
@endsection