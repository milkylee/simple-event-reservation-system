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
                                        <li class="list-inline-item">Employees</li>
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
                        <div class="pull-right">
                        <a href="add_employees.php" class="btn btn-primary">Add Employee</a>
                        </div>
                        </div>
                        <br />
                        <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" style="width: 50px;">#</th>
                                <th> Photo</th>
                                <th> Employee Name </th>
                                <th class="text-center" style="width: 10%;"> Phone </th>
                                <th class="text-center" style="width: 10%;"> Address </th>
                                <th class="text-center" style="width: 10%;"> Email </th>
                                <th class="text-center" style="width: 10%;"> Designation  </th>
                                <th class="text-center" style="width: 100px;"> Actions </th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                                            include '../database/config.php';
                                            $i=0;
                                            $services = array();

                                            $result = $mysqli->query('SELECT * FROM employees');
                                            if($result === FALSE){
                                                die(mysql_error());
                                            }

                                            if($result){

                                                while($obj = $result->fetch_object()) {
                                        ?>
                            <tr>
                                <td class="text-center"><?php echo $obj->id;?></td>
                                <td>
                                <?php if($obj->service_img_name === '0'): ?>
                                    <img class="img-avatar img-circle" src="../home/images/no_image.jpg" alt="">
                                <?php else: ?>
                                <img class="img-avatar img-circle" src="../home/images/<?php echo $obj->image; ?>" alt="">
                                <?php endif; ?>
                                </td>
                                <td> <?php echo $obj->employee_fname.' '.$obj->employee_lname; ?></td>
                                <td class="text-center"> <?php echo $obj->phone; ?></td>
                                <td class="text-center"> <?php echo $obj->employee_address; ?></td>
                                <td class="text-center"> <?php echo $obj->employee_email; ?></td>
                                <td class="text-center"> <?php echo $obj->designation; ?></td>
                                <td class="text-center">
                                <div class="btn-group">
                                    <a href="edit_employee.php?id=<?php echo $obj->id;?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                                    <span class="fa fa-edit"></span>
                                    </a>
                                    <a href="delete_employee.php?id=<?php echo $obj->id;?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                                    <span class="fa fa-trash"></span>
                                    </a>
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