
<?php
session_start();
error_reporting(0); 
include('link/config.php');

if(strlen($_SESSION['alogin'])=="")
    {   
    header("Location: user_login.php"); 
    }
    else{ 
        $username=$_SESSION["username"];
        // echo $username;

?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Users</title>
        <link rel="stylesheet" href="css/bootstrap.min.css" media="screen" >
        <link rel="stylesheet" href="css/font-awesome.min.css" media="screen" >
        <link rel="stylesheet" type="text/css" href="js/DataTables/datatables.min.css"/>
        <link rel="stylesheet" href="css/form-content.css" media="screen" >
        <link rel="stylesheet" href="css/main.css" media="screen" >
        <script src="js/modernizr/modernizr.min.js"></script>
          <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
body{
    background-color: #f4f7f6;
}
h5{
    font-weight:900;
}

/* Premium Table & Panel Styling */
.panel {
    border-radius: 16px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.08);
    border: none;
    overflow: hidden;
    background: #fff;
    margin-top: 20px;
}
.panel-heading {
    background: linear-gradient(135deg, #499bea 0%, #207ce5 100%);
    color: white;
    padding: 25px 30px;
    border-bottom: none;
}
.panel-title h5 {
    color: white;
    margin: 0;
    font-size: 1.4rem;
    letter-spacing: 0.5px;
    text-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.panel-body {
    padding: 30px !important;
}
.table {
    margin-bottom: 0;
    border-collapse: separate;
    border-spacing: 0;
    width: 100%;
}
.table thead th {
    background-color: #f8fafc;
    color: #475569;
    font-weight: 700;
    text-transform: uppercase;
    font-size: 0.85rem;
    letter-spacing: 0.8px;
    border-bottom: 2px solid #e2e8f0;
    padding: 18px 20px;
    border-top: none;
}
.table thead th:first-child {
    border-top-left-radius: 12px;
}
.table thead th:last-child {
    border-top-right-radius: 12px;
}
.table tbody td {
    padding: 18px 20px;
    vertical-align: middle;
    color: #334155;
    font-size: 0.95rem;
    border-bottom: 1px solid #f1f5f9;
    border-top: none;
    transition: all 0.3s ease;
}
.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fafbfc;
}
.table-hover tbody tr:hover td {
    background-color: #f1f5f9;
    color: #0f172a;
    transform: scale(1.002);
}
.table-bordered {
    border: 1px solid #f1f5f9;
    border-radius: 12px;
}
.table-bordered th, .table-bordered td {
    border-right: 1px solid #f1f5f9;
}
.table-bordered th:last-child, .table-bordered td:last-child {
    border-right: none;
}

/* DataTables Overrides */
.dataTables_wrapper {
    padding-top: 10px;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current, 
.dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    background: linear-gradient(135deg, #499bea, #207ce5) !important;
    color: white !important;
    border: none !important;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(73, 155, 234, 0.3);
    font-weight: bold;
}
.dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 8px;
    border: none !important;
    margin: 0 4px;
    transition: all 0.2s ease;
}
.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background: #f1f5f9 !important;
    color: #334155 !important;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}
.dataTables_wrapper .dataTables_filter input {
    border: 1px solid #cbd5e1;
    border-radius: 20px;
    padding: 8px 20px;
    outline: none;
    transition: border-color 0.3s, box-shadow 0.3s;
    margin-left: 10px;
    width: 250px;
}
.dataTables_wrapper .dataTables_filter input:focus {
    border-color: #499bea;
    box-shadow: 0 0 0 3px rgba(73, 155, 234, 0.2);
}
.dataTables_wrapper .dataTables_length select {
    border: 1px solid #cbd5e1;
    border-radius: 8px;
    padding: 6px 12px;
    outline: none;
    margin: 0 5px;
}
.dataTables_wrapper .dataTables_length select:focus {
    border-color: #499bea;
}
        </style>
    </head>
    <body class="top-navbar-fixed">
        <div class="main-wrapper">

            <!-- ========== TOP NAVBAR ========== -->
            <?php include('link/user-topber.php');?> 
            <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
            <div class="content-wrapper">
                <div class="content-container">

                    <div class="main-page">
                        <div class="container-fluid">
                 
                             

                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="panel">
                                            <div class="panel-heading">
                                                <div class="panel-title">
                                                    <h5>YOUR INFORMATION</h5>
                                                </div>
                                            </div>
<?php if($msg){?>
<div class="alert alert-success left-icon-alert" role="alert">
 <strong>Well done!</strong><?php echo htmlentities($msg); ?>
 </div><?php } 
else if($error){?>
    <div class="alert alert-danger left-icon-alert" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                        <?php } ?>
                                            <div class="panel-body p-20">

                                                <table id="example" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>User Id</th>  
                                                            <th>User Name </th>
                                                            <th>Contact </th>
                                                            <th>Registration Date</th>
                                                        </tr> 
                                                    </thead>
                                                    <tbody>
<?php   $sql = "SELECT user.id,user.user_name,user.contact,user.reg_date from user where user_name='$username'";
$query = $dbh->prepare($sql);
$query->execute(); 
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0) 
{
foreach($results as $result)
{   ?> 
<tr> 
    <td><?php echo htmlentities($result->id);?></td>
    <td><?php echo htmlentities($result->user_name);?></td>
    <td><?php echo htmlentities($result->contact);?></td>
    <td><?php echo htmlentities($result->reg_date);?></td>
</tr>
<?php $cnt=$cnt+1;}} ?>
                                                       
                                                    
                                                    </tbody>
                                                </table>

                                         
                                                <!-- /.col-md-12 -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.col-md-6 -->

                                                               
                                    

                            </div>
                            <!-- /.container-fluid -->
                        </section>
                        <!-- /.section -->

                    </div>
                    <!-- /.main-page -->

                    

                </div>
                <!-- /.content-container -->
            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /.main-wrapper -->

        <!-- ========== COMMON JS FILES ========== -->
        <script src="js/jquery/jquery-2.2.4.min.js"></script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/pace/pace.min.js"></script>
        <script src="js/lobipanel/lobipanel.min.js"></script>
        <!-- <script src="js/iscroll/iscroll.js"></script> -->

        <!-- ========== PAGE JS FILES ========== -->
        <script src="js/prism/prism.js"></script>
        <script src="js/DataTables/datatables.min.js"></script>

        <!-- ========== THEME JS ========== -->
        <script src="js/main.js"></script>
        <script>
            $(function($) {
                $('#example').DataTable();

                $('#example2').DataTable( {
                    "scrollY":        "300px",
                    "scrollCollapse": true,
                    "paging":         false
                } );

                $('#example3').DataTable();
            });
        </script>
    </body>
</html>

<?PHP } ?>
