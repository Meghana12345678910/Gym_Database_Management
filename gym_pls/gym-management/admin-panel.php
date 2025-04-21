<!DOCTYPE html>
<?php
// php select option value from database
$hostname = "localhost";
$username = "root";
$password = "";
$databaseName = "loginsystem";

// connect to mysql database
$connect = mysqli_connect($hostname, $username, $password, $databaseName);

// mysql select query
$query = "SELECT * FROM `Trainer`";

// for method 1
$result1 = mysqli_query($connect, $query);
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
      integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <link rel="stylesheet" type="text/css" href="style.css">

  </head>
  <body>

    <div class="jumbotron"style="border-radius:0;background:url('images/3.jpg');background-size:cover;height:400px;margin-bottom:0;padding-bottom:0;"></div>

    <div class="colored-gap" style="height: 40px;background-color: #ffebf2;"></div>

    <div class="container-fluid" style="background-color: #ffebf2;padding-top:0;">
      <div class="row">
        <div class="col-md-3">
          <div class="list-group">
            <a href="" class="list-group-item active" style="background-color: #ff91a0;border : none;">Members</a>
            <a href="trainer_details.php" class="list-group-item" >Member details</a>
            <a href="package.php" class="list-group-item">Package details</a>
            <a href="payment.php" class="list-group-item">Payments</a>
            <a href="member_payment_package.php" class="list-group-item">Member & Payment & Package</a>
            <a href="notifications.php" class="list-group-item">Notifications</a>
          </div>
          <hr>
          <div class="list-group">
            <a href="trainer.php" class="list-group-item ">Trainer details</a>
            <a href="trainer_package.php" class="list-group-item">Member & Trainer Details</a>
          </div>
        </div>

        <div class="col-md-8">
          <div class="card">
            <div class="card-body" style="background-color:#ff91a0;color:#ffffff;border: none;">
              <h4 class="h4">Register new members</h4>
            </div>
            <div class="card-body" style="background-color: #ffebf2; color:#ff91a0; border: none;">
              <form class="form-group" action="func.php" method="post">
                <label style="margin-bottom :8px;">First name:</label>
                <input type="text" name="fname" class="form-control"><br>

                <label style="margin-bottom :8px;">Last name:</label>
                <input type="text" name="lname" class="form-control"><br>

                <label style="margin-bottom :8px;">Email:</label>
                <input type="text" name="email" class="form-control"><br>

                <label for="Package_id" style="padding:5px;margin-bottom:2px;">Select Package:</label>
    <select name="Package_id" class="form-control">
        <option value="" disabled selected hidden></option>
        <?php
        $package_query = "SELECT * FROM Package";
        $package_result = mysqli_query($connect, $package_query);
        while ($row = mysqli_fetch_assoc($package_result)) {
            echo "<option value='" . $row['Package_id'] . "'>" . $row['Package_name'] . " - ₹" . $row['Amount'] . "</option>";
        }
        ?>
    </select>
    <label style="margin-top:5px;margin-bottom:5px;padding:5px;">Trainer:</label>
<select class="form-control" name="Trainer_id" >
  <option value="" disabled selected hidden>Select a Trainer</option>
  <?php while ($row1 = mysqli_fetch_array($result1)) : ?>
    <option value="<?php echo $row1['Trainer_id']; ?>"><?php echo $row1['Name']; ?></option>
  <?php endwhile; ?>
</select>

              <label style="margin-bottom :8px;">Start Date:</label>
              <input type="date" name="start_date" class="form-control"><br>

              <label style="margin-bottom :8px;">End Date:</label>
              <input type="date" name="end_date" class="form-control"><br>


                <input type="submit" class="btn btn-primary" name="pat_submit" value="Register" style="background-color: #ff91a0 ; color: white; border: none ; margin-top:10px;">
              </form>
            </div>
          </div>
        </div>

        <div class="col-md-1"></div>
      </div>
      <div class="main-wrapper">
          <div class="nav-login">
            <?php
            if (isset($_SESSION['u_id'])) {
              echo '<form action="includes/index.php" method="POST">
                      <button type="submit" name="submit">logout</button>
                    </form>';
            } else {
              echo '<form action="includes/index.php" method="POST"></form>
                    <a href="index.php" class="btn btn-light" style="background-color:#ff91a0;color:#FFFFFF">Logout</a>';
            }
            ?>
          </div>
        </div>
    </div>

  
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
      integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous">
    </script>
  </body>
</html>
