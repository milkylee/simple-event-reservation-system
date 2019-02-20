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
                <th>Product Name</th>
                <th>Amount</th>
                <th>Order Date</th>
                <th>Ship date</th>
            </tr>
        </thead>
        <tbody>
                    <?php
                    include '../database/config.php';
                    $i = 1;
                            $result = $mysqli->query("SELECT services.id as id,
                                                            services.service_name as service_name,
                                                            services.service_desc as service_desc,
                                                            services.price as price,
                                                            services.package_id as package_id,
                                                            packages.name as name
                                                    FROM services
                                                    INNER JOIN packages
                                                        ON services.id = packages.id");
                            if($result) {
                                while($obj = $result->fetch_object()) {
                        ?>
                      <tr>
                        <td><?php echo $i++;?></td>
                        <td><?php echo $obj->service_name;?></td>
                        <td><?php echo $obj->service_desc;?></td>
                        <td><?php echo $obj->price;?></td>
                        <td><?php echo $obj->name;?></td>
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
