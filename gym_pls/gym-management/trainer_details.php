
<!DOCTYPE html>
<?php include("func.php"); ?>
<html>
<head>
    <title>Members details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" 
          crossorigin="anonymous">
</head>
<body style="background-color:#ffebf2;">
    <div class="jumbotron" style="background: url('images/2.jpg') no-repeat; background-size: cover; height: 300px;"></div>    

    <div class="container">
        <div class="card" >
            <div class="card-body" style="background-color:#ff87c3; color:#ffffff;">
                <div class="row">
                    <div class="col-md-3">
                        <h3>Members Details</h3>
                    </div>
                    <div class="col-md-8">
                        <form class="form-group" action="trainer_search.php" method="post">
                            <div class="row">
                                <div class="col-md-10">
                                    <input type="text" name="search" class="form-control mr-2" placeholder="Enter Name or Member ID ">
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="patient_search_submit" class="btn btn-light" value="Search"  style="background-color:#ffebf2; border:0; cursor:pointer; color: grey;"> 
                                </div>
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
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">First Name</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Last Name</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Email id</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Member ID</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Trainer ID</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Package ID</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Action</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Start Date</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">End Date</th>
                                <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Status</th>

                            </tr>   
                        </thead>
                        <tbody>
                            <?php get_patient_details(); ?>
                        </tbody>
                    </table>
                    <div class="col-md" style="text-align: center;">
                        <a href="admin-panel.php" class="btn btn-light" style="background-color: transparent; border: 0; color:blue; ">Go Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" 
            integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" 
            crossorigin="anonymous"></script>
</body>
</html>
