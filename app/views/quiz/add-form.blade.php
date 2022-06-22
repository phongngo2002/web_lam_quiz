@extends('layouts.main')
@section('content')
                <h2 class="font-bold mb-2 text-xl text-danger">Thêm mới Quizz</h2>
                <form action="{{BASE_URL . 'quiz/tao-moi'}}" method="post" id="form-quiz">
                    <div class="mb-3 form-input">
                      
                        <label for="exampleInputEmail1" class="form-label">Tên Quizz</label>
                        <input type="text" class="form-control" name="name">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Thời gian làm</label>
                        <input type="number" class="form-control" name="tg_lam">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Thời gian mở</label>
                        <input type="datetime-local" class="form-control" name="tg_mo">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Thời gian đóng</label>
                        <input type="datetime-local" class="form-control" name="tg_dong">
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3 form-input">
                    <label for="exampleInputEmail1" class="form-label">Môn học</label>
                        <select class="form-select w-full" aria-label="Default select example" name="mon_hoc">
                        <option selected value="0">Môn học</option>
                            @foreach ($subject as $sub)
                                <option value="{{$sub->id}}">{{$sub->name}}</option>
                            @endforeach
                        </select>
                        <small class="text-danger"></small>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Trạng thái</label>
                        <select class="form-select w-full" aria-label="Default select example" name="trang_thai">
                        <option selected value="0">Mở</option>
                        <option value="1">Đóng</option>
                        </select>
                    </div>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Trộn đề</label>
                        <select class="form-select w-full" aria-label="Default select example" name="tron_de">
                        <option selected value="0">Có</option>
                        <option value="1">Không</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-primary" id="form-submit">Lưu</button>
                    <a href="{{BASE_URL.'quiz'}}" class="btn btn-success">Quay lại</a>
                </form>


  
    <script src="{{BASE_URL.'js/validate/quiz.js'}}" type="module"></script>
@endsection