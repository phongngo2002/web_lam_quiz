@extends('layouts.site.main')
@section('content')
        <!-- Header-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-3">
                        <div class="d-flex align-items-center mt-lg-5 mb-4">
                            <img class="img-fluid rounded-circle" src="{{IMAGE_URL.''.$userSub->avatar}}" alt="..." style="max-width: 40px;" />
                            <div class="ms-3">
                                <div class="fw-bold">{{$userSub->name}}</div>
                                <div class="text-muted">News, Business</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{$subject->name}}</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">January 1, 2021</div>
                                <!-- Post categories-->
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a>
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="https://st.quantrimang.com/photos/image/2019/07/18/ngon-ngu-lap-trinh-la-gi-3.jpg" alt="..." /></figure>
                            <!-- Post content-->
                            <div class="accordion mb-5" id="accordionExample">
                                @foreach ($quiz($subject->id) as $quiz)
                                    <div class="accordion-item">
                                        <h3 class="accordion-header" id="headingOne"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">{{$quiz->name}}</button></h3>
                                        <div class="accordion-collapse collapse show" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                <strong class="the_minutes">Thời gian làm bài {{$quiz->duration_minutes}} phút <br></strong>
                                                - LMS tự động logout nếu SV không có tác vụ gì tại LMS trong 15 phút. - Mỗi SV chỉ được đăng nhập LMS tại 1 nơi. Nếu đăng nhập 2 nơi LMS sẽ tự động khóa account trong 20 phút. - Khi kết thúc bài phải ấn nút “Kết thúc” ở câu cuối, không ấn nút “Đình chỉ thi” sẽ mất các câu chưa làm. - Chú ý sinh viên không tắt trình duyệt trực tiếp để thoát khỏi LMS sinh viên phải chọn “Đăng xuẩt”, trường hợp đang làm bài thi hoặc Quiz máy bị lỗi hoặc mất điện Sinh viên gặp IT để được hỗ quay lại làm bài sớm nhất. - Với bài thi môn Tiếng Anh. + Bật javascript để làm bài. + Bài Essay khi kết thúc ấn nút “Save” (góc dưới bên phải) để tránh mất bài. + Chú ý: Bài nghe có 3 file nghe tương ứng với 3 bài
                                                <div class=" mt-3">
                                                    <h4 class="" style="font-weight: bold;">Kết quả :</h4>
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
                                                            @foreach ($studentQuiz($quiz->id) as $result)
                                                                <tr>
                                                                    <th scope="row">{{$loop->iteration}}</th>
                                                                    <td>{{$result->start_time}}</td>
                                                                    <td>{{$result->end_time}}</td>
                                                                    <td>{{$result->score}}</td>
                                                                </tr>
                                                            @endforeach
                                                             @if(count($studentQuiz($quiz->id)) == 0)
                                                                <p>Không tìm thấy kết quả phù hợp</p>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    @php
                                                    if ($tg(date("F d, Y h:i:s A")) <= $tg($quiz->end_time)) {
                                                        if ($quiz->status == 1) {
                                                            echo '<p class="fw-bold">Bài tập chưa được mở</p>';
                                                        } else {
                                                            echo ' <a href="' . BASE_URL . 'quiz/'.$quiz->id.'/lam-bai" class="btn btn-success  the-a"  data-minutes="' . $quiz->duration_minutes . '" >Bắt đầu làm bài</a>';
                                                        }
                                                    } else {
                                                        echo '<p class="fw-bold">Bài tập đã hết hạn . Lần mở cuối ' . date($quiz->end_time) . '</p>';
                                                    }
                                                    @endphp

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </article>
                        <!-- Comments section-->
                    </div>
                </div>
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
        <!-- Blog preview section-->
@endsection
