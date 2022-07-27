@extends('layouts.main')
@section('content')
                <a href="{{BASE_URL . 'user/tao-moi'}}" class="btn btn-primary mb-2">Tạo mới</a>
                <table class="table table-hover text-center">
                    <thead>
                        <th>Avartar</th>
                        <th class="font-bold ">Tên người dùng</th>
                        <th>Email</th>
                        <th>Vai trò</th>
                        <th>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td><img src="{{IMAGE_URL.''.$user->avatar}}" alt="" class="rounded-circle" style="max-height: 125px; "></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role_id == 1 ? 'Giáo viên' : 'Học sinh'}}</td>
                                <td>
                                    <a href="{{BASE_URL.'user/'.$user->id.'/cap-nhat'}}" class="btn btn-warning">Update</a>
                                    <a href="{{BASE_URL.'user/'.$user->id.'/xoa'}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa')">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection

