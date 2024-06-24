<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>SIM-APK Landing Page</title>
        <meta name="description" content="Invictus is a beautiful Bootstrap 4 template for startups to build a strong online presence." />

        <!--Google fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900">

        <!--vendors styles-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        {{-- Buat Font-Awesone --}}
        <script src="https://kit.fontawesome.com/d931a8b882.js" crossorigin="anonymous"></script>
        <!-- Bootstrap CSS / Color Scheme -->
        <link rel="stylesheet" href="{{asset("css/default.css")}}" id="theme-color">
        <link rel="shortcut icon" href="{{asset("img/sim-apk-logo.png")}}" type="image/x-icon">
    </head>
    <body>

        <!--navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-transparent fixed-top sticky-parallex">
            <a class="navbar-brand" href="{{ '/'}}">
                <img src="{{asset("img/sim-apk-logo.png")}}" alt="" width="5%" height="5%"> SIM-APK
            </a>
            <button class="navbar-toggler navbar-toggler-right text-white" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span data-feather="grid"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#home">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#tour">Tour</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#faq">FAQ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link page-scroll" href="#contact">Contact</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0">
                    <button data-toggle="modal" data-target="#loginModal" type="button"
                            class="btn btn-secondary my-2 my-sm-0 btn-signup">Login</button>
                </form>
            </div>
        </nav>

        <!--hero header-->
        <section class="bg-hero py-7 py-lg-0" id="home" style="background-image: url(img/back.png)">
            <div class="container">
                <div class="row vh-md-100">
                    <div class="col-md-8 mx-auto my-auto text-center">
                        <h1 class="text-white text-capitalize">SIM-APK mempermudah mengatur pesawat</h1>
                        <div class="divider divider-sm mx-auto bg-white"></div>
                        <p class="lead mb-5 text-white">
                            Mulai manajemen pesawat Anda dengan menggunakan SIM - APK
                        </p>
                        <button data-toggle="modal" data-target="#videoModal" class="btn btn-primary btn-lg d-inline-flex flex-row align-items-center">
                            <span data-feather="video" class="mr-2"></span>
                            Watch Video
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- press section -->
        <section class="bg-light py-4">
            <div class="container text-center">
                <div class="row press">
                    <div class="col-12 text-muted small text-uppercase font-weight-bold mb-4">Telah dipakai di berbagai bandara </div>
                    <div class="press-item col-lg-2 col-md-4 col-12"><a href="#"><img class="img-fluid" src=" {{asset("img/press/press-1.png")}}" alt=""></a></div>
                    <div class="press-item col-lg-2 col-md-4 col-12 mt-3"><a href="#"><img class="img-fluid" src="{{asset("img/press/press-2.png")}}" alt=""></a></div>
                    <div class="press-item col-lg-2 col-md-5 col-12"><a href="#"><img class="img-fluid" src="{{asset("img/press/press-3.png")}}" alt=""></a></div>
                    <div class="press-item col-lg-2 col-md-15 col-12 mt-3"><a href="#"><img class="img-fluid" src="{{asset("img/press/press-4.png")}}" alt=""></a></div>
                </div>
            </div>
        </section>

        <!--tour section-->
        <section class="py-7" id="tour">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <h2 class="text-capitalize">Mengapa SIM-APK ? </h2>
                        <div class="divider bg-primary mx-auto"></div>
                        <p class="lead text-muted">
                            SIM-APK telah digunakan sebanyak lebih dari 100 perusahaan
                        </p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 order-2 order-md-1 my-auto">
                        <h4>Apa itu SIM-APK ? </h4>
                        <p class="mb-0">SIM-APK (Sistem Informasi Manajemen Pesawat Komersial) adalah sistem informasi yang bergerak dibidang bisnis armada. SIM APK adalah sistem informasi yang dirancang untuk memudahkan kegiatan pengelolaan pesawat. </p>
                    </div>
                    <di class="col-md-6 order-1 order-md-2 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner text-primary">
                                <i class="fa-solid fa-plane-up" style="font-size : 100px"></i>
                            </div>
                        </div>
                    </di>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 order-2 my-auto">
                        <h4>Fitur-Fitur SIM-APK</h4>
                        <p class="mb-0">
                        <ul class="mt-2">
                            <li class="mt-3">Mengelola Pesawat Bandara</li>
                            <li class="mt-3">Mengelola Pengguna Sistem Informasi</li>
                            <li class="mt-3">Mengelola Pesawat Bandara</li>
                        </ul>

                        dan masih banyak lagi...
                        </p>
                    </div>
                    <di class="col-md-6 order-1 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner text-info">
                                <span data-feather="bell" width="80" height="80"></span>
                            </div>
                        </div>
                    </di>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 order-2 order-md-1 my-auto">
                        <h4>Mempermudah Manajemen Pesawat</h4>
                        <p class="mb-0">Dapat meningkatkan efesiensi dalam pengelolaan pesawat</p>
                    </div>
                    <di class="col-md-6 order-1 order-md-2 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner text-success">
                                <span data-feather="activity" width="80" height="80"></span>
                            </div>
                        </div>
                    </di>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 order-2 my-auto">
                        <h4>Sistem terintergrasi dengan Database</h4>
                        <p class="mb-0">Sistem yang terintergrasi dengan database dapat memudahkan sistem informasi untuk menyimpan data-data pesawat yang krusial tanpa menggunakan kertas</p>
                    </div>
                    <di class="col-md-6 order-1 text-center">
                        <div class="icon-box">
                            <div class="icon-box-inner text-danger">
                                <span data-feather="database" width="80" height="80"></span>
                            </div>
                        </div>
                    </di>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 mx-auto text-center">
                        <button class="btn btn-dark" data-toggle="modal" data-target="#videoModal">
                            Learn How It Works
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!--call to action-->
        <section class="bg-hero py-6" style="background-image: url(img/Tech.jpeg)">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 bg-transparent-alt">
                        <h2 class="text-white">Create your account now and start growing your business!</h2>
                        <div class="divider bg-white"></div>
                        <p class="lead mb-5 text-white">
                            Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore.
                            Laceaque quiae sitiorem rest non restibusaes maio es dem tumquam explabo.
                        </p>
                        <a href="#" class="btn btn-primary d-inline-flex flex-row align-items-center">
                            <span data-feather="plus" class="mr-2"></span>
                            Get Started Now
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- <!--pricing-->
        <section class="py-7" id="pricing">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <h2 class="text-capitalize">Our pricing.</h2>
                        <div class="divider bg-primary mx-auto"></div>
                        <p class="lead text-muted">
                            Donec lacus enim, ullamcorper nec lectus id, ornare finibus nunc.
                        </p>
                    </div>
                </div>
                <div class="row d-md-flex mt-4 text-center">
                    <div class="col-md-4 mt-2">
                        <div class="card card-pricing">
                            <div class="card-body">
                                <div class="icon-box">
                                    <div class="icon-box-inner small text-primary">
                                        <span data-feather="box" width="40" height="40"></span>
                                    </div>
                                </div>
                                <h3 class="card-title text-primary pt-4">$9 <span class="text-muted small">/ mo</span></h3>
                                <h5 class="card-title pt-3">Pro</h5>
                                <ul class="list-unstyled pricing-list">
                                    <li>1 user</li>
                                    <li>10 GB storage</li>
                                    <li>Email support</li>
                                    <li>Lifetime updates</li>
                                </ul>
                                <a href="#" class="btn btn-primary">
                                    Start 14 day free trial
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="card card-pricing">
                            <div class="card-body">
                                <div class="icon-box bg-primary">
                                    <div class="icon-box-inner small text-white">
                                        <span data-feather="droplet" width="40" height="40"></span>
                                    </div>
                                </div>
                                <h3 class="card-title text-primary pt-4">$15 <span class="text-muted small">/ mo</span></h3>
                                <h5 class="card-title pt-3">Plus</h5>
                                <ul class="list-unstyled pricing-list">
                                    <li>10 users</li>
                                    <li>30 GB storage</li>
                                    <li>Priority email support</li>
                                    <li>Lifetime updates</li>
                                </ul>
                                <a href="#" class="btn btn-primary">
                                    Start 14 day free trial
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-2">
                        <div class="card card-pricing">
                            <div class="card-body">
                                <div class="icon-box">
                                    <div class="icon-box-inner small text-primary">
                                        <span data-feather="star" width="40" height="40"></span>
                                    </div>
                                </div>
                                <h3 class="card-title text-primary pt-4">$29 <span class="text-muted small">/ mo</span></h3>
                                <h5 class="card-title pt-3">Premium</h5>
                                <ul class="list-unstyled pricing-list">
                                    <li>Unlimited users</li>
                                    <li>Unlimited storage</li>
                                    <li>24/7 support</li>
                                    <li>Lifetime updates</li>
                                </ul>
                                <a href="#" class="btn btn-primary">
                                    Start 14 day free trial
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
        </section> --}}

        <!--faq-->
        <section class="bg-light py-6" id="faq">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto text-center">
                        <h2 class="text-capitalize">Frequently Asked Questions</h2>
                        <div class="divider bg-dark mx-auto"></div>
                        <p class="lead text-muted">
                            Everything you need to know about Invictus.
                        </p>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-10 mx-auto">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <h6>Lorem ipsum dolor sit amet?</h6>
                                <p class="text-muted">
                                    Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem
                                    rest non restibusaes maio es dem tumquam explabo.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Lorem sit andigen daepeditem amet?</h6>
                                <p class="text-muted">
                                    Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem
                                    rest non restibusaes maio es dem tumquam explabo.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Lorem ipsum dolor sit andigen daepeditem amet?</h6>
                                <p class="text-muted">
                                    Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem
                                    rest non restibusaes maio es dem tumquam explabo.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Lorem sit andigen daepeditem amet dem tumquam explabo?</h6>
                                <p class="text-muted">
                                    Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem
                                    rest non restibusaes maio es dem tumquam explabo.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Lorem sit andigen daepeditem amet?</h6>
                                <p class="text-muted">
                                    Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem
                                    rest non restibusaes maio es dem tumquam explabo.
                                </p>
                            </div>
                            <div class="col-md-6 mb-4">
                                <h6>Lorem sit daepeditem amet?</h6>
                                <p class="text-muted">
                                    Magnis modipsae que voloratati andigen daepeditem quiate conecus aut labore. Laceaque quiae sitiorem
                                    rest non restibusaes maio es dem tumquam explabo.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 mx-auto text-center">
                        <p class="text-muted"><b>More questions?</b></p>
                        <a href="#" class="btn btn-dark">
                            Let's Talk
                        </a>
                    </div>
                </div>
            </div>
        </section>

        {{-- <!--sign up section-->
        <section class="py-7">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 mx-auto text-center">
                        <h3>Ready to launch your awesome marketing campaign?</h3>
                        <div class="divider bg-primary mx-auto"></div>
                        <p class="text-muted">
                            Sign up now and try Invictus for 2 weeks. No credit card is required.
                        </p>
                        <div class="input-group input-group-lg mt-5">
                            <input type="text" class="form-control" placeholder="Email address">
                            <input type="password" class="form-control" placeholder="Password">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!--footer-->
        <footer class="py-6 bg-dark text-white" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>About SIM-APK</h5>
                        <p class="text-muted mt-4">
                            Nam liber tempor cum soluta nobis eleifend they option congue is nihil imper per
                            tem por legere is me velit doming vulputate.They option congue is nihil imper.
                        </p>
                        <ul class="list-inline social social-sm mt-4">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-google-plus"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 ml-auto">
                        <h5>Useful Links</h5>
                        <ul class="list-unstyled mt-4">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">My Account</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 text-center">
                        <p class="text-white">
                            <span data-feather="message-circle" width="40" height="40"></span>
                        </p>
                        <h5 class="text-capitalize">Need Help?</h5>
                        <p class="text-muted mt-4">
                            Send us an email at <a href="#">support@example.com</a> if you have any qustions. We'll help you out.
                        </p>
                    </div>
                </div>
                <hr class="my-5"/>
                <div class="row">
                    <div class="col-12 text-muted text-center">
                        &copy; 2024 SIM-APK - All Rights Reserved
                    </div>
                </div>
            </div>
        </footer>

        <!--scroll to top-->
        <div class="scroll-top">
            <i class="fa fa-angle-up" aria-hidden="true"></i>
        </div>


        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>
        <script defer="" src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.5.0/feather.min.js"></script>
        <script src=" {{asset("js/scripts.js")}}"></script>

        <!--Modals-->
        <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="videoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header py-2">
                        <h4 class="modal-title text-center w-100" id="videoModalLabel">How it works</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body p-2">
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item allowfullscreen" src="https://www.youtube.com/embed/MGsalg2f9js?rel=0&amp;controls=0&amp;showinfo=0"
                                    allowfullscreen="" frameborder="0" height="415" width="100%"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--login modal-->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center w-100" id="loginModalLabel">Log in to your account</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if(session()->has('loginError'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('loginError') }}
                        </div>
                        @endif
                        <form action="/login" method="POST" >
                            @csrf
                            <div class="form-group">
                                <label for="email">Username</label>
                                <input type="text" class="form-control @error('username')  is-invalid @enderror" name="username" id="email" placeholder="Username" required value="{{ old('username')}}">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!--forget password modal-->
        <div class="modal fade" id="forgetPasswordModal" tabindex="-1" role="dialog" aria-labelledby="forgetPasswordModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center w-100" id="forgetPasswordModalLabel">Forget your password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Please enter your email address below and we'll email you a link to a page where you can easily create a new password.</p>
                        <form>
                            <div class="form-group">
                                <input type="email" class="form-control" id="r-email" placeholder="Email address">
                            </div>
                            <br/>
                            <button type="submit" class="btn btn-primary btn-block">Send Intructions</button>
                        </form>
                    </div>
                    <div class="modal-footer bg-light small">
                        I want to return to &nbsp;
                        <a onclick="$('#forgetPasswordModal').modal('toggle')" data-toggle="modal" href="#loginModal">log in</a>.
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
