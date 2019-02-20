<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/site-examples.css">

    <script type="text/javascript" language="javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/jszip.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/pdfmake.min.js"></script>
	<script type="text/javascript" language="javascript" src="js/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="js/buttons.html5.min.js"></script>
    
</head>
<body>
<div class="panel">
<br />
<br />
<table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Service Name</th>
                <th>Customer Name</th>
                <th>Date Served</th>
                <th>Employee Served ID No.</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                    include '../database/config.php';
                    $i = 1;
                            $result = $mysqli->query("SELECT
                                                        services.id AS id,
                                                        services.service_name AS service_name,
                                                        services.package_id AS package_id,
                                                        packages.name AS name,
                                                        orders.service_id as service_id,
                                                        orders.fname as fname,
                                                        orders.lname as lname,
                                                        orders.served as served,
                                                        orders.date_served as date_served,
                                                        orders.total as total,
                                                        orders.emp_id_makeup as emp_id_makeup,
                                                        orders.emp_id_hair as emp_id_hair
                                                    FROM
                                                        services
                                                    INNER JOIN
                                                        packages ON services.id = packages.id
                                                    INNER JOIN
                                                        orders ON orders.service_id = services.id
                                                    WHERE orders.served = 1");
                            if($result) {
                                while($obj = $result->fetch_object()) {
                        ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $obj->service_name;?></td>
                        <td><?php echo $obj->fname.' '.$obj->lname ;?></td>
                        <td><?php echo $obj->date_served;?></td>
                        <td><?php echo 'Makeup ID No.: '. $obj->emp_id_makeup.' <br>Hair ID No.: '.$obj->emp_id_hair;?></td>
                        <td><?php echo 'Php '.number_format($obj->total, 2);?></td>
                      </tr>
                      <?php
                            }
                        }
                     ?>
        </tbody>
    </table>
</div>
</body>
<script>
        $(document).ready(function() {
            $('#example').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
        $(document).ready(function() {
            $('#example2').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                ]
            } );
        } );
</script>
<script>
                var acc = document.getElementsByClassName("accordion");
                var i;
                
                for (i = 0; i < acc.length; i++) {
                  acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;
                    if (panel.style.maxHeight){
                      panel.style.maxHeight = null;
                    } else {
                      panel.style.maxHeight = panel.scrollHeight + "px";
                    } 
                  });
                }
</script>
</html>
