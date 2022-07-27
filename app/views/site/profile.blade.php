@extends('layouts.site.main')
@section('content')
       <header class="py-5">
                <div class="container px-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-6">
                            <div class="text-center my-5">
                                <h1 class="fw-bolder mb-3">Môn học của bạn</h1>
                                <p class="lead fw-normal text-muted mb-4"> Học vấn do người siêng năng đạt được, tài sản do người tinh tế sở hữu, quyền lợi do người dũng cảm nắm giữ, thiên đường do người lương thiện xây dựng – Franklin.</p>
                                <a class="btn btn-primary btn-lg" href="{{BASE_URL.'subject'}}">Tìm thêm nhiều môn học khác</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- About section one-->
           @for ($i=0; $i < count($subjects); $i++)
            @if($i % 2 == 0)
            <section class="py-5 bg-light" id="scroll-target">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://aptechbmt.edu.vn/uploads/news/2019_07/hoc-lap-trinh.jpg" alt="..." /></div>
                        <div class="col-lg-6">
                        <h2 class="fw-bolder"><a href="{{BASE_URL.'mon-hoc/'.$subjects[$i]->sub_id.'/chi-tiet'}}" class="text-decoration-none text-dark" >{{$subjects[$i]->title}}</a></h2>
                            <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                        </div>
                    </div>
                </div>
            </section>
            @endif
            @if($i % 2 !=0)
                <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-lg-6 order-first order-lg-last"><img class="img-fluid rounded mb-5 mb-lg-0" src="https://aptechbmt.edu.vn/uploads/news/2019_07/hoc-lap-trinh.jpg" alt="..." /></div>
                        <div class="col-lg-6">
                            <h2 class="fw-bolder"><a href="{{BASE_URL.'mon-hoc/'.$subjects[$i]->sub_id.'/chi-tiet'}}" class="text-decoration-none text-dark">{{$subjects[$i]->title}}</a></h2>
                            <p class="lead fw-normal text-muted mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto est, ut esse a labore aliquam beatae expedita. Blanditiis impedit numquam libero molestiae et fugit cupiditate, quibusdam expedita, maiores eaque quisquam.</p>
                        </div>
                    </div>
                </div>
            </section>
            @endif
        @endfor
            <!-- About section two-->
          
        <!-- Blog preview section-->
@endsection