<?php
error_reporting(-1);
//var_dump($_POST);

// MySQL Data
require('config.php');

//////////////////////////
//User (Login)
$userid = 1;
//////////////////////////
$db = OpenCon();


//Update Data if submitted
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit']))
{
	$sql = "INSERT INTO `transaktionen` (`userid`, `name`, `betrag`, `start`, `wiederholung`, `typ`, `steuersatz`) VALUES ('$userid', '$_POST[bezeichnung]', '$_POST[betrag]', '$_POST[datum]', '$_POST[wiederholung]', '$_POST[typ]', '$_POST[steuer]');";
	//$sql = "UPDATE `einstellungen` SET `berechnung` = '$_POST[aktiviert]', `steuersatz` = '$_POST[steuersatz]', `tag` = '$_POST[tag]', `monat` = '$_POST[monat]' WHERE `einstellungen`.`userid` = '$userid'";
	
	$db->query($sql);
	
	/*DEBUG
	if ($db->query($sql) === TRUE) 
	{
		echo "Record updated successfully";
	}
	else 
	{
		echo "Error updating record: " . $db->error;
	}
	*/
}


//Get Data from Database
$sql = "SELECT * FROM `transaktionen` WHERE `userid` = '$userid'";

$result = $db->query($sql);

CloseCon($db);
?>

<!DOCTYPE html>
<html lang="de">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Online-Banking Webanwendung">
    <meta name="author" content="Programmiergruppe">

    <title>Online-Banking</title>

    <!-- Bootstrap core CSS-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
	
  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">Online-Banking</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="login.php">Login</a>
            <a class="dropdown-item" href="register.php">Register</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Übersicht</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="ueberweisung.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Überweisung</span></a>
        </li>        
        <li class="nav-item dropdown active">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-fw fa-chart-line"></i>
            <span>Prognose</span></a>
			<div class="dropdown-menu" aria-labelledby="pagesDropdown">
				<a class="dropdown-item fas fa-chart-line" href="prognose.php"> Prognose</a>
				<a class="dropdown-item fas fa-coins active" href="umsatze.php"> Umsätze</a>
				<a class="dropdown-item fas fa-cog" href="einstellungen.php"> Einstellungen</a>
			</div>
        </li>
      </ul>

		<div id="content-wrapper">

			<div class="container-fluid">

			  <!-- Content -->


			  <!-- Breadcrumbs-->
			  <ol class="breadcrumb">
				<li class="breadcrumb-item active">Umsätze</li>
			  </ol>
			  
				<div class="col-lg-6">
					<div class="card mb-3">
						<div class="card-header"><i class="fas fa-coins"></i> Umsatz hinzufügen</div>
						<div class="card-body">
							<form role="form" action="umsatze.php" method="post">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group input-group col-lg-12">
											<span class="input-group-addon"><i class="fas fa-question"></i></span>
											<input type="text" class="form-control" name="bezeichnung" placeholder="Bezeichnung / Zweck" required>
										</div>
										<div class="form-group input-group col-lg-8">
											<span class="input-group-addon"><i class="fas fa-calendar"></i></span>
											<input type="date" class="form-control" name="datum" required>
										</div>
										<div class="form-group input-group col-lg-10">
											<span class="input-group-addon"><i class="fas fa-redo"></i></span>
											<select name="wiederholung" class="form-control" required>
												<option disabled selected value><-- Wiederholung --></option>
												<option value="einmalig">einmalig</option>
												<option value="täglich">täglich</option>
												<option value="wöchentlich">wöchentlich</option>
												<option value="monatlich">monatlich</option>
												<option value="vierteljährlich">vierteljährlich</option>
												<option value="halbjährlich">halbjährlich</option>
												<option value="jährlich">jährlich</option>
											</select>
										</div>
									</div>
									<!-- /.col-lg-6 -->
									<div class="col-lg-1"></div>
									<!-- /.col-lg-1 -->
									<div class="col-lg-5">
										<div class="form-group input-group col-lg-12">
											<span class="input-group-addon"><i class="fa fa-coins"></i></span>
											<input type="number" class="form-control form-control-sm" name="betrag" placeholder="0.00" min="0.01" step="0.01" required>
										</div>
										<div class="form-group">
											<div class="radio">
												<input type="radio" name="typ" value="Eingang" checked>Eingang
											</div>	
											<div class="radio">
												<input type="radio" name="typ" value="Ausgang">Ausgang
											</div>	
										</div>
										<div class="form-group">
											<div class="radio">
												<input type="radio" name="steuer" value="19" checked>19 %
											</div>	
											<div class="radio">
												<input type="radio" name="steuer" value="7">7%
											</div>	
										</div>
									</div>
									<!-- /.col-lg-2 -->
								</div>
								<!-- /.row -->
								<div class="col-lg-12">
									<div class="form-group">
										<button type="submit" name="submit" class="btn btn-primary btn-success btn-block">speichern</button>
										<button type="reset" class="btn btn-primary btn-danger btn-block">verwerfen</button>
									</div>
								</div>
								<!-- /.col-lg-4 -->
							</form>
							<!-- /.form -->
						</div>
						<!-- /.card body -->
					</div>
					<!-- /.card mb-3 -->
				</div>
				<!-- /.col-lg-6 -->
				
				<!-- DataTables Example -->
				<div class="col-lg-12">
					<div class="card mb-3">
						<div class="card-header"><i class="fas fa-table"></i> Umsätze</div>
						<div class="card-body">
							<div class="col-lg-6 mb-3">
										<div class="row">
											<div class="col-lg-4">
												<div class="card">
													<button type="button" class="btn btn-primary" id="add">hinzufügen</button>
												</div>							
											</div>
											<div class="col-lg-4">
												<div class="card">
													<button type="button" class="btn btn-warning" id="add">bearbeiten</button>
												</div>							
											</div>
											<div class="col-lg-4">
												<div class="card">
													<button type="button" class="btn btn-danger" id="delete">löschen</button>
												</div>							
											</div>
										</div>
							</div>
							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th class='bronco' style='display:none;'>id</th>
											<th>Name</th>
											<th>Betrag</th>
											<th>Typ</th>
											<th>Startdatum</th>
											<th>Wiederholung</th>
											<th>Steuersatz</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th class='bronco' style='display:none;'>id</th>
											<th>Name</th>
											<th>Betrag</th>
											<th>Typ</th>
											<th>Startdatum</th>
											<th>Wiederholung</th>
											<th>Steuersatz</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
											if ($result->num_rows > 0) 
											{
												// Jede wiederkehrende Transaktion ausgeben
												while($row = $result->fetch_assoc()) {
													echo "<tr>";
														// id
														echo "<td class='bronco' style='display:none'>" . $row["id"] . "</td>";
													
														// Name
														echo "<td>" . $row["name"] . "</td>";
														
														// Betrag (auf 2 Dezimalstellen)
														echo "<td class='text-right'>" . number_format($row["betrag"],2) . "€</td>";
														
														// Typ (Eingang / Ausgang)
														echo "<td>" . $row["typ"] . "</td>";
														
														// Datum (Datumsformat umwandeln)
														$starttime = strtotime($row["start"]);
														$newdate = date("d.m.Y", $starttime);
														echo "<td>" . $newdate . "</td>";
														
														// Wiederholung
														echo "<td>" . $row["wiederholung"] . "</td>";
														
														//Steuersatz
														echo "<td>" . $row["steuersatz"] . "%</td>";
													echo "</tr>";
												}
											} else {
												echo "<tr><td>Keine wiederkehrenden Transaktionen hinterlegt</td></tr>";
											}
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
					</div>
				</div>
			</div>
        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Online-Banking 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
	<script src="vendor/datatables/test.js"></script>
	
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
