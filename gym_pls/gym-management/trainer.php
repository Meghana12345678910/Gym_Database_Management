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
                        <h3>Trainer Information</h3>
                    </div>
                    <div class="col-md-8">
                        <form class="form-group" action="patient_search.php" method="post">
                            <div class="row">
                                <!-- Empty row placeholder -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card-body" style="background-color:#ffebf2; color:#ff87c3;">
                <div class="card-body">
                    <table class="table table-hover tbale-bordered" style="border: 2px solid #ff87c3; border-collapse: collapse;">
                        <thead class="thead-dark">
                            <tr style="border: 2px solid #ff87c3;">
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Trainer ID</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Name</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Phone</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Action</th>
                            </tr>   
                        </thead>
                        <tbody>
                            <?php get_trainer(); ?>
                        </tbody>
                    </table>
                </div>

        </div>
        <div class="card">
        <div class="card-body" style="background-color:#ff87c3; color:#ffffff;">
                    <h3>Register new Trainer</h3>
                </div> 

                <div class="card-body" style="background-color:#ffebf2; color:#ff87c3;">
                    <form class="form-group" action="func.php" method="post">
                        <label>Trainer ID</label>
                        <input type="text" name="Trainer_id" class="form-control"><br>

                        <label>Name</label>
                        <input type="text" name="Name" class="form-control"><br>

                        <label>Phone</label>
                        <input type="text" name="phone" class="form-control"><br> 

                        <input type="submit" class="btn btn-primary" name="tra_submit" value="Register" style="background-color: #ff5eaf;border:0; cursor:pointer;">

                        <div class="col-md" style="text-align: center;">
                        <a href="admin-panel.php" class="btn btn-light" style="background-color: transparent; border: 0; color:blue; ">Go Back</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
