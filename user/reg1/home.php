<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com -->
    <title>Quản lý điểm hệ đại học</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="PJ/logotmu.jpg" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
    body {
        font: 400 15px Lato, sans-serif;
        line-height: 1.8;
        color: #818181;
    }

    h2 {
        font-size: 24px;
        text-transform: uppercase;
        color: #303030;
        font-weight: 600;
        margin-bottom: 30px;
    }

    h4 {
        font-size: 19px;
        line-height: 1.5em;
        color: #303030;
        font-weight: 400;
        margin-bottom: 30px;
    }

    .jumbotron {
        background-color: #fff;
        color: #fff;
        padding: 10px 25px;
        font-family: Lato, sans-serif;
    }

    .container-fluid {
        padding: 60px 50px;
    }

    .bg-grey {
        background-color: #f6f6f6;
    }

    .logo-small {
        color: #0d6efd;
        font-size: 50px;
    }

    .logo {
        color: #0d6efd;
        font-size: 340px;
    }

    .thumbnail {
        padding: 0 0 15px 0;
        border: none;
        border-radius: 0;
    }

    .thumbnail img {
        width: 100%;
        height: 100%;
        margin-bottom: 10px;
    }

    .carousel-control.right,
    .carousel-control.left {
        background-image: none;
        color: #0d6efd;
    }

    .carousel-indicators li {
        border-color: #0d6efd;
    }

    .carousel-indicators li.active {
        background-color: #0d6efd;
    }

    .item h4 {
        font-size: 19px;
        line-height: 1.5em;
        font-weight: 400;
        font-style: italic;
        margin: 70px 0;
    }

    .item span {
        font-style: normal;
    }

    .panel {
        border: 1px solid pink;
        border-radius: 0 !important;
        transition: box-shadow 0.5s;
    }

    .panel:hover {
        box-shadow: 5px 0px 40px rgba(0, 0, 0, .2);
    }

    .panel-footer .btn:hover {
        border: 1px solid #0d6efd;
        background-color: #fff !important;
        color: #0d6efd;
    }

    .panel-heading {
        color: #fff !important;
        background-color: #0d6efd !important;
        padding: 25px;
        border-bottom: 1px solid transparent;
        border-top-left-radius: 0px;
        border-top-right-radius: 0px;
        border-bottom-left-radius: 0px;
        border-bottom-right-radius: 0px;
    }

    .panel-footer {
        background-color: white !important;
    }

    .panel-footer h3 {
        font-size: 32px;
    }

    .panel-footer h4 {
        color: #aaa;
        font-size: 14px;
    }

    .panel-footer .btn {
        margin: 15px 0;
        background-color: #0d6efd;
        color: #fff;
    }

    .navbar {
        margin-bottom: 0;
        background-color: #aaa;
        z-index: 9999;
        border: 0;
        font-size: 19px !important;
        line-height: 1.42857143 !important;
        letter-spacing: 2px;
        /* Khoảng cách giữa các ký tự */
        border-radius: 0;
        font-family: Lato, sans-serif;
    }

    .navbar li a,
    .navbar .navbar-brand {
        color: #fff !important;
    }

    /*Chỉnh icon home */
    .navbar .fa {
        font-size: 25px !important;
        position: relative;
        bottom: 2px;
    }

    /*Chỉnh màu chữ của thẻ a khi click navbar-nav*/
    .navbar-nav li a:hover,
    .navbar-nav li.active a {
        color: #0d6efd !important;
        background-color: #fff !important;
    }

    .navbar-default .navbar-toggle {
        border-color: transparent;
        color: #fff !important;
    }

    footer .glyphicon {
        font-size: 20px;
        margin-bottom: 20px;
        color: #0d6efd;
    }

    .slideanim {
        visibility: hidden;
    }

    .slide {
        animation-name: slide;
        -webkit-animation-name: slide;
        animation-duration: 1s;
        -webkit-animation-duration: 1s;
        visibility: visible;
    }

    @keyframes slide {
        0% {
            opacity: 0;
            transform: translateY(70%);
        }

        100% {
            opacity: 1;
            transform: translateY(0%);
        }
    }

    @-webkit-keyframes slide {
        0% {
            opacity: 0;
            -webkit-transform: translateY(70%);
        }

        100% {
            opacity: 1;
            -webkit-transform: translateY(0%);
        }
    }

    @media screen and (max-width: 768px) {
        .col-sm-4 {
            text-align: center;
            margin: 25px 0;
        }

        .btn-lg {
            width: 100%;
            margin-bottom: 35px;
        }
    }

    @media screen and (max-width: 480px) {
        .logo {
            font-size: 150px;
        }
    }

    .dropdown-menu {
        background-color: #aaa;
    }

    .container-fluid .jumbotron {
        background-color: pink;
        color: #fff;
        padding: 10px 25px;
        font-family: Lato, sans-serif;
    }

    .header-logo {
        width: 100%;
        padding: 20px;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        background-color: #0d6efd;
    }

    .name h2 {
        color: #fff;
    }

    .name h3 {
        color: #fff;
    }
    </style>
</head>

<header>
    <div class="header-top">
        <div class="ctn">
            <div class="header-top-wrap logo-home">
                <a class="header-logo" href="">
                    <img src="https://tmu.edu.vn/template_dhtm/images/logo-sm.png" width="120px" height="120px" alt=""
                        class="img-fluid logo-head">
                    <div class="name">
                        <h2>Trường đại học Thương Mại</h2>
                        <h3>Thuongmai University</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</header>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
    <nav class="navbar navbar-default navbar-fixed">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="tc.php">
                    <span class="fa fa-home"></span>
                </a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-left">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sinh Viên
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Danh sách Sinh Viên</a></li>
                            <li><a href="#">Danh sach điểm của Sinh Viên</a></li>
                        </ul>
                    </li>
                    <li class="dropdown" readonly>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Giảng Viên
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Danh sách giảng viên</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Môn học
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Danh sách môn học</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Khoa - Đơn vị
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="">Công nghệ thông tin</a></li>
                            <li><a href="">Quản trị kinh doanh</a></li>
                        </ul>
                    </li>
                    <li><a href="#contact">Liên hệ</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="login.php">Log in</a></li>
                    <li><a href="register.php">Sign up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-search"></span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-max-width text-center">
        <form>
            <img src="PJ/hinhanhtmu.png" alt="" width="100%">
        </form>
    </div>

    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>Trường Đại học Thương Mại</h2>
                <p>(tiếng Anh: Thuongmai University, tên viết tắt: TMU) </p>
                <h4>Trường Đại học Thương mại chúng tôi tự hào là trường đại học 5 sao
                    theo đánh giá xếp hạng UPM - hệ thống xếp hạng đối sánh về mức độ
                    xuất sắc của chất lượng giáo dục, đang có hơn 100 cơ sở giáo dục
                    và chương trình đào tạo của 8 quốc gia - Hoa Kỳ , Thái Lan,
                    Philippines, Indonesia, Myanmar, Brunei, Đài Loan và Việt Nam tham gia.
                    Đây là khởi đầu cho giai đoạn Trường Đại học Thương mại tuyên bố, thực
                    hiện tầm nhìn và sứ mạng mới theo định hướng Đổi mới sáng tạo; Hội nhập
                    và Phát triển bền vững trong khu vực châu Á.</p>
                    <br><button class="btn btn-default btn-lg col-lg-3">Liên hệ</button>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-tree-conifer logo"></span>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-grey">
        <div class="jumbotron text-center">
            <h2>TMU - MÔ HÌNH ĐÀO TẠO THEO ĐỊNH HƯỚNG ỨNG DỤNG</h2>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h4><strong>Mô hình đào tạo “active learning”:</strong>
                    Đào tạo chuẩn mô hình đại học công nghệ ứng dụng phục vụ cuộc cách mạng công nghiệp 4.0</h4>
                <h4><strong>Mô hình học đi đôi với hành:</strong>
                    Trên nền tảng cơ sở vật chất hiện đại, sinh viên được đào tạo lý thuyết kết hợp với thực hành
                    ngay tại phòng thì nghiệm, phòng lab, phòng máy xưởng sản xuất,…. được trang bị tối tân</h4><br>
            </div>
            <div class="col-sm-6">
                <h4><strong>Chất lượng giảng dạy tích cực:</strong>
                    Trường Đại học Thương Mại đầu tư đội ngũ giảng viên là giáo sư, tiến sĩ chuyên gia đầu
                    ngành luôn đảm bảo về chất lượng giảng dạy</h4>
                <h4><strong>Đẩy mạnh hợp tác doanh nghiệp:</strong>
                    Nhà trường cũng thiết lập các mối quan hệ thân thiết với các tập đoàn SIEMENS (Đức), ROCK-WELL
                    (mỹ), Golden-Gate,…</h4>
            </div>
        </div>
    </div>

    <div id="services" class="container-fluid text-center">
        <h2>Dịch vụ</h2>
        <h4>Những gì chúng tôi cung cấp</h4>
        <br>
        <div class="row slideanim">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-book logo-small"></span>
                <h4>Đọc sách</h4>
                <p>Sách chuyên ngành,...</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-calendar logo-small"></span>
                <h4>Lịch trình</h4>
                <p>Học tập thoải mái,...</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-lock logo-small"></span>
                <h4>Công việc</h4>
                <p>Được đào tạo bài bản,...</p>
            </div>
        </div>
        <br><br>
        <div class="row slideanim">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-ok logo-small"></span>
                <h4>Tích xanh</h4>
                <p>Được chứng nhân bởi bộ công thương.</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-certificate logo-small"></span>
                <h4>Chứng chỉ</h4>
                <p>Tiếng Anh, ...</p>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-education logo-small"></span>
                <h4 style="color:#303030;">Giáo dục</h4>
                <p>Từ con người đến nghề nghiệp.</p>
            </div>
        </div>
    </div>

    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h2>Danh mục</h2><br>
        <h4>Những phong cảnh đặc sắc của các nước</h4>
        <div class="row text-center slideanim">
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="PJ/Vietnam.jpeg" alt="Việt Nam" width="400" height="300">
                    <p><strong>Việt Nam</strong></p>
                    <p></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="PJ/Indonesia.jpg" alt="Indonesia" width="400" height="300">
                    <p><strong>Indonesia</strong></p>
                    <p></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="PJ/Nga.jpg" alt="Nga" width="400" height="300">
                    <p><strong>Nga</strong></p>
                    <p></p>
                </div>
            </div>
        </div><br>

        <h2>Sinh viên của trường đánh giá như thế nào?</h2>
        <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <h4>"Trường rất đẹp và dụng cụ học tập hiện đại với thời 4.0"<br><span>Đức Trường, Nam Từ Liêm, Hà
                            Nội</span></h4>
                </div>
                <div class="item">
                    <h4>"Đảm bảo đầu ra cho sinh viên tốt,..."<br><span>Xuân Thái, Mỹ Đình 1, Hà Nội</span></h4>
                </div>
                <div class="item">
                    <h4>"Trường câu lạc bộ rất nhiều và đặc biệt là IT với đúng chuyên ngành của các bạn!!"<br>
                        <span>Xuân Hoàng, Hà Nội</span>
                    </h4>
                </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <div id="pricing" class="container-fluid">
        <div class="text-center">
            <h2>Ưu đãi dành riêng cho các bạn!!</h2>
            <h4>Học phí 50%, 75% và 100%</h4>
        </div>
        <div class="row slideanim">
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>50%</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>GPA 3.2 trở lên.</strong></p>
                        <p><strong>Điểm đánh giá loại Giỏi.</strong></p>
                        <p><strong>Học phần phải có điểm từ B trở lên.</strong></p>
                        <p><strong>Chuyên mục đánh giá tốt.</strong></p>
                        <p><strong>Có chứng chỉ TOEIC 450 & IELTS 4.0.</strong></p>
                    </div>
                    <div class="panel-footer">
                        <h3>5.499.999đ</h3>
                        <h4>1 năm học</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>75%</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>GPA 3.5 trở lên.</strong></p>
                        <p><strong>Điểm đánh giá loại Giỏi.</strong></p>
                        <p><strong>Học phần phải có điểm từ B trở lên.</strong></p>
                        <p><strong>Chuyên mục đánh giá tốt.</strong></p>
                        <p><strong>Có chứng chỉ TOEIC 600 & IELTS 6.0.</strong></p>
                    </div>
                    <div class="panel-footer">
                        <h3>3.999.999đ</h3>
                        <h4>1 năm học</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <h1>100%</h1>
                    </div>
                    <div class="panel-body">
                        <p><strong>GPA 3.8 trở lên.</strong></p>
                        <p><strong>Điểm đánh giá loại Giỏi.</strong></p>
                        <p><strong>Học phần phải có điểm từ B+ trở lên.</strong></p>
                        <p><strong>Chuyên mục đánh giá tốt.</strong></p>
                        <p><strong>Có chứng chỉ TOEIC 800 & IELTS 7.0.</strong></p>
                    </div>
                    <div class="panel-footer">
                        <h3>Free 100% Học phí</h3>
                        <h4>1 năm học</h4>
                        <button class="btn btn-lg">Sign Up</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="contact" class="container-fluid bg-grey">
        <h2 class="text-center">Thông tin liên hệ</h2>
        <div class="row">
            <div class="col-sm-5">
                <p>Hãy liên hệ với chúng tôi và chúng tôi sẽ liên hệ lại với bạn trong vòng 24 giờ.</p>
                <p><span class="glyphicon glyphicon-map-marker"></span> Nam Từ Liêm, Hà Nội, Việt Nam</p>
                <p><span class="glyphicon glyphicon-phone"></span> 0243.555.2008</p>
                <p><span class="glyphicon glyphicon-envelope"></span> tuyensinh@tmu.edu.vn</p>
            </div>
            <div class="col-sm-7 slideanim">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comments" name="comments" placeholder="Comment"
                    rows="5"></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Gửi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <img src="PJ/camon.png" class="camon" width="100%" height="10%">

    <footer class="container-fluid text-center">
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Quay lại trang <a href="trangchu.php" title="Quản lý điểm hệ đại học">Home</a></p>
    </footer>

    <script>
    $(document).ready(function() {
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function() {

                    window.location.hash = hash;
                });
            }
        });

        $(window).scroll(function() {
            $(".slideanim").each(function() {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
    </script>

</body>

</html>