<?php
include '../database/config.php';
//Insert services
if (isset($_POST['add_service'])) {
    
        $employee = $_POST['employee'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        $available = $_POST['available'];
    
    $query = "INSERT INTO employee_schedule (eid, start_time, end_time, available) 
    VALUES('$employee', '$start_time', '$end_time', 1) ";
    
    $add_service = mysqli_query($mysqli, $query);
    
    if(!$add_service) {
        die("Query Failed" . mysqli_error($mysqli));
    }
    
        echo "<script>alert('Schedule added successfully'); window.location.href = 'schedule.php'</script>"; 
    
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
                                        <li class="list-inline-item">Schedule</li>
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
                                <span>Add Schedule</span>
                            </strong>
                            </div>
                            <br>
                            <div class="panel-body">
                            <div class="col-md-12">
                            <form method="post" action="" class="clearfix" enctype="multipart/form-data">
                            <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-6">
                                        <select class="form-control" name="employee">
                                        <option value="">Select Employee</option>
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
                                        <option value="<?php echo $obj->id; ?>">
                                            <?php echo $obj->employee_fname.' '.$obj->employee_lname; ?></option>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                        </select>
                                    </div>                                   
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <select class="form-control" name="start_time">
                                        <option>Select Start Time</option>
										<option>9:00</option>
										<option>9:30</option>
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
                                    </div>               
                                    <div class="col-md-6">
                                    <select class="form-control" name="end_time">
                                        <option>Select End Time</option>
										<option>9:00</option>
										<option>9:30</option>
										<option>10:00</option>
										<option>10:30</option>
										<option>11:00</option>
										<option>11:30</option>
										<option>12:00</option>
										<option>12:30</option>
										<option>13:00</option>
										<option>13:30</option>
										<option>14:00</option>
										<option>14:30</option>
										<option>15:00</option>
										<option>15:30</option>
										<option>16:00</option>
										<option>16:30</option>
										<option>17:00</option>
										<option>17:30</option>
										<option>18:00</option>
									</select>
                                    </div>                             
                                </div>
                                <br>
                            <div class="form-group">
                                
                                </div>
                                <button type="submit" name="add_service" class="btn btn-danger" style="float:right">Add Schedule</button>
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