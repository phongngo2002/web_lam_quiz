
@extends('layouts.main')
@section('content')
<h2 class="font-bold mb-2 text-xl text-danger">Cập nhật câu hỏi</h2>
                <form action="{{BASE_URL . 'question/'.$id.'/cap-nhat'}}" method="post" enctype="multipart/form-data" id="form-question">
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" name="form-name" value="{{$question->name}}">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                    <div class="mb-1">
                            <img src="{{IMAGE_URL.''.$question->img}}" alt="" class="rounded-circle" style="max-height: 125px; ">
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" name="form-img">
                    </div>
                    <button type="button" class="btn btn-primary" id="btnSubmit">Lưu</button>
                    <a href="{{BASE_URL.'question/'.$question->quiz_id.'/list'}}"><button type="button" class="btn btn-success">Quay lại</button></a>
                </form>


    <script src="{{BASE_URL.'js/validate/question.js'}}" type="module"></script>
@endsection