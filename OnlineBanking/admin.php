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
        <li class="nav-item">
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

            <h4>Konten anzeigen lassen:</h4>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
              <div class="col-2">
                <p>Kunde:</p>
              </div>
              <div class="col-4">
                <select name=Kunden_Id><?php include 'incl/frontend/selectName.php';?></select>
              </div> 
            </div>
            <div class="row">
              <div class="col-2">
                <input type="submit" name="sAnzeigen" value="Anzeigen"/>
              </div>
            </div>         
            </form> 
            <hr> 

            <h4>Konto hinzufügen:</h4>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
              <div class="row">
                <div class="col-2">
                  <p>Kunde:</p>
                </div>
                <div class="col-4">
                  <select name=Kunden_Id><?php include 'incl/frontend/selectName.php';?></select>
                </div>
              </div>
              <div class="row">
                <div class="col-2">
                  <p>Zu hinzufügende IBAN: </p>
                </div>
                <div class="col-4">
                  <input type="text" name="iban" placeholder="123456">
                </div>
              </div>
              <div class="row">
                <div class="col-2">
                  <p>Startkontostand:</p>
                </div>
                <div class="col-4">
                  <input type="text" name="sBetrag" value="0.00€">
                </div>
              </div>
              <div class="row">
                <div class="col-2">
                  <input type="submit" name="sHinzufügen" value="Neue Iban Anlegen"/>
                </div>
              </div>
            </form> 

            <hr>  

            <h4>Kontostand bearbeiten:</h4>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
              <div class="row">
                  <div class="col-2">
                    <p>Kunde:</p>
                  </div>
                  <div class="col-4">
                    <select name=iban><?php include 'incl/frontend/selectKonto.php';?></select>
                  </div>
              </div>
              <div class="row">
                  <div class="col-2">
                    <p>Neuer Kontostand: </p>
                  </div>
                  <div class="col-4">
                    <input type="text" name="nBetrag" placeholder="0.00€">
                  </div>
              </div>
              <div class="row">
                <div class="col-2">
                  <input type="submit" name="sUpdate" value="Update"/>
                </div>
              </div>            
            </form>

            <hr>   
             
            <h4>Konto löschen:</h4>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 

            <div class="row">
              <div class="col-2">
                <p>Kunde:</p>
              </div>
              <div class="col-4">
                <select name=iban><?php include 'incl/frontend/selectKonto.php';?></select>
              </div>
            </div>
            <div class="row">
              <div class="col-2">
                <input type="submit" name="sLoeschen" value="Löschen"/>
              </div>
            </div>
            </form> 

            <hr>  

            <h4>Ausgabe:</h4>

            <?php
              if(isset($_POST['sAnzeigen'])){
              include 'incl/frontend/kontoanzeigen.php';   
            }
              if(isset($_POST['sHinzufügen'])){
              include 'incl/frontend/kontobearbeiten.php';    
            }
              if(isset($_POST['sUpdate'])){
              include 'incl/frontend/kontostandbearbeiten.php';   
            }
              if(isset($_POST['sLoeschen'])){
              include 'incl/frontend/kontoloeschen.php';   
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
