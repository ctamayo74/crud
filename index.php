<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CRUD</title>

    <!-- Bootstrap CSS -->
    <link href="plugins/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <form action="controllers/process.php" method="POST">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="input-group-text" value="Enter your name">
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" class="input-group-text" value="Enter your location">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="save">Save</button>
                </div>
            </form>
        </div>
    </div>
    
    <?php require_once 'controllers/process.php'; ?>

    <?php
        $mysqli = new mysqli('localhost:3306','root','','crud') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM data") or die($mysqli->error);
        //pre_r($result);
        //pre_r($result->fetch_assoc());?>
    <div class="container">
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Location</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <?php 
                    while ($row = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo $row['location'];?></td>
                        <td></td>
                    </tr>
                <?php }; ?>
            </table>
        </div>

        <!--this function get the information of the table data and print it out-->
        <?php 
        function pre_r($array){
            echo '<pre>';
            print_r($array);
            echo '</pre>';
        }
        ?>
    </div>
    
    <script src="plugins/bootstrap-5.1.3-dist/js/bootstrap.bundle.js"></script>
    <script src="plugins/jquery-3.6.0.min.js"></script>
</body>
</html>