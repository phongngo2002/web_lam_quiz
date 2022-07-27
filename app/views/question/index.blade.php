@extends('layouts.main')
@section('content')
            <a href="{{ BASE_URL . 'question/'.$id.'/tao-moi'}}" class="btn btn-primary mb-2">Tạo mới</a>
                <table class="table table-hover text-center">
                    <thead>
                        <th class="font-bold">Ảnh mô tả</th>
                        <th>Tiêu đề</th>
                        <th>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($questions as $question)
                            <tr>
                            <td><img src="{{IMAGE_URL.''.$question->img}}" alt="" class="rounded-circle" style="max-height: 125px; "></td>
                                <td>{{$question->name}}</td>
                                <td>
                                    <a href="{{BASE_URL.'question/'.$question->id.'/cap-nhat'}}" class="btn btn-warning">Update</a>
                                    <a href="{{BASE_URL.'question/'.$question->id.'/'.$question->quiz_id.'/xoa'}}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa')">Delete</a>
                                    <a href="{{BASE_URL.'question/'.$question->id.'/view'}}" class="btn btn-success">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
@endsection

