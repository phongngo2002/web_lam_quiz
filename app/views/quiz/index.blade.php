@extends('layouts.main')
@section('content')
<select class="form-select mb-3 mt-3 block" id="form-select">
    <option value="">Môn học</option>
    @foreach($subjects as $subject)
    <option value="{{$subject->id}}">{{$subject->name}}</option>
    @endforeach
</select>
<table class="table table-hover text-center">
    <thead>
        <!-- <th class="font-bold ">Mã quiz</th> -->
        <th>Tên quiz</th>
        <th>Thời gian làm bài</th>
        <th>Thời gian mở</th>
        <th>Thời gian đóng</th>
        <th>Trạng thái</th>
        <th>Trộn đề</th>
        <th colspan="3"><a class="btn btn-success" href="{{BASE_URL}}quiz/tao-moi">Thêm mới</a></th>
    </thead>

    <tbody>
        @if(count($quiz) === 0)
        {{'Không tìm thấy bài quiz nào của môn vừa chọn'}}
        @else
        @foreach($quiz as $q)
        <tr>
            <td>{{$q->name}}</td>
            <td>{{$q->duration_minutes}}</td>
            <td>{{$q->start_time}}</td>
            <td>{{$q->end_time}}</td>
            <td>{{$q->status == 0 ? 'Mở' : 'Đóng'}} </td>
            <td>{{$q->is_shuffle == 0 ? 'Có' : 'Không'}}</td>
            <td>
                <a class="btn btn-warning" href="{{BASE_URL}}quiz/{{$q->id}}/cap-nhat">UPDATE</a>
                <a href="{{BASE_URL}}quiz/{{$q->id}}/xoa" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa')">DELETE</a>
                <a class="btn btn-info" href="{{BASE_URL}}question/{{$q->id}}/list">Xem bộ câu hỏi</a>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<script>
    const formSelect = document.getElementById('form-select');
    formSelect.addEventListener('change', () => {
        document.location = `http://localhost/web_lam_quiz/quiz/${+formSelect.value}`;
    })
</script>
@endsection