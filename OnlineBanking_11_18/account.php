<!DOCTYPE html>
<html lang="de">

  <?php include 'incl/header.php';?>

  <body id="page-top">


    <?php include 'incl/navbar.php';?>

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

          <?php
        
            //Fehlerbehandlung
            error_reporting (0);

            $db = new mysqli('localhost', 'root','','testdb');
            print_r($db->connect_error);

            if($db->connect_error){
                die('Verbindung nicht möglich!');
            }
            echo "Connected successfully <br>";
          ?>

          <!-- Content -->
          <!-- Jumbotron-->
          <div class="page-header">
            <h2>Ihr Account:</h2>
          </div>          
          <div class="jumbotron jumbo-content">   
            <form>           
              <div class="form-group row">
                <label for="staticName" class="col-sm-2 col-form-label">Name:</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="Max Mustermann">
                </div>
                <label for="staticIban" class="col-sm-2 col-form-label">Iban:</label>
                <div class="col-sm-10">
                  <input type="text" readonly class="form-control-plaintext" id="staticIban" value="DE12 5000 1706 4848 9890">
                </div>
                <div class="col-sm-10" style="padding: 10px">
                    <?php
                    
                      $sql = "SELECT * FROM user";
                      $result = $db->query($sql);

                      if ($result->num_rows > 0) {
                          echo "<table><tr><th>Name</th><th>Age</th></tr>";
                          // output data of each row
                          while($row = $result->fetch_assoc()) {
                              echo "<tr><td>" . $row["name"]. "</td><td>" . $row["age"]. "</td></tr>";
                          }
                          echo "</table>";
                      } else {
                          echo "0 results";
                      }
                      
                      
                    ?>         
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
