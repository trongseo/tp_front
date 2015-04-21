<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="themes/admin-template/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME ICONS STYLES-->

    <link href="themes/admin-template/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM STYLES-->
    <link href="themes/admin-template/css/style.css" rel="stylesheet" />
    <!-- HTML5 Shiv and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="wrapper">
    <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a  class="navbar-brand" href="index.php?r=myadmin/index">Admin

            </a>
        </div>

        <div class="notifications-wrapper">
            <ul class="nav">



                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user-plus"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?r=Changepass/index"><i class="fa fa-user-plus"></i> Đổi mật khẩu</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="index.php?r=login/Signout"><i class="fa fa-sign-out"></i> Thoát</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- /. NAV TOP  -->
    <nav  class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">



                <li>
                    <a   href="index.php?r=myadmin/index"><i class="fa fa-dashboard "></i>Đơn hàng</a>
                </li>
                <li>
                    <a href="ui.html"><i class="fa fa-venus "></i>UI Elements </a>

                </li>

                <li>
                    <a href="table.html"><i class="fa fa-bolt "></i>Data Tables </a>

                </li>


                <li>
                    <a href="forms.html"><i class="fa fa-code "></i>Forms</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#"><i class="fa fa-cogs "></i>Second  Link</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bullhorn "></i>Second Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third  Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Link</a>
                                </li>

                            </ul>

                        </li>
                    </ul>
                </li>
                <li>
                    <a  href="blank.html"><i class="fa fa-dashcube "></i>Blank Page</a>
                </li>

            </ul>
        </div>

    </nav>
    <!-- /. SIDEBAR MENU (navbar-side) -->
    <div id="page-wrapper" class="page-wrapper-cls">
        <div id="page-inner">   <?php echo $content ?>
        </div>
        <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->
<footer >
    &copy; 2015
</footer>
<!-- /. FOOTER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="themes/admin-template/js/jquery-1.11.1.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="themes/admin-template/js/bootstrap.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="themes/admin-template/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="themes/admin-template/js/custom.js"></script>

<script>
    jQuery('#main-menu a').each(function() {
  var curHr =  window.location.href;
        if(curHr.indexOf($(this).attr("href"))>-1){
            $(this).attr("class","active-menu");
        }


    });

</script>
</body>
</html>