<!DOCTYPE html>
<html lang="de">

  <?php include 'incl/header.php';?>

  <body id="page-top">

    <?php include 'incl/navbar.php';?>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
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
        <li class="nav-item">
          <a class="nav-link" href="new.php">
            <i class="fab fa-accessible-icon"></i>
            <span>New-Test</span></a>
        </li>         
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Content -->
          <!-- Jumbotron-->
          <div class="page-header">
            <h2>Willkommen Herr Mustermann!</h2>
          </div>          
          <div class="jumbotron jumbo-content">
            <h4>Ihre Konten:</h4> 
            <form>           
              <div class="form-group row">
                <label for="staticIban" class="col-sm-2 col-form-label">Iban:</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticIban" value="DE12 5000 1706 4848 9890">
                </div>
                <label for="staticBalance" class="col-sm-2 col-form-label">Kontostand:</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticIban" value="101,00€">
                </div>
              </div>
            </form>
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

    <?php include 'incl/scripts.php';?>

  </body>

</html>
