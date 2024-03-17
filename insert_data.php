<?php
// Check if form is submitted
if(isset($_POST['add_mem'])){
    $fname =  $_POST['firstname'];
    $pos =  $_POST['position'];
    $tech =  $_POST['st_tech'];

    if($fname == "" || empty($fname)){
        $errorMessage = "You Need to Fill the First Name.";
    } elseif($pos == "" || empty($pos)) {
        $errorMessage = "You Need to Fill the Position Also.";
    } elseif($tech == "" || empty($tech)) {
        $errorMessage = "You Need to Fill the Technology Also.";
    } else {
        
        // Use prepared statement to prevent SQL injection
        $sql = "INSERT INTO `members`(`first_name`, `position`, `technology`) VALUES ($f_name, $pos, $tech)";
        $result = mysqli_query($conn, $query);
        $stmt = mysqli_prepare($conn, $sql);

        // Check if prepared statement was successful
        if ($stmt) {
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "sss", $fname, $pos, $tech);

            // Execute statement
            if (mysqli_stmt_execute($stmt)) {
                $errorMessage = "<h3 class='text-center text-success'>Your Data Has Been Added Successfully</h3>";
            } else {
                $errorMessage = "Error executing statement: " . mysqli_stmt_error($stmt);
            }

            // Close statement
            mysqli_stmt_close($stmt);
        } else {
            $errorMessage = "Error preparing statement: " . mysqli_error($conn);
        }
    }
}
?>