@extends('layouts.main')
@section('content')
<h2 class="font-bold mb-2 text-xl text-danger">Thêm mới câu hỏi</h2>
<form action="{{BASE_URL . 'question/'.$id.'/tao-moi'}}" method="post" enctype="multipart/form-data" id="form-question">
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Tiêu đề</label>
        <input type="text" class="form-control" name="form-name">
        <small class="text-danger"></small>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Ảnh đại diện</label>
        <input type="file" class="form-control" name="form-img">
    </div>
    <hr>
    <h2 class="font-bold mb-2 text-xl text-danger">Đáp án</h2>
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Đáp án thứ nhất</label>
        <input type="text" class="form-control" name="form-answer1">
        <small class="text-danger"></small>
    </div>
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Hình mô tả (nếu có)</label>
        <input type="file" class="form-control" name="form-img-answer1">
    </div>
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Đáp án thứ hai</label>
        <input type="text" class="form-control" name="form-answer2">
        <small class="text-danger"></small>
    </div>
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Hình mô tả (nếu có)</label>
        <input type="file" class="form-control" name="form-img-answer2">
    </div>
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Đáp án thứ ba</label>
        <input type="text" class="form-control" name="form-answer3">
        <small class="text-danger"></small>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình mô tả (nếu có)</label>
        <input type="file" class="form-control" name="form-img-answer3">
    </div>
    <div class="mb-3 form-input">
        <label for="exampleInputEmail1" class="form-label">Đáp án thứ bốn</label>
        <input type="text" class="form-control" name="form-answer4">
        <small class="text-danger"></small>
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Hình mô tả (nếu có)</label>
        <input type="file" class="form-control" name="form-img-answer4">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Đáp án đúng</label>
        <select class="form-select" aria-label="Default select example" name="form-correct">
            <option value="1">Đáp án thứ nhất</option>
            <option value="2">Đáp án thứ hai</option>
            <option value="3">Đáp án thứ ba</option>
            <option value="4">Đáp án thứ bốn</option>
        </select>
    </div>
    <button type="button" class="btn btn-primary" id="btnSubmit">Lưu</button>
    <a href="{{BASE_URL.'question/'.$id.'/list'}}"><button type="button" class="btn btn-success">Quay lại</button></a>
</form>

<script src="{{BASE_URL . 'js/validate/question.js'}}" type="module"></script>
@endsection