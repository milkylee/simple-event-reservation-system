<?php
include '../database/config.php';
//Update services
if (isset($_POST['edit_service'])) {
        $id = $_GET['id'];
        $service_name = $_POST['service_name'];
        $service_desc = $_POST['service_desc'];
        $service_package = $_POST['service_package'];
        $price = $_POST['price'];
    
        $image = $_FILES['image']['name'];
        $tmp_image = $_FILES['image']['tmp_name'];
    
        move_uploaded_file($tmp_image, "../home/images/$image");
        if ($image == "") {
          $image = "user_default.jpg";
        }
    
    $query = "UPDATE services SET service_name='$service_name', service_desc='$service_desc', service_img_name='$image', price='$price', package_id='$service_package'
            WHERE id='$id'";
    
    $edit_service = mysqli_query($mysqli, $query);
    
    if(!$edit_service) {
        die("Query Failed" . mysqli_error($mysqli));
    }
    
    header("Location: services.php");
    
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
                                <span>Add New Product</span>
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
                                            $result = $mysqli->query("SELECT * FROM services WHERE id='$id'");
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
                                    <input type="text" class="form-control" name="service_name" value="<?php echo $obj->service_name;?>">
                                </div>
                                <br />
                                <div class="col-md-12">
                                 <textarea name="service_desc" id="textarea-input" rows="9" class="form-control"><?php echo $obj->service_desc;?></textarea>
                                </div>
                                <br />
                                <div class="form-group">
                                    <div class="row">
                                    <div class="col-md-6">
                                    <input type="text" class="form-control" name="service_package" value="<?php echo $obj->package_id;?>">                                    </div>
                                    <div class="col-md-6">
                                         <div class="form-group">
                                            <input type="file" name="image" >
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            Php
                                        </span>
                                        <input type="text" class="form-control" name="price" value="<?php echo $obj->price;?>">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <?php
                                    }
                                }
                                ?>
                                <button type="submit" name="edit_service" class="btn btn-primary" style="float:right">Update service</button>
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