<?php 
    include 'db_conn.php';
    include 'header.php'; 
?>

<style>
    .container {
        margin-top: 50px;
        background-color: #77a09d;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .form-label {
        font-weight: 500;
        color: #fc0;
        font-size: 18px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 15px;
        box-sizing: border-box;
        transition: border-color 0.3s;
    }
    .form-control:focus {
        border-color: #007bff;
        outline: none;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, .25);
    }
    .form-group {
        margin-bottom: 20px;
    }
</style>

<?php    
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM `members` WHERE `id` = '$id'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        } else {
            $row = mysqli_fetch_assoc($result);
        }
    }

    if(isset($_POST['update_mem'])){
        if(isset($_GET['id'])){
            $id_new = $_GET['id'];
        }
        $fname = $_POST['firstname'];
        $pos = $_POST['position'];
        $tech = $_POST['st_tech'];

        $query2 = "UPDATE `members` SET `first_name` = '$fname', `position` = '$pos', `technology` = '$tech' WHERE `id` = '$id_new'";

        $result = mysqli_query($conn, $query2);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        } else {
            header('location: team.php?update_msg=You Have Successfully Updated the Data');
        }
    }
 ?>

<div class="container">
    <form action="updatepage.php?id=<?php echo $id; ?>" method="post">
        <div class="modal-body">
            <div class="form-group">
                <label for="firstname" class="form-label">Name:</label>
                <input type="text" name="firstname" class="form-control" id="firstname" value="<?php echo $row['first_name']; ?>">
            </div>
            <div class="form-group">
                <label for="position" class="form-label">Position:</label>
                <input type="text" name="position" class="form-control" id="position" value="<?php echo $row['position']; ?>">
            </div>
            <div class="form-group">
                <label for="st_tech" class="form-label">Stack Technology:</label>
                <input type="text" name="st_tech" class="form-control" id="st_tech" value="<?php echo $row['technology']; ?>">
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger">Cancel</button>
                <input type="submit" class="btn btn-success" name="update_mem" value="Update Member">
            </div>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
