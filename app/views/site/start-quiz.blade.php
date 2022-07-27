@extends('layouts.site.main')
@section('content')
        <section class="py-5">
            <div class="ms-5">
                <span id="the-span" class="fw-bold" data-minutes="{{$tg_lam}}" style="display: none;"></span>
            </div>


            <div class="container px-5 my-5">
                <div>
                    <h2 class="text-danger">Bài thi sẽ kết thúc sau <span id="time"><?= $tg_lam; ?>:00</span> minutes!</h2>
                </div>
                <form method="POST" action="{{BASE_URL . 'quiz/kiem-tra'}}" id="form-tra-loi" onsubmit="return confirm('Bạn có chắc muốn kết thúc bài thi ?')">
                    <input type="hidden" name="quiz_id" value="{{$quiz_id}}">
                    @foreach ($questions as $question)
                        <div class="mb-3">
                            <h4>Câu {{$loop->iteration}} : {{$question->name}}. </h4>
                            @foreach($answer($question->id) as $answer)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="form-dap-an{{$a}}" value="{{$answer->id}}">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{$answer->content}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @php $a+=1 @endphp
                    @endforeach
                    <button class="btn btn-success">Kết thúc bài thi</button>
                </form>
            </div>
        </section>

        <!-- Testimonial section-->
        <div class="py-5 bg-light">
            <div class="container px-5 my-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-10 col-xl-7">
                        <div class="text-center">
                            <div class="fs-4 mb-4 fst-italic">Đối với mỗi con người chúng ta, việc học tập là vô cùng cần thiết và quan trọng. Học để chúng ta lĩnh hội kiến thức và phục vụ cho công việc, cho cuộc sống sau này. Chính vì thế mà việc học là một việc mỗi con người chúng ta đều phải học. nhưng học như thế nào cho đúng, cho hiệu quả thì ai có thể làm được. nhà triết học Lê- Nin đã có một câu nói về cách học mà chúng ta cần phải học hỏi, đó là "Học, học nữa, học mãi”. Để biết rõ hơn về câu nói này, ta cùng đi tìm hiểu thế nào là "Học, học nữa, học mãi”</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="https://wallpaperaccess.com/full/756433.jpg" alt="..." style="width: 40px;height: 40px;" />
                                <div class="fw-bold">
                                    Đề Tứ
                                    <span class="fw-bold text-primary mx-1">/</span>
                                    CEO, Pomodoro
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<script src="{{BASE_URL}}js/main.js"></script>
@endsection