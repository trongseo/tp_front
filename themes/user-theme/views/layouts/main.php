
<!DOCTYPE html>
<!--[if IE 8]>			<html class="ie ie8"> <![endif]-->
<!--[if IE 9]>			<html class="ie ie9"> <![endif]-->
<!--[if gt IE 9]><!-->	<html><!--<![endif]-->

<!-- Specific Page Data -->
<!-- End of Data -->

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">
<head>

    <meta charset="utf-8" />
    <title><?php echo isset($this->pageTitle) ? $this->pageTitle : Yii::app()->name; ?></title>
    <meta name="keywords" content=" " />
    <meta name="description" content=" ">
    <meta name="author" content=" ">
    <!-- Javascript =============================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="themes/user-theme/js/jquery.js"></script>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="themes/user-theme/images/favicon.png">


    <!-- CSS -->

    <!-- Bootstrap & FontAwesome & Entypo CSS -->
    <link href="themes/user-theme/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="themes/user-theme/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <link rel="stylesheet" href="themes/user-theme/css/default/default.css" type="text/css" media="screen" />

    <link rel="stylesheet" href="themes/user-theme/css/nivo-slider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/user-theme/css/owl.carousel.css" type="text/css" media="screen" />

    <link href="themes/user-theme/css/theme.css" rel="stylesheet" type="text/css">

    <script src="themes/jquery.min.js"></script>

    <!-- Head SCRIPTS -->
    <script type="text/javascript" src="themes/user-theme/js/modernizr.js"></script>
    <script type="text/javascript" src="themes/user-theme/js/mobile-detect.min.js"></script>
    <script type="text/javascript" src="themes/user-theme/js/mobile-detect-modernizr.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script type="text/javascript" src="themes/user-theme/js/html5shiv.js"></script>
    <script type="text/javascript" src="themes/user-theme/js/respond.min.js"></script>

    <![endif]-->
    <style>

    </style>
<script>
    var CUR_URL='';
</script>
</head><body id=" " class="sub-page" >
<div class="vd_body">
    <!-- Header Start -->
    <header class="header" id="header">
        <div class="container">

            <div class="row">
                <div class="col-md-12 menu-top">
                    <a class="home" href="index.php?r=first"></a>
                    <nav class="navbar navbar-new mobile-menu">
                        <a class="dropdown-link">Menu</a>
                        <ul class="nav navbar-nav mobile-dropdown" style="display: block">
                            <li class="intro" >
                                <a href="index.php?r=front/intro"><span class="underline">Giới Thiệu</span></a>
                            </li>
                            <li class="sanpham" >
                                <a href="index.php?r=front/sanpham"  class="menu-name" ><span class="underline">Sản Phẩm</span></a>
                            </li>
                            <li class="support" >
                                <a href="index.php?r=front/support"><span class="underline">Hỗ Trợ Kỹ Thuật</span></a>
                            </li>
                            <li class="contact">
                                <a href="index.php?r=front/contact"><span class="underline">Liên Hệ</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Ends -->

    <div class="content">
        <div class="container">
            <?php echo $content ?><!-- /.content -->
        </div>
        <!-- .container -->
    </div>
    <!-- .content -->

    <!-- Footer Start -->
    <footer class="footer"  id="footer">
        <div align="center"><img border="0" src="http://cc.amazingcounters.com/counter.php?i=3188478&c=9565747"></a></div>
        <p class="text-center param-underbanner">Copyright@2015 <a href="http://kinhtanphuc.com" ><span class="underline">kinhtanphuc</span></a></p>
    </footer>
    <!-- Footer END -->

</div>



<!--[if lt IE 9]>
<script type="text/javascript" src="themes/user-theme/js/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="themes/user-theme/js/bootstrap.min.js"></script>

<script type="text/javascript" src="themes/user-theme/js/jquery.nivo.slider.js"></script>
<script src="themes/user-theme/js/jquery.bxslider.min.js"></script>
<link href="themes/user-theme/css/jquery.bxslider.css" rel="stylesheet" />
<script type="text/javascript" src="themes/user-theme/js/theme.js"></script>
<script type="text/javascript" src="themes/user-theme/js/owl.carousel.js"></script>
<script>
    var classac = '<?php echo $this->activemenu ?>';
    $('.'+classac).addClass('active');
    if(classac=='sanpham'){
        $('.'+classac +'> .menu-name').attr("href","javascript:void(0);");
    }

</script>
</body>
</html>
