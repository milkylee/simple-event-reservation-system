<?php include 'header.php'; ?>
        <!-- PAGE CONTENT-->
        <div class="page-content--bgf7">
            <!-- BREADCRUMB-->
            <section class="au-breadcrumb2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="au-breadcrumb-content">
                                <div class="au-breadcrumb-left">
                                    <span class="au-breadcrumb-span">You are here:</span>
                                    <ul class="list-unstyled list-inline au-breadcrumb__list">
                                        <li class="list-inline-item active">
                                            <a href="#">Home</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Dashboard</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END BREADCRUMB-->

            <!-- WELCOME-->
            <section class="welcome p-t-10">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="title-4">Welcome back
                                <span><?php echo $_SESSION['type'];?></span>
                            </h1>
                            <hr class="line-seprate">
                        </div>
                    </div>
                </div>
            </section>
            <!-- END WELCOME-->

            <!-- STATISTIC-->
            <section class="statistic statistic2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--green">
                                <h2 class="number"><?php
                                    include '../database/config.php';
                                    
                                    if ($result = mysqli_query($mysqli, "SELECT id FROM users")) {

                                        /* determine number of rows result set */
                                        $row_cnt = mysqli_num_rows($result);

                                        echo $row_cnt;
                                    }?></h2>
                                <span class="desc">Users</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--orange">
                                <h2 class="number"><?php
                                    include '../database/config.php';
                                    
                                    if ($result = mysqli_query($mysqli, "SELECT id FROM packages")) {

                                        /* determine number of rows result set */
                                        $row_cnt = mysqli_num_rows($result);

                                        echo $row_cnt;
                                    }?></h2>
                                <span class="desc">Packages</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--blue">
                                <h2 class="number"><?php
                                    include '../database/config.php';
                                    
                                    if ($result = mysqli_query($mysqli, "SELECT id FROM services")) {

                                        /* determine number of rows result set */
                                        $row_cnt = mysqli_num_rows($result);

                                        echo $row_cnt;
                                    }?></h2>
                                <span class="desc">Services</span>
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="statistic__item statistic__item--red">
                                <h2 class="number">Php <?php
                                    include '../database/config.php';
                                    
                                    $result = $mysqli->query("SELECT SUM(total) AS totalPrice FROM orders WHERE served=1");
                                    if($result){
                                        while($obj = $result->fetch_object()) {
                                      

                                        echo number_format($obj->totalPrice, 2);
                                    }
                                }?></h2>
                                <span class="desc">total earnings</span>
                                <div class="icon">
                                    <i>P</i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- END STATISTIC-->


            <!-- CALENDAR-->
                    <section class="statistic statistic2">
                        <div class="container">
                                <div class="card">
                                    <div class="card-header">
                                        <h3><strong class="card-title">Events Calendar</strong></h3>
                                            <small>
                                                <span class="badge badge-success float-right mt-1">New Event Added</span>
                                            </small>
                                        </strong>
                                    </div>
                                    <div class="card-body">
                                     <?php

                                        include '../database/config.php';
                                        $i=0;
                                        $services = array();
                                        $id = $_GET['id'];
                                        $result = $mysqli->query("SELECT orders.id as id,
                                                                         orders.service_id as service_id,
                                                                         orders.date as date,
                                                                         orders.start_time as start_time,
                                                                         orders.end_time as end_time,
                                                                         orders.fname as fname,
                                                                         orders.lname as lname,
                                                                         orders.validated as validated,
                                                                         orders.booked as booked,
                                                                         services.id as serv_id,
                                                                         services.service_name as service_name
                                                                     FROM orders
                                                                  INNER JOIN services
                                                                     ON orders.service_id = services.id
                                                                  WHERE orders.validated = 1
                                                                  ORDER BY date DESC");
                                        if($result === FALSE){
                                            die(mysql_error());
                                        }

                                        if($result){

                                            while($obj = $result->fetch_object()) {
                                                $strArray = explode('/',$obj->date);
                                                $date = $strArray[0];
                                                $date2 = $strArray[2];
                                        ?>
                                    <div class="row row-striped">
                                            <div class="col-2 text-right">
                                                <h1 class="display-4"><span class="badge badge-secondary" style="background-color:#f58aad"><?php echo $date;?></span></h1>
                                                <h2>OCT</h2>
                                            </div>
                                            <div class="col-10">
                                                <h3 class="text-uppercase"><strong><?php echo $obj->service_name; ?></strong></h3>
                                                <ul class="list-inline">
                                                    <li class="list-inline-item"><i class="fa fa-calendar-o" aria-hidden="true"></i><?php echo $date2;?></li>
                                                    <li class="list-inline-item"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $obj->start_time; ?> - <?php echo $obj->end_time; ?></li>
                                                </ul>
                                                <p><strong>Client Name:</strong> <?php echo $obj->fname.' '.$obj->lname;?></p>
                                                <small>
                                                <?php if(($obj->validated == 1) && ($obj->booked != NULL)){?>
                                                <a href="transactions.php"><span class="badge badge-danger float-left mt-1">Confirm Booking</span></a>
                                                <?php } else {?>
                                                <a href="transactions.php"><span class="badge badge-warning float-left mt-1">Booked</span></a>
                                                <?php } ?>
                                            </small>
                                            </div>
                                        </div>  
                                      <hr>
                                      <?php
                                            }
                                        }
                                      ?>
                                    </div>
                                </div>
                            </div>
                        </section>
            <!-- END STATISTIC-->
           
<?php include 'footer.php'; ?>