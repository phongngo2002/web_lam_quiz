@extends('layouts.main')
@section('content')
                <a href="{{BASE_URL.'question/'.$question->quiz_id.'/list'}}" class="btn btn-primary">Quay lại</a>
                    <div class="mb-3">
                        <h2 class="text-center mb-2">{{$question->name}}</h2>
                        <table class="table table-hover text-center">
                            <thead>
                                <th>Tiêu đề</th>
                                <th>Đáp án đúng</th>
                                <th>

                                </th>
                            </thead>
                            <tbody>
                                @foreach ($answers as $answer)
                                    <tr>
                                        <td>{{$answer->content}}</td>
                                        <td>{{$answer->is_correct == 0 ? 'False' : 'True'}}</td>
                                        <td>
                                            <a href="{{BASE_URL.'answer/'.$answer->id.'/cap-nhat'}}" class="btn btn-warning">Update</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
</div>
@endsection