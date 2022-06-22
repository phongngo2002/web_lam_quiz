<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container px-5">
                    <a class="navbar-brand" href="{{BASE_URL}}">Lập trình không khó</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{BASE_URL}}">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{BASE_URL.'subject'}}">Subject</a></li>
                    

                        

                                @if(!isset($_SESSION['id_user'])){
                                  <li class="nav-item"><a class="nav-link" href="{{BASE_URL.'login'}}">Đăng nhập</a></li>
                                }
                                @else{
                                    <li class="nav-item"><a class="nav-link" href="{{BASE_URL.'your-subject'}}">Thông tin tài khoản</a></li>
                                }
                                @endif
                            
                            @if(isset($_SESSION['id_user']))
                                <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ACTION</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                   @if($user->role_id == 1)
                                    <li><a class="dropdown-item" href="{{BASE_URL.'dashboard'}}">Dashboard</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{BASE_URL.'logout'}}">Đăng xuất</a></li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>