<?php
include '../database/config.php';
//Update services
if (isset($_POST['edit_employee'])) {
        $id = $_GET['id'];
        $emp_fname = $_POST['emp_fname'];
        $emp_lname = $_POST['emp_lname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $emp_email = $_POST['emp_email'];
        $designation = $_POST['designation'];
    $query = "UPDATE employees SET employee_fname='$emp_fname', employee_lname='$emp_lname', phone='$phone', employee_address='$address', employee_email='$emp_email', designation='$designation'
            WHERE id='$id'";
    
    $edit_service = mysqli_query($mysqli, $query);
    
    if(!$edit_service) {
        die("Query Failed" . mysqli_error($mysqli));
    }
    echo "<script type='text/javascript'>
		alert('Employee record is successfully updated.');
		window.open('employees.php','_self');
		</script>";
    
    }
    
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
                    <div class="col-md-8">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>Edit Employee</span>
                            </strong>
                            </div>
                            <div class="panel-body">
                            <div class="col-md-12">
                            <form method="post" action="" class="clearfix" enctype="multipart/form-data">
                            <?php

                                            include '../database/config.php';
                                            $i=0;
                                            $services = array();
                                            $id = $_GET['id'];
                                            $result = $mysqli->query("SELECT * FROM employees WHERE id='$id'");
                                            if($result === FALSE){
                                                die(mysql_error());
                                            }

                                            if($result){

                                                while($obj = $result->fetch_object()) {
                                        ?>
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="emp_fname" value="<?php echo $obj->employee_fname;?>">
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="emp_lname" value="<?php echo $obj->employee_lname;?>">
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="phone" value="<?php echo $obj->phone;?>">
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="address" value="<?php echo $obj->employee_address;?>">
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="emp_email" value="<?php echo $obj->employee_email;?>">
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="designation" value="<?php echo $obj->designation;?>">
                                </div>
                                <br />

                                <?php
                                    }
                                }
                                ?>
                                <button type="submit" name="edit_employee" class="btn btn-primary" style="float:right">Update employee</button>
                            </form>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>

                </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
<?php include 'footer.php'; ?>