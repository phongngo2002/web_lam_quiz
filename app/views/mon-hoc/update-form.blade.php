@extends('layouts.main')
@section('content')
                <h2 class="font-bold mb-2 text-xl text-danger">Cập nhật môn học</h2>
                <form action="{{ BASE_URL . 'mon-hoc/cap-nhat' }}" method="post" id="form-subject">
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control" name="name" value="{{$subject->name}}" >
                        <input type="hidden" class="form-control" name="id" value="{{$subject->id}}" >
                        <small class="text-danger"></small>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-submit">Lưu</button>
                </form>



    <script src="{{BASE_URL.'js/validate/subject.js'}}" type="module"></script>
@endsection