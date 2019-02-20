<?php
include '../database/config.php';
$id = $_GET['id'];
$edit_name = $_POST['edit_name'];
if(isset($_POST['edit_package'])){
    $sql = "UPDATE packages SET name='$edit_name' WHERE id ='$id'";
   
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
                    <div class="col-md-12">
                        <?php 
                            if ($mysqli->query($sql) === TRUE) {
                                echo "<script>alert('Record updated successfully'); window.location.href = 'packages.php'</script>";
                            } 
                        ?>
                    </div>
                    <div class="col-md-5">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>
                            <span class="glyphicon glyphicon-th"></span>
                            <span>Editing <?php echo $_GET['name'];?></span>
                            </strong>
                        </div>
                        <div class="panel-body">
                            <form method="post" action="">
                            <div class="form-group">
                                <input type="text" class="form-control" name="edit_name" value="<?php echo $_GET['name'];?>">
                            </div>
                            <button type="submit" name="edit_package" class="btn btn-primary">Update Package</button>
                        </form>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
<?php include 'footer.php'; ?>