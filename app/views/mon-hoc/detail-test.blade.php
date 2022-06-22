@extends('layouts.main')
@section('content')
                <h4 class="m-3 text-danger">{{'Chi tiết '.$quiz->name}}</h4>
                <a href="{{BASE_URL . 'mon-hoc/list?id='.$quiz->subject_id}}" class="btn btn-primary mb-2">Quay lại</a>
                <table class="table table-hover text-center">
                    <thead>
                        <th class="font-bold ">AVATAR</th>
                        <th>Họ tên sinh viên</th>
                        <th>Lần bắt đầu làm cuối cùng</th>
                        <th>Lần kết thúc bài thi cuối cùng</th>
                        <th>Kết quả lần thi cuối cùng</th>
                        <th>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($detail as $info)
                            <tr>
                                <td><img src="{{IMAGE_URL}}{{ $info->avatar}}" alt="" class="rounded-circle" style="max-height: 125px; "></td>
                                <td>{{ $info->student_name}}</td>
                                <td>{{$info->start_time}}</td>
                                <td>{{$info->end_time}}</td>
                                <td>{{$info->score}}</td>
                                <td>
                                    <a href="{{BASE_URL . 'mon-hoc/'.$info->id_hv.'/'.$quiz->id.'/hoc-vien'}}" class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

@endsection