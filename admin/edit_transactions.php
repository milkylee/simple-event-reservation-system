<?php
include '../database/config.php';
//Update services
if (isset($_POST['edit_transaction'])) {
    $id = $_GET['id'];
    $designation = $_GET['designation'];
    if($designation === "Make Up Artist"){
        $emp_id = $_GET['emp_id'];
        $query = "UPDATE orders SET booked=1, emp_id_makeup='$emp_id' WHERE id='$id'";
        $edit_transactions = mysqli_query($mysqli, $query);
    
        if(!$edit_transactions) {
            die("Query Failed" . mysqli_error($mysqli));
        }
        
        echo "<script>alert('Transactions updated successfully'); window.location.href = 'transactions.php'</script>"; 

    } elseif($designation === "Hair Stylist"){
        $emp_id = $_GET['emp_id'];
        $query2 = "UPDATE orders SET booked=1, emp_id_hair='$emp_id' WHERE id='$id'";
        $edit_transactions2 = mysqli_query($mysqli, $query2);
    
        if(!$edit_transactions2) {
            die("Query Failed" . mysqli_error($mysqli));
        }
        
        echo "<script>alert('Transactions updated successfully'); window.location.href = 'transactions.php'</script>"; 

    }else{

    }   
    
    
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
                                        <li class="list-inline-item">Packages</li>
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
                                <span>Update Transactions</span>
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
                                            $result = $mysqli->query("SELECT * FROM orders WHERE id='$id'");
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
                                    <input type="text" class="form-control" name="service_id" value="<?php echo $obj->service_id;?>" disabled>
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="service_date" value="<?php echo $obj->date;?>" disabled>
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <label>Start Time</label>
                                    <input type="text" class="form-control" name="start_time" value="<?php echo $obj->start_time;?>" disabled>   
                                     </div>
                                    <div class="col-md-6">
                                    <label>End Time</label>
                                    <input type="text" class="form-control" name="end_time" value="<?php echo $obj->end_time;?>" disabled>   
                                    </div>
                                </div>
                                <br>
                                <label>Requested By</label>
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="name" value="<?php echo $obj->fname.' '.$obj->lname;?>" disabled>
                                </div>
                                <label>Address</label>
                                <div class="form-group">
                                    <div class="input-group">
                                    <span class="input-group-addon">
                                    <i class="fa fa-book"></i>
                                    </span>
                                    <input type="text" class="form-control" name="address" value="<?php echo $obj->address;?>" disabled>
                                </div>
                                <br>
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <label>Assign available employee</label>
                                    <input type="text" class="form-control" name="employee" value="<?php echo $_GET['emp_fname'].' '.$_GET['emp_lname'];?>">   
                                     </div>
                                </div>
                                <br>
                                <?php
                                    }
                                }
                                ?>
                                <button type="submit" name="edit_transaction" class="btn btn-primary" style="float:right">Update Transactions</button>
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