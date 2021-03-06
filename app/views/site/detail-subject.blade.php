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
                                                <strong class="the_minutes">Th???i gian l??m b??i {{$quiz->duration_minutes}} ph??t <br></strong>
                                                - LMS t??? ?????ng logout n???u SV kh??ng c?? t??c v??? g?? t???i LMS trong 15 ph??t. - M???i SV ch??? ???????c ????ng nh???p LMS t???i 1 n??i. N???u ????ng nh???p 2 n??i LMS s??? t??? ?????ng kh??a account trong 20 ph??t. - Khi k???t th??c b??i ph???i ???n n??t ???K???t th??c??? ??? c??u cu???i, kh??ng ???n n??t ???????nh ch??? thi??? s??? m???t c??c c??u ch??a l??m. - Ch?? ?? sinh vi??n kh??ng t???t tr??nh duy???t tr???c ti???p ????? tho??t kh???i LMS sinh vi??n ph???i ch???n ???????ng xu???t???, tr?????ng h???p ??ang l??m b??i thi ho???c Quiz m??y b??? l???i ho???c m???t ??i???n Sinh vi??n g???p IT ????? ???????c h??? quay l???i l??m b??i s???m nh???t. - V???i b??i thi m??n Ti???ng Anh. + B???t javascript ????? l??m b??i. + B??i Essay khi k???t th??c ???n n??t ???Save??? (g??c d?????i b??n ph???i) ????? tr??nh m???t b??i. + Ch?? ??: B??i nghe c?? 3 file nghe t????ng ???ng v???i 3 b??i
                                                <div class=" mt-3">
                                                    <h4 class="" style="font-weight: bold;">K???t qu??? :</h4>
                                                    <table class="table table-hover text-center">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">L???n</th>
                                                                <th scope="col">Th???i gian b???t ?????u</th>
                                                                <th scope="col">Th???i gian k???t th??c</th>
                                                                <th scope="col">??i???m s???</th>
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
                                                                <p>Kh??ng t??m th???y k???t qu??? ph?? h???p</p>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    @php
                                                    if ($tg(date("F d, Y h:i:s A")) <= $tg($quiz->end_time)) {
                                                        if ($quiz->status == 1) {
                                                            echo '<p class="fw-bold">B??i t???p ch??a ???????c m???</p>';
                                                        } else {
                                                            echo ' <a href="' . BASE_URL . 'quiz/'.$quiz->id.'/lam-bai" class="btn btn-success  the-a"  data-minutes="' . $quiz->duration_minutes . '" >B???t ?????u l??m b??i</a>';
                                                        }
                                                    } else {
                                                        echo '<p class="fw-bold">B??i t???p ???? h???t h???n . L???n m??? cu???i ' . date($quiz->end_time) . '</p>';
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
                            <div class="fs-4 mb-4 fst-italic">?????i v???i m???i con ng?????i ch??ng ta, vi???c h???c t???p l?? v?? c??ng c???n thi???t v?? quan tr???ng. H???c ????? ch??ng ta l??nh h???i ki???n th???c v?? ph???c v??? cho c??ng vi???c, cho cu???c s???ng sau n??y. Ch??nh v?? th??? m?? vi???c h???c l?? m???t vi???c m???i con ng?????i ch??ng ta ?????u ph???i h???c. nh??ng h???c nh?? th??? n??o cho ????ng, cho hi???u qu??? th?? ai c?? th??? l??m ???????c. nh?? tri???t h???c L??- Nin ???? c?? m???t c??u n??i v??? c??ch h???c m?? ch??ng ta c???n ph???i h???c h???i, ???? l?? "H???c, h???c n???a, h???c m??i???. ????? bi???t r?? h??n v??? c??u n??i n??y, ta c??ng ??i t??m hi???u th??? n??o l?? "H???c, h???c n???a, h???c m??i???</div>
                            <div class="d-flex align-items-center justify-content-center">
                                <img class="rounded-circle me-3" src="https://wallpaperaccess.com/full/756433.jpg" alt="..." style="width: 40px;height: 40px;" />
                                <div class="fw-bold">
                                    ????? T???
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
