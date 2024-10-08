<!-- Main Header -->
<header class="main-header header-style-2 mb-40">
    <div class="header-bottom header-sticky background-white text-center">
        <div class="scroll-progress gradient-bg-1"></div>
        <div class="mobile_menu d-lg-none d-block"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3">
                    <div class="header-logo d-none d-lg-block">
                        <a href="/">
                            <img class="logo-img d-inline" src="{{ staticAsset("frontend/assets/imgs/logo.svg") }}" alt="">
                        </a>
                    </div>
                    <div class="logo-tablet d-md-inline d-lg-none d-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="{{ staticAsset("frontend/assets/imgs/logo.svg") }}" alt="">
                        </a>
                    </div>
                    <div class="logo-mobile d-block d-md-none">
                        <a href="/">
                            <img class="logo-img d-inline" src="{{ staticAsset("frontend/assets/imgs/favicon.svg") }}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 main-header-navigation">
                    <!-- Main-menu -->
                    <div class="main-nav text-left float-lg-left float-md-right">
                        <ul class="mobi-menu d-none menu-3-columns" id="navigation">
                            <li class="cat-item cat-item-2"><a href="#">Global Economy</a></li>
                            <li class="cat-item cat-item-3"><a href="#">Environment</a></li>
                            <li class="cat-item cat-item-4"><a href="#">Religion</a></li>
                            <li class="cat-item cat-item-5"><a href="#">Fashion</a></li>
                            <li class="cat-item cat-item-6"><a href="#">Terrorism</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Conflicts</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Scandals</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Executive</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Foreign policy</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Healthy Living</a></li>
                            <li class="cat-item cat-item-3"><a href="#">Medical Research</a></li>
                            <li class="cat-item cat-item-4"><a href="#">Children’s Health</a></li>
                            <li class="cat-item cat-item-5"><a href="#">Around the World</a></li>
                            <li class="cat-item cat-item-6"><a href="#">Ad Choices</a></li>
                            <li class="cat-item cat-item-7"><a href="#">Mental Health</a></li>
                            <li class="cat-item cat-item-2"><a href="#">Media Relations</a></li>
                        </ul>
                        <nav>
                            <ul class="main-menu d-none d-lg-inline">
                                <li>
                                    <a href="/">
                                        <span class="mr-15"><ion-icon name="home-outline"></ion-icon></span>
                                        Home
                                    </a>
                                </li>
                                <li class="mega-menu-item">
                                    <a href="#">
                                                <span class="mr-15">
                                                    <ion-icon name="desktop-outline"></ion-icon>
                                                </span>Layouts
                                    </a>
                                    <div class="sub-mega-menu sub-menu-list row text-muted font-small">
                                        <ul class="col-md-2">
                                            <li><strong>Archive layout</strong></li>
                                            <li><a href="category.html">Category list</a></li>
                                            <li><a href="category-grid.html">Category grid</a></li>
                                            <li><a href="category-big.html">Category big</a></li>
                                            <li><a href="category-metro.html">Category metro</a></li>
                                        </ul>
                                        <ul class="col-md-2">
                                            <li><strong>Post format</strong></li>
                                            <li><a href="single.html">Post standard</a></li>
                                            <li><a href="single-video.html">Post video</a></li>
                                            <li><a href="single-gallery.html">Post gallery</a></li>
                                            <li><a href="single-audio.html">Post audio</a></li>
                                            <li><a href="single-image.html">Post image</a></li>
                                            <li><a href="single-full.html">Post full width</a></li>
                                        </ul>
                                        <ul class="col-md-2">
                                            <li><strong>Pages</strong></li>
                                            <li><a href="typography.html">Typography</a></li>
                                            <li><a href="about.html">About us</a></li>
                                            <li><a href="contact.html">Contact us</a></li>
                                            <li><a href="search.html">Search</a></li>
                                            <li><a href="author.html">Author</a></li>
                                            <li><a href="404.html">404 page</a></li>
                                        </ul>
                                        <div class="col-md-6 text-right">
                                            <a href="#"><img class="border-radius-10" src="{{ staticAsset("frontend/assets/imgs/ads-2.jpg") }}" alt=""></a>
                                        </div>
                                    </div>
                                </li>
                                <li class="mega-menu-item">
                                    <a href="category.html"><span class="mr-15">
                                                    <ion-icon name="megaphone-outline"></ion-icon>
                                                </span>Mega</a>
                                    <div class="sub-mega-menu">
                                        <div class="nav flex-column nav-pills" role="tablist">
                                            <a class="nav-link active" data-toggle="pill" href="#news-0" role="tab">All</a>
                                            <a class="nav-link" data-toggle="pill" href="#news-1" role="tab">Entertaiment</a>
                                            <a class="nav-link" data-toggle="pill" href="#news-2" role="tab">Fashion</a>
                                            <a class="nav-link" data-toggle="pill" href="#news-3" role="tab">Life Style</a>
                                        </div>
                                        <div class="tab-content">
                                            <div class="tab-pane show active" id="news-0" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-1.jpg") }}" alt="">
                                                            </a>
                                                            <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not actors </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-2.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think twice</h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-3.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight, Bonanza </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-8.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of matches </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news-1" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-5.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not actors </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-6.jpg") }}" alt="">
                                                            </a>
                                                            <span class="top-right-icon background3">
                                                                        <i class="mdi mdi-videocam"></i>
                                                                    </span>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think twice</h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-7.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight, Bonanza </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-8.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of matches </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news-2" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-9.jpg") }}" alt="">
                                                            </a>
                                                            <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not actors </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-10.jpg") }}" alt="">
                                                            </a>
                                                            <span class="top-right-icon background8">
                                                                        <i class="mdi mdi-favorite"></i>
                                                                    </span>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think twice</h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-11.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight, Bonanza </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-12.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of matches </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="news-3" role="tabpanel">
                                                <div class="row">
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-13.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">The litigants on the screen are not actors </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-14.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">Not a bit of hesitation, you better think twice</h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-15.jpg") }}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">We got a right to pick a little fight, Bonanza </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-3 post-module-1">
                                                        <div class="post-thumb d-flex border-radius-5 img-hover-scale mb-15">
                                                            <a href="single.html">
                                                                <img src="{{ staticAsset("frontend/assets/imgs/news-16.jpg") }}" alt="">
                                                            </a>
                                                            <span class="top-right-icon background2">
                                                                        <i class="mdi mdi-audiotrack"></i>
                                                                    </span>
                                                        </div>
                                                        <div class="post-content media-body">
                                                            <h6 class="post-title mb-10 text-limit-2-row">My entrance exam was on a book of matches </h6>
                                                            <div class="entry-meta meta-1 font-x-small color-grey mt-10">
                                                                <span class="post-on">25 April</span>
                                                                <span class="hit-count has-dot">126k Views</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="category-metro.html"><span class="mr-15">
                                                    <ion-icon name="film-outline"></ion-icon>
                                                </span>Video</a></li>
                                <li><a href="contact.html"><span class="mr-15">
                                                    <ion-icon name="mail-unread-outline"></ion-icon>
                                                </span>Contact</a></li>
                            </ul>
                            <div class="d-inline ml-50 tools-icon">
                                <a class="red-tooltip text-danger" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hot Topics">
                                    <ion-icon name="flame-outline"></ion-icon>
                                </a>
                                <a class="red-tooltip text-primary" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Trending">
                                    <ion-icon name="flash-outline"></ion-icon>
                                </a>
                                <a class="red-tooltip text-success" href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Notifications">
                                    <ion-icon name="notifications-outline"></ion-icon>
                                    <span class="notification bg-success">5</span>
                                </a>
                            </div>
                        </nav>
                    </div>
                    <!-- Search -->
                    <form action="#" method="get" class="search-form d-lg-inline float-right position-relative mr-30 d-none">
                        <input type="text" class="search_field" placeholder="Search" value="" name="s">
                        <span class="search-icon"><i class="ti-search mr-5"></i></span>
                    </form>
                    <!-- Off canvas -->
                    <div class="off-canvas-toggle-cover">
                        <div class="off-canvas-toggle hidden d-inline-block ml-15" id="off-canvas-toggle">
                            <ion-icon name="grid-outline"></ion-icon>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Wrap Start -->
