@extends('layouts.site.main')
@section('content')
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                   <h4>Danh sách môn</h4>
                    <div class="col-lg-12">
                        <!-- Post content-->
                        <section class="py-5">
                <div class="container px-5">
                    <div class="row gx-5">
                        @foreach($subjects as $sub)
                            <div class="col-lg-4 mb-5">
                            <div class="card h-100 shadow border-0">
                                <img class="card-img-top" src="http://freelancervietnam.vn/wp-content/uploads/2019/11/programming-languages.jpg" alt="..." />
                                <div class="card-body p-4">
                                    <div class="badge bg-primary bg-gradient rounded-pill mb-2">News</div>
                                    <a class="text-decoration-none link-dark stretched-link" href="{{BASE_URL}}mon-hoc/{{$sub->id}}/chi-tiet"><div class="h5 card-title mb-3">{{$sub->nameSub}}</div></a>
                                    <p class="card-text mb-0">“Nếu không có requirements hoặc design thì lập trình cũng chỉ như là nghệ thuật của việc thêm bug vào đoạn trống của text file mà thôi”</p>
                                </div>
                                <div class="card-footer p-4 pt-0 bg-transparent border-top-0">
                                    <div class="d-flex align-items-end justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <img class="rounded-circle me-3" src="https://dummyimage.com/40x40/ced4da/6c757d" alt="..." />
                                            <div class="small">
                                                <div class="fw-bold">{{$sub->nameAuth}}</div>
                                                <div class="text-muted">March 12, 2021 &middot; 6 min read</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
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
