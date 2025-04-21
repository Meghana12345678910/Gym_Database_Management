<!DOCTYPE html>
<?php include("func.php"); ?>
<html>
<head>
    <title>Members details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body style="background-color:#ffebf2;">

    <div class="jumbotron" style="background: url('images/2.jpg') no-repeat; background-size: cover; height: 300px;"></div>

    <div class="container">
        <div class="card">
            <div class="card-body" style="background-color:#ff87c3; color:#ffffff;">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Payment Details</h3>
                    </div>
                    <div class="col-md-8">
                        <form class="form-group" action="patient_search.php" method="post">
                            <div class="row">
                                <!-- Empty row for layout -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body" style="background-color:#ffebf2; color:#ff87c3;">
                <div class="card-body">
                    <table class="table table-hover table-bordered" style="border: 2px solid #ff87c3; border-collapse: collapse;">
                        <thead class="thead-dark">
                            <tr style="border: 2px solid #ff87c3;">
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Payment ID</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Amount</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Payment Type</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Member ID</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Payment Activity</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php get_payment(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body" style="background-color:#ff87c3; color:#ffffff;">
                <h3>Make new Payment</h3>
            </div>

            <!-- Payment Form -->
            <div class="card-body" style="background-color:#ffebf2; color:#ff87c3;">
                <form class="form-group" action="func.php" method="post">
                    <label>Payment ID</label>
                    <input type="text" name="Payment_id" class="form-control"><br>

                    <label>Amount</label>
                    <input type="text" name="Amount" class="form-control"><br>

                    <?php
                        $connect = mysqli_connect("localhost", "root", "", "loginsystem");
                        $query = "SELECT Member_id FROM members";
                        $result = mysqli_query($connect, $query);
                    ?>

                    <label>Member ID</label>
                    <select name="Member_id" class="form-control" style="margin-bottom:10px;">
                        <option value="" disabled selected hidden></option>
                        <?php
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    var_dump($row); // Debugging: This will output the row data
                                    echo "<option value='" . $row['Member_id'] . "'>" . $row['Member_id'] . "</option>";
                                }
                            } else {
                                echo "<option>No members found</option>";
                            }
                        ?>
                    </select>

                    <label>Payment Type</label>
                    <input type="text" name="payment_type" class="form-control"><br>



                    <input type="submit" class="btn btn-primary" name="pay_submit" value="PAY" style="background-color: #ff5eaf;border:0; cursor:pointer;">
                    <div class="col-md" style="text-align: center;">
                        <a href="admin-panel.php" class="btn btn-light" style="background-color: transparent; border: 0; color:blue; ">Go Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>

</body>
</html>
