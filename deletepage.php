<?php include('db_conn.php')?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    $query = "DELETE from `members` WHERE `id` = '$id'";

    $result = mysqli_query($conn, $query);

    if(!$result){
        die("Query Failed" . mysqli_error($conn));
    }
    else{
        header('location:team.php?delete_msg=You have Deleted the Details.');
    }

?>