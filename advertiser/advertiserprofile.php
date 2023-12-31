<?php
ob_clean();
session_start();
$email = $_SESSION['email'];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel='stylesheet' type='text/css' />


    <!-- Graph CSS -->
    <link href="../css/lines.css" rel='stylesheet' type='text/css' />
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- jQuery -->
    <script src="../js/jquery.min.js"></script>
    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Nav CSS -->
    <link href="../css/custom.css" rel="stylesheet">
    <!-- Metis Menu Plugin JavaScript -->
    <script src="../js/metisMenu.min.js"></script>
    <script src="../js/custom.js"></script>
    <!-- Graph JavaScript -->
    <script src="../js/d3.v3.js"></script>
    <script src="../js/rickshaw.js"></script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">ADVERTISEMENT MANAGEMENT SYSTEM</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-nav navbar-right">


                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><?php echo $email ?> <i class="fa fa-user"></i><b class="caret"></b></a>
                    <ul class="dropdown-menu">

                        <li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <?php include 'sidebar.php' ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Advertiser
                        </h1>
                        <?php
                        
                        include_once "../config.php";
                        $email = $_SESSION['email'];
                        $get = "SELECT * FROM advertiser_register WHERE email='$email'";
                        $query = mysqli_query($conn, $get);


                        echo "<table class='table table-striped table-hover table-bordered table-responsive'>
    <tr class = 'table info'>
      <th>Name</th>
      <th>Email</th>
      <th>Contact</th>
      <th>Company</th>
      <th>Website</th>

      <th>Address</th>
      <th>Country</th>
      <th>Edit</th>

     
    </tr>";

                        while ($res = mysqli_fetch_array($query)) {

                            $name = $res['advertiser_name'];
                            $email = $res['email'];
                            $phone = $res['contact'];
                            $company = $res['company_name'];
                            $website = $res['sitename'];
                            $address = $res['address'];
                            $country = $res['country'];


                        ?>
                            <tr>
                                <?php echo "
      <td>$name</td>
      <td>$email</td>
      <td>$phone</td>
      <td>$company</td>
      <td>$website</td>
	<td>$address</td>
      <td>$country</td>
      <td>  " ?>
                                <form action="editadprofile.php" method="POST">
                                    <input type="submit" value="Edit">
                                </form>

                                <?php echo "</td>";


                                ?>
                            </tr>

                        <?php }; ?>
                        </table>


                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>