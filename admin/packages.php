<?php
include '../database/config.php';
//Insert category
$name = $_POST['name'];
if(isset($_POST['add_package'])){
$sql = "INSERT INTO packages (name)
VALUES ('$name')";


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
                        <?php
                            if ($mysqli->query($sql) === TRUE) {
                                echo '<div class="col-sm-12">
                                        <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                        <span class="badge badge-pill badge-success">Success</span> You successfully added a new package.
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>';
                            }
                            ?>
                            <div class="col-md-5">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                <strong>
                                    <span class="glyphicon glyphicon-th"></span>
                                    <span>Add New Package</span>
                                </strong>
                                </div>
                                <div class="panel-body">
                                <form method="POST" action="">
                                <div class="input-group">
                                    <input type="text" id="input2-group2" name="name" placeholder="Package Name" class="form-control">
                                    <div class="input-group-btn"><button name="add_package" class="btn btn-primary">Add Package<button></div>
                                </div>
                            </form>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-7">
                            <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>
                                <span class="glyphicon glyphicon-th"></span>
                                <span>All Packages</span>
                            </strong>
                            </div>
                                <div class="panel-body">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 50px;">#</th>
                                            <th>Packages</th>
                                            <th class="text-center" style="width: 100px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            include '../database/config.php';
                                            $i=0;
                                            $packages = array();

                                            $result = $mysqli->query('SELECT * FROM packages');
                                            if($result === FALSE){
                                                die(mysql_error());
                                            }

                                            if($result){

                                                while($obj = $result->fetch_object()) {
                                        ?>
                                        <tr>
                                            <td class="text-center"><?php echo $obj->id;?></td>
                                            <td><?php echo $obj->name;?></td>
                                            <td class="text-center">
                                            <div class="btn-group">
                                                <a href="edit_packages.php?id=<?php echo $obj->id;?>&name=<?php echo $obj->name;?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                                <span class="fa fa-edit"></span>
                                                </a>
                                                <a href="delete_package.php?id=<?php echo $obj->id;?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
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
                    </div>
                </div>
            </section>
            <!-- END DATA TABLE-->
<?php include 'footer.php'; ?>