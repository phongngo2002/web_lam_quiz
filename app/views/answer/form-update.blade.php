@extends('layouts.main')
@section('content')
                <h2 class="font-bold mb-2 text-xl text-danger">Cập nhật đáp án</h2>
                <form action="{{ BASE_URL . 'answer/cap-nhat' }}" method="post" enctype="multipart/form-data" id="form-answer-edit">
                    <div class="mb-3 form-input">
                        <input type="hidden" name="question_id" value="{{ $answer->question_id }}">
                        <input type="hidden" value="{{ $answer->id }}" name="id_ans">
                        <label for="exampleInputEmail1" class="form-label">Đáp án thứ nhất</label>
                        <input type="text" class="form-control" name="form-answer" value="{{ $answer->content }}">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                        <div class="mb-1">
                            <img src="{{ IMAGE_URL }}{{ $answer->img }}" alt="" class="rounded-circle" style="max-height: 125px; ">
                        </div>
                        <label for="exampleInputEmail1" class="form-label">Hình mô tả (nếu có)</label>
                        <input type="file" class="form-control" name="form-img-answer">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Đáp án đúng</label>
                        <select class="form-select" aria-label="Default select example" name="form-correct">
                            <option value="0" {{ $answer->is_correct == 0 ? 'selected' : '' }}>NO</option>
                            <option value="1" {{ $answer->is_correct == 1 ? 'selected' : '' }}>YES</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-submit">Lưu</button>
                </form>

<script src="{{BASE_URL.'js/validate/answer-edit.js'}}" type="module"></script>
@endsection