    <html>
    <head>
        <title>Patient details</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body style="margin:0;padding:0; background-color:#ffebf2;">
        <?php
    include("func.php");
    if(isset($_POST['patient_search_submit']))
    {
        $search = $_POST['search'];
        $query = "SELECT * FROM members WHERE fname = '$search' OR lname = '$search' OR member_id='$search'";
        $result = mysqli_query($con, $query);
        echo "<div class='container-fluid' style=' background-color : #ffebf2;margin:0;padding:0;'>
        <div class='card' style='background-color : #ffebf2;margin:0;padding:0;border:0;'>
        <img src='images/1.webp' style='width: 100%; height: 200px;object-fit: cover; object-position: 50% 80%; display: block;margin:0;padding:0;'>
        <table class='table table-hover'>
            <thead>
        <tr>
                <th>First name</th>
                <th>Last name</th>
            <th>Email id</th>
            <th>Member ID</th>
            <th>Trainer ID</th>
            </tr>   
            </thead>
            <tbody>";
        while ($row=mysqli_fetch_array($result)){
            $fname=$row ['fname'];
        $lname=$row['lname'];
        $email=$row['email'];
        $Member_id=$row['member_id'];
        $Trainer_id=$row ['Trainer_id'];
            echo " <tr>
            <td>$fname</td>
            <td>$lname</td>
            <td>$email</td>
            <td>$Member_id</td>
            <td>$Trainer_id</td>
            
            </tr>";
            }
            echo "
            </tbody></table></div></div></div>
            <div class='card-body' style='text-align: center;background-color : #ffebf2;margin:0;padding:0;'><a href='trainer_details.php' class='btn brn-light'>Go Back</a></div>";
    }
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        </body>
            </html>