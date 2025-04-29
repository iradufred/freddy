<?php
include 'db_query.php';
$obj = new db_query();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Information Management System</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-primary">
            Student Information Management System
        </h2>
        
        <button class="btn btn-primary" data-toggle="modal" data-target="#addstudent">
            <i class="fa fa-plus"></i> Add Student
        </button>
        <hr>
        <div>
            <form action="" method="post" class="form">
                <label for="search">Search Student</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Enter regno or name" required>
            </form>
        </div>
        <hr class="text-primary">
        <div class="viewstudent">
            Student Records Here.........
        </div>
    </div>

    <!-- Add Student Modal -->
    <div class="modal fade" id="addstudent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-primary">Add New Student</h3>
                    <button class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form">
                        <div class="form-group">
                            <label for="regno">Regno</label>
                            <input type="text" name="regno" id="regno" class="form-control" placeholder="Enter regno" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter first name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter last name" required>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="form-label">Module</label>
                            <select name="module" class="form-control">
                                <?php
                                $data=$obj->readAll('module', 'IDmdl');
                                while($row=$data->fetch()){
                                ?>
                                <option value="<?php echo $row['IDmdl']?>"><?php echo $row['Modcode'];?></option>
                               <?php
                                }
                               ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="marks">Marks</label>
                            <input type="text" name="marks" id="marks" class="form-control" placeholder="Enter marks" required>
                        </div>
                        <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check"></i> Add
                            </button>
                            <button type="reset" class="btn btn-secondary">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>