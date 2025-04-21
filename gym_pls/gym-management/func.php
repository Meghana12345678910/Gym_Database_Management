<?php
$con = mysqli_connect("localhost", "root", "", "loginsystem");

if (isset($_POST['register_submit'])) {


    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all fields'); window.location.href='register.php';</script>";
        exit();
    }

    // Hash password

    // Insert user into logintb
    $query = "INSERT INTO logintb (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Registration successful!'); window.location.href='index.php';</script>";
        exit();
    } else {
        echo "<script>alert('Error: Username might already exist.'); window.location.href='register.php';</script>";
    }
}



if (isset($_POST['login_submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM logintb WHERE username = '$username'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $storedPassword = $row['password'];

        // Verify the hashed password
        if ($password == $storedPassword) {
            header("Location: admin-panel.php");
            exit();
        } else {
            echo "<script>alert('Invalid password'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found'); window.location.href='index.php';</script>";
    }
}



if (isset($_POST['pat_submit'])) {
    // Get and sanitize the form data
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $Trainer_id = mysqli_real_escape_string($con, $_POST['Trainer_id']);
    $Package_id = mysqli_real_escape_string($con, $_POST['Package_id']);
    $start_date = mysqli_real_escape_string($con, $_POST['start_date']);
    $end_date = mysqli_real_escape_string($con, $_POST['end_date']);

    // Check if all required fields are filled
    if (!empty($fname) && !empty($lname) && !empty($email) && !empty($Trainer_id) && !empty($Package_id)) {
        
        // Define the insert query
        $query = "INSERT INTO members (fname, lname, email, Trainer_id, Package_id, start_date, end_date) 
                  VALUES ('$fname', '$lname', '$email', '$Trainer_id', '$Package_id', '$start_date', '$end_date')";

        // Execute the query
        if (mysqli_query($con, $query)) {
            // Get the last inserted member ID
            $member_id = mysqli_insert_id($con);

            // Show success message
            echo "<script>alert('New member registered successfully.')</script>";

            // You can optionally redirect to a different page
            echo "<script>window.open('admin-panel.php','_self')</script>";
        } else {
            // Show error if the query fails
            echo "Error: " . mysqli_error($con);
        }
    } else {
        echo "All fields are required!";
    }
}





if (isset($_POST['add_pack'])) {
    $Package_id = $_POST['Package_id'];
    $Package_name = $_POST['Package_name'];
    $Amount = $_POST['Amount'];

    // Check if any field is empty
    if (empty($Amount) || empty($Package_name) || empty($Package_id)) {
        echo "<script>alert('Please fill all required fields.');</script>";
        echo "<script>window.open('package.php','_self');</script>";
        exit();
    }

    // Check if the Package_id already exists
    $check_query = "SELECT * FROM Package WHERE Package_id = '$Package_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If Package_id exists, show an error message and exit
        echo "<script>alert('Error: Package ID already exists. Please enter a unique Package ID.');</script>";
        echo "<script>window.open('package.php','_self');</script>";
        exit();
    }

    // Insert the new package if the Package_id is unique
    $query = "INSERT INTO Package (Package_id, Package_name, Amount) VALUES ('$Package_id', '$Package_name', '$Amount')";
    if (mysqli_query($con, $query)) {
        echo "<script>alert('Package added successfully.');</script>";
        echo "<script>window.open('package.php','_self');</script>";
    } else {
        // Handle unexpected errors from the INSERT statement
        echo "<script>alert('Error adding package: " . mysqli_error($con) . "');</script>";
        echo "<script>window.open('package.php','_self');</script>";
    }
}






if (isset($_POST['tra_submit'])) {
    // Get the form data
    $Trainer_id = $_POST['Trainer_id'];
    $Name = $_POST['Name'];
    $phone = $_POST['phone'];

    // Check if all required fields are filled
    if (empty($Trainer_id) || empty($Name) || empty($phone)) {
        echo "<script>alert('Please fill all required fields.');</script>";
        echo "<script>window.open('trainer.php','_self');</script>";
        exit();
    }

    // Check if Trainer_id already exists
    $check_query = "SELECT * FROM Trainer WHERE Trainer_id = '$Trainer_id'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If Trainer_id exists, show an error message
        echo "<script>alert('Error: Trainer ID already exists. Please enter a unique Trainer ID.');</script>";
        echo "<script>window.open('trainer.php','_self');</script>";
        exit();
    }

    // Insert the trainer details into the database if Trainer_id is unique
    $query = "INSERT INTO Trainer (Trainer_id, Name, phone) VALUES ('$Trainer_id', '$Name', '$phone')";
    $result = mysqli_query($con, $query);

    if ($result) {
        // If insertion is successful
        echo "<script>alert('Trainer added successfully.');</script>";
        echo "<script>window.open('trainer.php','_self');</script>";
    } else {
        // If insertion fails, show the error
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        echo "<script>window.open('trainer.php','_self');</script>";
    }
}

if (isset($_POST['pay_submit'])) {
    // Debugging: Check if the form data is being submitted
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Get the form data
    $payment_id = $_POST['Payment_id'];
    $amount = $_POST['Amount'];
    $payment_type = $_POST['payment_type'];
    $member_id = $_POST['Member_id'];

    // Check if data is available
    if (empty($payment_id) || empty($amount) || empty($payment_type) || empty($member_id)) {
        echo "<script>alert('One or more required fields are empty.');</script>";
        echo "<script>window.open('payment.php','_self');</script>";
        exit();
    }

    // Connect to the database
    $connect = mysqli_connect("localhost", "root", "", "loginsystem");

    // Check if the connection was successful
    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check if the Payment_id already exists
    $check_query = "SELECT * FROM payment WHERE Payment_id = '$payment_id'";
    $check_result = mysqli_query($connect, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // If Payment_id exists, show an error message and exit
        echo "<script>alert('Error: Payment ID already exists. Please enter a unique Payment ID.');</script>";
        echo "<script>window.open('payment.php','_self');</script>";
        exit();
    }

    // Insert the payment details manually if Payment_id is unique
    $query = "INSERT INTO payment (Payment_id, Amount, payment_type, Member_id) 
              VALUES ('$payment_id', '$amount', '$payment_type', '$member_id')";

    // Execute the query
    if (mysqli_query($connect, $query)) {
        echo "<script>alert('Payment processed successfully.');</script>";
        echo "<script>window.open('payment.php','_self');</script>";
    } else {
        // Handle unexpected errors from the INSERT statement
        echo "<script>alert('Error processing payment: " . mysqli_error($connect) . "');</script>";
        echo "<script>window.open('payment.php','_self');</script>";
    }

    // Close the connection
    mysqli_close($connect);
}


if (isset($_POST['delete_package'])) {
    $package_id = $_POST['delete_id'] ?? null;

    if ($package_id) {
        // Step 1: Set Package_id to NULL in members table
        $update_query = "UPDATE members SET Package_id = NULL WHERE Package_id = ?";
        $stmt1 = mysqli_prepare($con, $update_query);
        mysqli_stmt_bind_param($stmt1, 'i', $package_id);
        mysqli_stmt_execute($stmt1);

        // Step 2: Now delete the package
        $delete_query = "DELETE FROM Package WHERE Package_id = ?";
        $stmt2 = mysqli_prepare($con, $delete_query);
        mysqli_stmt_bind_param($stmt2, 'i', $package_id);

        if (mysqli_stmt_execute($stmt2)) {
            echo "<script>alert('Package with ID $package_id deleted successfully.');</script>";
            echo "<script>window.open('package.php','_self');</script>";
        } else {
            echo "Error deleting package: " . mysqli_error($con);
        }
    } else {
        echo "Package ID not set.";
    }
}






if (isset($_POST['delete_trainer'])) {
    $delete_id = $_POST['delete_id'];

    // Step 1: Remove trainer reference from members
    $update_query = "UPDATE members SET trainer_id = NULL WHERE trainer_id = '$delete_id'";
    mysqli_query($con, $update_query);

    // Step 2: Delete trainer from trainer table
    $delete_query = "DELETE FROM trainer WHERE trainer_id = '$delete_id'";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Trainer deleted');</script>";
        echo "<script>window.location.href='trainer.php';</script>";
    } else {
        echo "<script>alert('Error deleting trainer');</script>";
    }
}



if (isset($_POST['delete_member'])) {
    $delete_id = $_POST['delete_id'];

    $update_payments = "UPDATE payment SET member_id = NULL WHERE member_id = '$delete_id'";
    mysqli_query($con, $update_payments);

    $delete_query = "DELETE FROM members WHERE member_id = '$delete_id'";
    $result = mysqli_query($con, $delete_query);

    if ($result) {
        echo "<script>alert('Member deleted');</script>";
        echo "<script>window.location.href='trainer_details.php';</script>";
    } else {
        echo "<script>alert('Error deleting member');</script>";
    }
}


if (!function_exists('get_patient_details')) {
    function get_patient_details() {
        global $con;
        // Explicitly select the necessary columns, including Member_id
        $query = "SELECT Member_id, fname, lname, email, Trainer_id, Package_id, start_date, end_date, status FROM members";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                // Check for the presence of 'Member_id' to avoid undefined index
                $member_id = isset($row['Member_id']) ? $row['Member_id'] : 'N/A';

                echo "<tr>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($row['fname']) . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($row['lname']) . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($row['email']) . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($member_id) . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . ($row['Trainer_id'] ? htmlspecialchars($row['Trainer_id']) : "Unassigned") . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . ($row['Package_id'] ? htmlspecialchars($row['Package_id']) : "Unassigned") . "</td>
                    <td style='border: 2px solid #ff87c3;'>
                        <form method='POST' action='trainer_details.php' onsubmit='return confirm(\"Are you sure you want to delete this member?\");'>
                            <input type='hidden' name='delete_id' value='" . htmlspecialchars($member_id) . "'>
                            <button type='submit' name='delete_member' class='btn btn-danger btn-sm'>Delete</button>
                        </form>
                    </td>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($row['start_date']) . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($row['end_date']) . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . htmlspecialchars($row['status']) . "</td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='10' style='border: 2px solid #ff87c3;'>No members found.</td></tr>";
        }
    }
}




if (!function_exists('get_package')) {
    function get_package() {
        global $con;
        $query = "SELECT * FROM Package";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $Package_id = $row['Package_id'];
            $Package_name = $row['Package_name'];
            $Amount = $row['Amount'];
            echo '<tr>
                    <td style="border: 2px solid #ff87c3; padding: 10px;">' . $Package_id . '</td>
                    <td style="border: 2px solid #ff87c3; padding: 10px;">' . $Package_name . '</td>
                    <td style="border: 2px solid #ff87c3; padding: 10px;">' . $Amount . '</td>
                    <td style="border: 2px solid #ff87c3; padding: 10px;">
                        <form method="POST" action="package.php" onsubmit="return confirm(\'Are you sure you want to delete this package?\');">
                            <input type="hidden" name="delete_id" value="' . $Package_id . '">
                            <button type="submit" name="delete_package" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                  </tr>';
        }
    }
}



if (!function_exists('get_trainer')) {
    function get_trainer() {
        global $con;
        $query = "select * from Trainer";
        $result = mysqli_query($con, $query);
        while ($row = mysqli_fetch_array($result)) {
            $Trainer_id = $row['Trainer_id'];
            $Name = $row['Name'];
            $phone = $row['phone'];
            echo "<tr>
                    <td style='border: 2px solid #ff87c3;'>$Trainer_id</td>
                    <td style='border: 2px solid #ff87c3;'>$Name</td>
                    <td style='border: 2px solid #ff87c3;'>$phone</td>
                    <td style='border: 2px solid #ff87c3;'>
                        <form method='POST' action='trainer.php' onsubmit='return confirm(\"Are you sure you want to delete this trainer?\");'>
                            <input type='hidden' name='delete_id' value='$Trainer_id'>
                            <button type='submit' name='delete_trainer' class='btn btn-danger btn-sm'>Delete</button>
                        </form>
                    </td>
                  </tr>";
        }
    }
}


if (!function_exists('get_payment')) {
    function get_payment() {
        global $con;

        $query = "SELECT * FROM Payment";
        $result = mysqli_query($con, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($con));
        }

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $Payment_id = $row['Payment_id'];
                $Amount = $row['Amount'];
                $payment_type = $row['payment_type'];
                $Member_id = $row['Member_id'] ?: 'Unidentified';
                $payment_activity = isset($row['payment_activity']) ? $row['payment_activity'] : 'Not Set';


                echo "<tr>
                        <td style='border: 2px solid #ff87c3;'>$Payment_id</td>
                        <td style='border: 2px solid #ff87c3;'>$Amount</td>
                        <td style='border: 2px solid #ff87c3;'>$payment_type</td>
                        <td style='border: 2px solid #ff87c3;'>$Member_id</td>
                        <td style='border: 2px solid #ff87c3;'>$payment_activity</td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td colspan='5' style='text-align:center; border: 2px solid #ff87c3;'>No payments found.</td>
                  </tr>";
        }
    }
}

if (!function_exists('get_member_trainer')) {
    function get_member_trainer() {
        global $con;

        // Query to join Members and trainer tables
        $query = "
            SELECT m.Member_id, m.fname AS Member_Name, 
                   t.Name AS Trainer_Name, t.phone AS Trainer_Contact
            FROM Members m
            INNER JOIN trainer t ON m.Trainer_id = t.Trainer_id
        ";

        // Execute the query
        $result = mysqli_query($con, $query);

        // Check if there are results
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and display each row
            while ($row = mysqli_fetch_array($result)) {
                $member_id = $row['Member_id'];
                $member_name = $row['Member_Name'];
                $trainer_name = $row['Trainer_Name'];
                $trainer_contact = $row['Trainer_Contact'];

                // Display the data in the table
                echo "<tr>
                        <td style='border: 2px solid #ff87c3;'>$member_id</td>
                        <td style='border: 2px solid #ff87c3;'>$member_name</td>
                        <td style='border: 2px solid #ff87c3;'>$trainer_name</td>
                        <td style='border: 2px solid #ff87c3;'>$trainer_contact</td>
                      </tr>";
            }
        } else {
            // If no records found
            echo "<tr><td colspan='5' style='text-align: center;'>No records found</td></tr>";
        }
    }
}

if(!function_exists('get_notifications')){
function get_notifications() {
    global $con;
    // Query to get all notifications
    $query = "SELECT * FROM notifications ORDER BY notification_date DESC";
    $result = mysqli_query($con, $query);

    // Check if there are notifications
    if (mysqli_num_rows($result) > 0) {
        // Start the table

        // Loop through the result and display each notification
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td style='border: 2px solid #ff87c3;'>" . $row['notification_id'] . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . $row['member_id'] . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . $row['message'] . "</td>
                    <td style='border: 2px solid #ff87c3;'>" . $row['notification_date'] . "</td>
                </tr>";
        }

        // End the table
        echo "</table>";
    } else {
        echo "No notifications found.";
    }
}
}

if(!function_exists('get_member_payment_package')){
    function get_member_payment_package() {
        global $con;
        $query = "
            SELECT 
                m.Member_id,
                m.fname,
                p.Payment_id,
                p.Amount AS payment_amount,
                pk.Package_id AS package_id,
                pk.Package_name,
                pk.Amount AS package_amount
            FROM members m
            JOIN payment p ON m.Member_id = p.Member_id
            JOIN package pk ON m.Package_id = pk.Package_id
        ";
    
        $result = mysqli_query($con, $query);
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td style='border: 2px solid #ff87c3;'>{$row['Member_id']}</td>
                    <td style='border: 2px solid #ff87c3;'>{$row['fname']}</td>
                    <td style='border: 2px solid #ff87c3;'>{$row['Payment_id']}</td>
                    <td style='border: 2px solid #ff87c3;'>{$row['payment_amount']}</td>
                    <td style='border: 2px solid #ff87c3;'>{$row['package_id']}</td>
                    <td style='border: 2px solid #ff87c3;'>{$row['Package_name']}</td>
                    <td style='border: 2px solid #ff87c3;'>{$row['package_amount']}</td>
                  </tr>";
        }
    }
    
}



?>
