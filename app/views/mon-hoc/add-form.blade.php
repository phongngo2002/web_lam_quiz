@extends('layouts.main')
@section('content')
                <h2 class="font-bold mb-2 text-xl text-danger">Thêm mới môn học</h2>
                <form action="{{BASE_URL . 'mon-hoc/tao-moi'}}" method="post" id="form-subject">
                    <div class="mb-3 form-input">
                        <label for="exampleInputEmail1" class="form-label">Tên môn học</label>
                        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
                       <small class="text-danger"></small>
                    </div>
                    <button type="button" class="btn btn-primary" id="btn-submit">Lưu</button>
                    <a href="{{BASE_URL.'mon-hoc'}}" class="btn btn-success">Quay lại</a>
                </form>


<script src="<?=BASE_URL.'js/validate/subject.js'?>" type="module"></script>
@endsection