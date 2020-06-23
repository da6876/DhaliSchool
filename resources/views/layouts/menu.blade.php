<!-- ##### Preloader ##### -->
<div id="preloader">
    <i class="circle-preloader"></i>
</div>

<!-- ##### Header Area Start ##### -->
<header class="header-area">

    <!-- Top Header Area -->
    <div class="top-header">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="header-content h-100 d-flex align-items-center justify-content-between">
                        <div class="academy-logo">
                            <a href="index.html"><img src="{{asset('public/img/core-img/logo.png')}}" alt=""></a>
                        </div>
                        <div class="login-content">
                            <a href="{{url('/admin')}}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar Area -->
    <div class="academy-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="academyNav">

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                    <?php
                    $menus = DB::table('main_menu')
                        ->select('menu_id', 'menu_name', 'menu_link', 'sub_menu_status')
                        ->where('menu_status',1)
                        ->get();
                    /*echo '<pre>';
                    print_r($menus) ;
                    echo '</pre>';*/
                    ?>
                    <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                @foreach($menus as $menus)
                                    @if($menus->menu_link)
                                        <li>
                                            <a href="{{$menus->menu_link}}">{{$menus->menu_name}}</a>
                                            <?php
                                            $submenus = DB::table('sub_menu')
                                                ->where('menus_id', $menus->menu_id)
                                                ->where('sub_menu_status',1)
                                                ->select('sub_menu_id', 'sub_menu_name', 'sub_menu_link')
                                                ->get();
                                            ?>
                                            @if($menus->sub_menu_status==1)
                                            <ul class="dropdown">
                                                @foreach($submenus as $submenus)
                                                    <li><a href="{{$submenus->sub_menu_link}}">{{$submenus->sub_menu_name}}</a></li>
                                                @endforeach
                                            </ul>
                                                @else

                                                @endif

                                        </li>

                                    @endif
                                @endforeach

                                {{--<li><a href="index.html">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="course.html">Course</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>--}}

                            </ul>

                            {{--<ul>

                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="about-us.html">About Us</a></li>
                                        <li><a href="course.html">Course</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Mega Menu</a>
                                    <div class="megamenu">
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <ul class="single-mega cn-col-4">
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Services &amp; Features</a></li>
                                            <li><a href="#">Accordions and tabs</a></li>
                                            <li><a href="#">Menu ideas</a></li>
                                            <li><a href="#">Students Gallery</a></li>
                                        </ul>
                                        <div class="single-mega cn-col-4">
                                            <img src="{{asset('public/img/bg-img/bg-1.jpg')}}" alt="">
                                        </div>
                                    </div>
                                </li>
                                <li><a href="about-us.html">About Us</a></li>
                                <li><a href="course.html">Course</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>--}}
                        </div>
                        <!-- Nav End -->
                    </div>

                    <!-- Calling Info -->
                    <div class="calling-info">
                        <div class="call-center">
                            <a href="tel:+654563325568889"><i class="icon-telephone-2"></i>
                                <span>(+65) 456 332 5568 889</span></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ##### Header Area End ##### -->