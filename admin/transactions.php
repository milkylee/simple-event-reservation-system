<?php
include '../database/config.php';

?>
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
                                            <a href="#">Dashboard</a>
                                        </li>
                                        <li class="list-inline-item seprate">
                                            <span>/</span>
                                        </li>
                                        <li class="list-inline-item">Orders</li>
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
            <!-- DATA TABLE-->
            <section class="p-t-20">
                <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>
                    <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading clearfix">
                        </div>
                        <br />
                        <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th> Service Name</th>
                                <th> Date Request</th>
                                <th> Start Time</th>
                                <th> End Time</th>
                                <th class="text-center" style="width: 10%;"> Requested By </th>
                                <th class="text-center" style="width: 10%;"> Price </th>
                                <th class="text-center" style="width: 10%;"> Available Employee </th>
                                <th class="text-center" style="width: 10%;"> Designation </th>
                                <th class="text-center" style="width: 10%;"> Booked </th>
                                <th class="text-center" style="width: 10%;"> Served </th>
                                <th class="text-center" style="width: 100px;"> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                            include '../database/config.php';
                                            $i=1;
                                            $services = array();

                                            $result = $mysqli->query('SELECT orders.id as id,
                                                                             orders.service_id as service_id,
                                                                             orders.date as date,
                                                                             orders.start_time as start_time,
                                                                             orders.end_time as end_time,
                                                                             orders.fname as fname,
                                                                             orders.lname as lname,
                                                                             orders.total as total,
                                                                             orders.validated as validated,
                                                                             orders.booked as booked,
                                                                             orders.served,
                                                                             orders.emp_id_makeup as emp_id_makeup,
                                                                             orders.emp_id_hair as emp_id_hair,
                                                                             services.id as serv_id, 
                                                                             services.service_name as service_name,
                                                                             employees.id as emp_id,
                                                                             employees.employee_fname as emp_fname, 
                                                                             employees.employee_lname as emp_lname,
                                                                             employees.designation as designation,
                                                                             employees.sid as sid
                                                                         FROM orders
                                                                        INNER JOIN services
                                                                          ON orders.service_id = services.id
                                                                        INNER JOIN employees
                                                                          ON employees.sid = services.id
                                                                        ORDER BY date DESC');
                                            if($result === FALSE){
                                                die(mysql_error());
                                            }

                                            if($result){

                                                while($obj = $result->fetch_object()) {
                                        ?>
                            <tr>
                                <td class="text-center"><?php echo $i++;?></td>
                                <td><?php echo $obj->service_name;?></td>
                                <td> <?php echo $obj->date; ?></td>
                                <td class="text-center"> <?php echo $obj->start_time; ?></td>
                                <td class="text-center"> <?php echo $obj->end_time; ?></td>
                                <td class="text-center"> <?php echo $obj->fname.' '.$obj->lname; ?></td>
                                <td class="text-center"> <?php echo number_format($obj->total, 2); ?></td>
                                <td class="text-center"> <?php echo  $obj->emp_fname. ' '.$obj->emp_lname;?></td>
                                <td class="text-center"> <?php echo  $obj->designation;?></td>
                                <td class="text-center"> 
                                <?php if($obj->emp_id_makeup == $obj->emp_id){?>
                                    <a href="#" class="btn btn-warning btn-xs"  title="Booked" data-toggle="tooltip"><span>Booked</span></a>
                                <?php } elseif ($obj->emp_id_hair == $obj->emp_id) { ?>
                                    <a href="#" class="btn btn-warning btn-xs"  title="Booked" data-toggle="tooltip"><span>Booked</span></a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-secondary btn-xs"  title="Unbooked" data-toggle="tooltip"><span>Not yet booked</span></a>
                                <?php } ?>
                                </td>
                                <td class="text-center">
                                <?php if($obj->served == 1){?>
                                    <a href="#" class="au-btn au-btn-icon au-btn--green au-btn--small"  title="Served" data-toggle="tooltip"><span>Served</span></a>
                                <?php } else { ?>
                                    <a href="#" class="btn btn-secondary btn-xs"  title="Scheduled" data-toggle="tooltip"><span>Scheduled</span></a>
                                <?php } ?>
                                </td>
                                <td class="text-center">
                                <div class="btn-group">
                                    <?php if(($obj->validated == 1) && ($obj->booked == NULL)){
                                        ?>
                                        <a href="edit_transactions.php?id=<?php echo $obj->id;?>&emp_fname=<?php echo $obj->emp_fname;?>&emp_lname=<?php echo $obj->emp_lname;?>&emp_id=<?php echo $obj->emp_id;?>&designation=<?php echo $obj->designation;?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                                        <span class="fa fa-edit"></span>
                                        </a>
                                        <a href="delete_transactions.php?id=<?php echo $obj->id;?>&emp_id=<?php echo $obj->emp_id;?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                                        <span class="fa fa-trash"></span>
                                        </a>
                                    <?php } elseif(($obj->validated == 1) && ($obj->booked != NULL) && ($obj->emp_id_makeup != 0)){ ?>
                                            <a href="served_transactions.php?id=<?php echo $obj->id;?>&emp_fname=<?php echo $obj->emp_fname;?>&emp_lname=<?php echo $obj->emp_lname;?>&emp_id=<?php echo $obj->emp_id;?>&designation=<?php echo $obj->designation;?>" class="btn btn-primary btn-xs"  title="Mark as Served" data-toggle="tooltip" disabled>
                                        <span class="fa fa-thumbs-up"></span>
                                        </a>
                                        <?php } elseif(($obj->validated == 1) && ($obj->booked != NULL) && ($obj->emp_id_hair != 0)){ ?>
                                            <a href="served_transactions.php?id=<?php echo $obj->id;?>&emp_fname=<?php echo $obj->emp_fname;?>&emp_lname=<?php echo $obj->emp_lname;?>&emp_id=<?php echo $obj->emp_id;?>&designation=<?php echo $obj->designation;?>" class="btn btn-primary btn-xs"  title="Mark as Served" data-toggle="tooltip" disabled>
                                        <span class="fa fa-thumbs-up"></span>
                                        </a>
                                    <?php } else{ ?>
                                        <a href="#" class="btn btn-secondary btn-xs"  title="Account not validated" data-toggle="tooltip" disabled>
                                        <span class="fa fa-lock"></span>
                                        </a>
                                    <?php } ?>
                                </div>
                                </td>
                            </tr>
                                  <?php 
                                        }
                                    }
                                  ?> 
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
<?php include 'footer.php'; ?>