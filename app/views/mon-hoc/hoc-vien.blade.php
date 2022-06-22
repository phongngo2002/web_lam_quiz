@extends('layouts.main')
@section('content')
                <h3>{{'Lịch sử làm '.$name_quizz.' - '.$name_student}}</h3>
                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">Lần</th>
                            <th scope="col">Thời gian bắt đầu</th>
                            <th scope="col">Thời gian kết thúc</th>
                            <th scope="col">Điểm số</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $a)
                        @php $i++ @endphp
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$a->start_time}}</td>
                                <td>{{$a->end_time}}</td>
                                <td>{{$a->score}}</td>
                            </tr>
              
                        @endforeach
                    </tbody>
                </table>
@endsection