<!DOCTYPE html>
<html lang="de">

  <?php include 'incl/page/header.php';?>

  <body id="page-top">

    <?php include 'incl/page/navbar.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Übersicht</span>
          </a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="ueberweisung.php">
            <i class="fas fa-fw fa-list"></i>
            <span>Überweisung</span></a>
        </li>        
        <li class="nav-item">
          <a class="nav-link" href="prognose.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Prognose</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <?php include 'incl/dbconnect.php';?>  

          <!-- Content -->
          <!-- Jumbotron-->
          <div class="page-header">
            <h2>Überweisung:</h2>
          </div>          
          <div class="jumbotron jumbo-content">
            <h4></h4> 
            <?php include 'incl/dbconnect.php';?> 

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">   
              Konto: <select name=vIban><?php include 'incl/selectKonto.php';?></select><br>                 
              Empfänger: <select name=aIban><?php include 'incl/selectKonto.php';?></select><br>
              Betrag in Euro: <input type="text" name="ueBetrag" value="10.00"><br />
              <input type="submit" name="sSenden" value="Senden"/>
            </form> 
          </div>

          <?php
              if(isset($_POST['sSenden'])){
              include 'incl/ueberweise.php';
            }
          ?>
          

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

    <?php include 'incl/page/scripts.php';?>

  </body>

</html>
