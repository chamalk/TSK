<?php
include_once '../../model/dataAccess/HomeModel.php'
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Home
            <small>TSK Engineers</small>
        </h1>
        <ol class="breadcrumb">
            <li class="active"><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
<!--        <div class="row">-->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box --> -->
<!--                <div class="small-box bg-aqua">-->
<!--                    <div class="inner">-->
<!--                        <!--                        <h3>-->--><?php ////echo "get_student_count()" ?><!--<!--</h3>-->-->
<!--                        <p>On going Orders</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-bag"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div><!-- ./col -->-->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->-->
<!--                <div class="small-box bg-green">-->
<!--                    <div class="inner">-->
<!--                        <!--                        <h3>-->--><?php ////echo "get_courses_count()" ?><!--<!--</h3>-->-->
<!--                        <p>Completed Orders</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-stats-bars"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div><!-- ./col -->-->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->-->
<!--                <div class="small-box bg-yellow">-->
<!--                    <div class="inner">-->
<!--                        <!--                        <h3>-->--><?php ////echo "get_teacher_count()" ?><!--<!--</h3>-->-->
<!--                        <p>Staff</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-person-add"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div><!-- ./col -->-->
<!--            <div class="col-lg-3 col-xs-6">-->
<!--                <!-- small box -->-->
<!--                <div class="small-box bg-red">-->
<!--                    <div class="inner">-->
<!--                        <!--                        <h3>-->--><?php ////echo "get_staff_count()" ?><!--<!--</h3>-->-->
<!--                        <p>Workers</p>-->
<!--                    </div>-->
<!--                    <div class="icon">-->
<!--                        <i class="ion ion-pie-graph"></i>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div><!-- ./col -->-->
<!--        </div><!-- /.row --><br><br>-->
        <div class="col-md-6">
            <div class="box box-solid">
                <div class="box-body">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="../../resources/dist/img/homeSlide_1.jpg" alt="First slide">
                                <div class="carousel-caption">
                                    The safest roller door manufacture in Srilanka....
                                </div>
                            </div>
                            <div class="item">
                                <img src="../../resources/dist/img/homeSlide_2.jpg" alt="Second slide">
                                <div class="carousel-caption">
                                    We provide wide range of roller doors according to your needs.
                                </div>
                            </div>
                            <div class="item">
                                <img
                                    src = "../../resources/dist/img/homeSlide_3.jpg" alt="Third slide">
                                <div class="carousel-caption">
                                    Be with us, safe your future.Enjoy the safety.
                                </div>
                            </div>
                        </div>
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="fa fa-angle-left"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="fa fa-angle-right"></span>
                        </a>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
        <div class="col-md-6">
            <a class="twitter-timeline" href="https://twitter.com/SecureShutter?lang=en" data-widget-id="647392864540864512">#Technical
                Tweets</a>
            <script>!function (d, s, id) {
                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                    if (!d.getElementById(id)) {
                        js = d.createElement(s);
                        js.id = id;
                        js.src = p + "://platform.twitter.com/widgets.js";
                        fjs.parentNode.insertBefore(js, fjs);
                    }
                }(document, "script", "twitter-wjs");</script>
        </div>
    </section>
</div>