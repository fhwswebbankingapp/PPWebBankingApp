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

          <?php include 'incl/frontend/dbconnect.php';?>  

          <!-- Content -->
          <!-- Jumbotron-->
          <div class="page-header">
            <h2>Überweisung:</h2>
          </div>          
          <div class="jumbotron jumbo-content">
            <h4></h4> 
            <?php include 'incl/frontend/dbconnect.php';?> 

            <!--
            <div class="row">
              <div class="col-4" style="background-color:pink;">
                <p>Besitzer</p>
              </div>
              <div class="col-4" style="background-color:red;">
                <p>Iban</p>
              </div>
              <div class="col-4" style="background-color:green;">
                <p>Betrag</p>
              </div> 
            </div>
            -->

            
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
            <div class="row">
              <div class="col-3">
                  <p>Konto: </p>
              </div> 
              <div class="col-9">
                  <select name=vIban><?php include 'incl/frontend/selectKonto.php';?></select>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                  <p>Empfänger: </p>
              </div> 
              <div class="col-9">
                  <select name=aIban><?php include 'incl/frontend/selectKonto.php';?></select>
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                  <p>Betrag in Euro: </p>
              </div> 
              <div class="col-9">
                  <input type="text" name="ueBetrag" value="10.00">
              </div>
            </div>
            <div class="row">
              <div class="col-3">
                  <input type="submit" name="sSenden" value="Senden"/>
              </div> 

            </div>

              
            </form> 
            

            <?php
              if(isset($_POST['sSenden'])){
                include 'incl/frontend/ueberweise.php';
              }
            ?>
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

    <?php include 'incl/page/scripts.php';?>

  </body>

</html>
