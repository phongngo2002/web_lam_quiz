@extends('layouts.main')
@section('content')
                <a href="{{BASE_URL . 'mon-hoc'}}" class="btn btn-primary mb-2">Quay lại</a>
                <table class="table table-hover text-center">
                    <thead>
                        <th class="font-bold ">Tên quiz</th>
                        <th>Số người làm</th>
                        <th>Điểm trung bình</th>
                        <th>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($infomations as $info)
                            <tr>
                                <td>{{$info->title}}</td>
                                <td>{{$info->so_nguoi_lam}}</td>
                                <td>{{$info->dtb}}</td>
                                <td>
                                    <a href="{{BASE_URL.'mon-hoc/'.$info->quiz_id.'/detail-test'}}" class="btn btn-info">Danh sách chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection