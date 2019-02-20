<?php
include '../database/config.php';
//Insert services
if (isset($_POST['add_employee'])) {
    
        $employee_fname = $_POST['employee_fname'];
        $employee_lname = $_POST['employee_lname'];
        $phone = $_POST['phone'];
        $employee_address = $_POST['employee_address'];
        $employee_email = $_POST['employee_email'];
        $designation = $_POST['designation'];
        $sid = $_POST['sid'];
    
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
    
        move_uploaded_file($tmp_image, "../home/images/$image");
        if ($image == "") {
          $image = "user_default.jpg";
        }
    
    $query = "INSERT INTO employees (employee_fname, employee_lname, phone, employee_address, employee_email, designation, image, sid) 
    VALUES('$employee_fname', '$employee_lname', '$phone', '$employee_address', '$employee_email', '$designation', '$image', '$sid') ";
    
    $add_employee = mysqli_query($mysqli, $query);
    
    if(!$add_employee) {
        die("Query Failed" . mysqli_error($mysqli));
    }
    
        echo "<script>alert('Employee added successfully'); window.location.href = 'employees.php'</script>"; 
    
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
                                <span>Add New Employee</span>
                            </strong>
                            </div>
                            <br >
                            <div class="panel-body">
                            <div class="col-md-12">
                            <form method="post" action="" class="clearfix" enctype="multipart/form-data">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="employee_fname" placeholder="First Name">
                                  </div>
                                 </div>
                                <br />
                                <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="employee_lname" placeholder="Last Name">
                                 </div>
                                 </div>
                                </div>
                                <br />
                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="phone" placeholder="Phone">
                                  </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="employee_address" placeholder="Address">
                                  </div>
                                 </div>
                                </div>
                            </div>          
                            <div class="row">
                                    <div class="col-md-6">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="employee_email" placeholder="Email">
                                  </div>
                                 </div>
                                <br />
                                <div class="col-md-6">
                                <select class="form-control" name="designation">
                                        <option>Select Designation</option>
										<option>Make Up Artist</option>
										<option>Hair Stylist</option>
									</select>
                                 </div>
                                <br> <br>       
                                
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="sid">
                                        <option value="">Select Service Package</option>
                                        <?php

                                            include '../database/config.php';
                                            $i=0;
                                            $services = array();

                                            $result = $mysqli->query('SELECT * FROM services');
                                            if($result === FALSE){
                                                die(mysql_error());
                                            }

                                            if($result){

                                                while($obj = $result->fetch_object()) {
                                        ?>
                                        <option value="<?php echo $obj->id; ?>">
                                            <?php echo $obj->service_name; ?></option>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="file" name="image" >
                                        </div>
                                    </div>
                                </div>
                                <br />                     
                                <button type="submit" name="add_employee" class="btn btn-danger" style="float:right">Add service</button>
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