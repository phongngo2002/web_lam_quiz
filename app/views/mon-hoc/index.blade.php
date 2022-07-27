@extends('layouts.main')
              @section('content')
              <a href="{{BASE_URL . 'mon-hoc/tao-moi'}}" class="btn btn-primary mb-2">Tạo mới</a>
                <table class="table table-hover text-center">
                    <thead>
                        <th class="font-bold ">Mã môn</th>
                        <th>Tên môn</th>
                        <th>Người thêm</th>
                        <th>

                        </th>
                    </thead>
                    <tbody>
                        @foreach ($subjects as $sub)
                            <tr>
                                <td>{{$sub->subId}}</td>
                                <td>{{$sub->subName}}</td>
                                <td>{{$sub->authorName}}</td>
                                <td>
                                    <a href="{{ BASE_URL . 'mon-hoc/'.$sub->subId.'/cap-nhat'}}" class="btn btn-warning">Sửa</a>
                                    <a href="{{ BASE_URL . 'mon-hoc/'.$sub->subId.'/xoa' }}" class="btn btn-danger" onclick="return confirm('Bạn có chắc muốn xóa !')">Xóa</a>
                                    <a href="{{BASE_URL. 'mon-hoc/'.$sub->subId.'/list'}}" class="btn btn-info">Thống Kề</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                  @endsection          