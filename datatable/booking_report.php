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
                <th>Service ID</th>
                <th>Customer Name</th>
                <th>Request Date</th>
                <th>Employee Served ID No.</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                    include '../database/config.php';
                    $i = 1;
                            $result = $mysqli->query("SELECT
                                                            orders.id AS id,
                                                            orders.service_id AS service_id,
                                                            orders.date AS DATE,
                                                            orders.fname AS fname,
                                                            orders.lname AS lname,
                                                            orders.total AS total,
                                                            orders.booked AS booked,
                                                            orders.served,
                                                            orders.emp_id_makeup AS emp_id_makeup,
                                                            orders.emp_id_hair AS emp_id_hair,
                                                            services.id AS serv_id,
                                                            services.service_name AS service_name
                                                        FROM
                                                            orders
                                                        INNER JOIN
                                                            services ON orders.service_id = services.id
                                                        ORDER BY
                                                            DATE DESC");
                            if($result) {
                                while($obj = $result->fetch_object()) {
                        ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $obj->service_id;?></td>
                        <td><?php echo $obj->fname.' '.$obj->lname ;?></td>
                        <td><?php echo $obj->date;?></td>
                        <td><?php if ($obj->booked == 1){
                                    echo "Booked"; } else {
                                    echo "For schedule";
                                    }?></td>
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
