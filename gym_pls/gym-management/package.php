<!DOCTYPE html>
<?php include("func.php"); ?>
<html>
<head>
    <title>Package Details</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" 
          crossorigin="anonymous">
</head>
<body style="background-color:#ffebf2;">

<!-- Banner -->
<div class="jumbotron" style="background: url('images/2.jpg') no-repeat; background-size: cover; height: 300px;"></div>

<!-- Container -->
<div class="container">

    <!-- Header Card -->
    <div class="card">
        <div class="card-body" style="background-color:#ff87c3; color:#ffffff;">
            <div class="row">
    
                <div class="col-md-3">
                    <h3>Package Details</h3>
                </div>
                <div class="col-md-8">
                    <!-- If you plan to use search, insert here -->
                    <!-- Currently empty -->
                </div>
            </div>
        </div>

        <!-- Table Section -->
        <div class="card-body" style="background-color:#ffebf2; color:#ff87c3;">
            <div class="card-body">
                <table class="table table-hover table-bordered" style="border: 2px solid #ff87c3; border-collapse: collapse;">
                    <thead class="thead-dark" >
                        <tr style="border: 2px solid #ff87c3;">
                            <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Package ID</th>
                            <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Package Name</th>
                            <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Amount</th>
                            <th style="border: 2px solid #ff80c3; background-color:#ff87c3;color: #ffffff">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php get_package(); ?>
                    </tbody>
                </table>

                <div style="height: 30px;"></div>






            </div>
            
        </div>
    </div>

    <div style="height: 30px;"></div>
    
    <div class="card">
    <div class="card-body" style="background-color:#ff87c3; color:#ffffff;">
            <div class="row">
    
                <div class="col-md-3">
                    <h3>Add New Package </h3>
                </div>
</div>
</div>
                <div class="card-body" style="background-color:#ffebf2; color:#ff87c3;">
                <form class="form-group" action="func.php" method="post">
                <label>Package ID</label>
                <input type="text" name="Package_id" class="form-control"><br>

                <label>Package Name</label>
                <input type="text" name="Package_name" class="form-control"><br>
                
                <label>Amount</label>
                <input type="text" name="Amount" class="form-control"><br>

                <input type="submit" class="btn btn-primary" name="add_pack" value="Add" style="background-color: #ff5eaf;border:0; cursor:pointer;">
                </form>

                <div class="col-md" style="text-align: center;">
                    <a href="admin-panel.php" class="btn btn-light" style="background-color: transparent; border: 0; color:blue; ">Go Back</a>
                </div>
                </div>
    </div>

</div>

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" 
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" 
        crossorigin="anonymous"></script>

</body>
</html>
