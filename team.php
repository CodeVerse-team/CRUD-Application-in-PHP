<?php include 'db_conn.php';?>
<?php include 'header.php';?>
<?php include 'insert_data.php';?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<div class="container">
        <div class="box1">
            <h2>All Core & Team Members.</h2> 
            <button id="openModalBtn" class="btn btn-primary" style="float: right; margin: 12px;">ADD MEMBERS</button>
        </div>
        <table class="table table-hover table-bordered table-striped" style="font-size: 18px; padding: 25px;">
            <tr class='table-dark'>
                <th scope="col">Sr.No</th>
                <th scope="col">Names</th>
                <th scope="col">Position</th>
                <th scope="col">Stack Technology</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
            </tr>
            <tbody> 
                <?php
                $query = "SELECT * FROM `members`";
                $result = mysqli_query($conn, $query);

                if (!$result) {
                    die("Query failed: " . mysqli_error($conn));
                } else {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <style>
                .a{
                    font-size: 18px;
                }
                </style>
                    <tr>
                        <td scope="row"><?php echo $row['id'] ?></td>
                        <td scope="row"><?php echo $row['first_name'] ?></td>
                        <td scope="row"><?php echo $row['position'] ?></td>
                        <td scope="row"><?php echo $row['technology'] ?></td>
                        <td scope="row"><a href="updatepage.php?id=<?php echo $row['id']; ?>"class="btn btn-success">Update</a></td>
                        <td scope="row"><a href="deletepage.php?id=<?php echo $row['id']; ?>"class="btn btn-danger">Delete</a></td>
                    </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        if(isset($errorMessage)){
            echo "<h3 class='text-center text-danger'>$errorMessage</h3>";
        }
        if(isset($errorMessage2)){
            echo "<h3 class='text-center text-danger'>$errorMessage2</h3>";
        }
        if(isset($_GET['update_msg'])){
            echo "<h3 class='text-center text-success'>".$_GET['update_msg']."</h3>";
        }
        if(isset($_GET['delete_msg'])){
            echo "<h3 class='text-center text-danger'>".$_GET['delete_msg']."</h3>";
        }
        ?>
    </div>

    <form action="" method="post">
        <div id="myModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add Members</h2>
                <div class="modal-body">
                <div class="form-group">
                    <label for="fname">Name:</label>
                    <input type="text" name="firstname" class="form-control">
                </div>
                <div class="form-group">
                    <label for="position">Position:</label>
                    <input type="text" name="position" class="form-control">
                </div>
                <div class="form-group">
                    <label for="st_tech">Stack Technology:</label>
                    <input type="text" name="st_tech" class="form-control">
                </div>
                <div class="modal-footer">
                    <button id="closeModalBtn" class="btn btn-secondary">Close</button>
                    <input type="submit" class="btn btn-success" name="add_mem" value="ADD Member">
                </div>
                </div>
            </div>
        </div>
    </form>
    
<?php include 'footer.php';?>
