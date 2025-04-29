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
        <div class="input-group">
            <input type="text" name="search" id="search" class="form-control" placeholder="Enter regno or name" onkeyup="getSearchData();" required>
            <div class="input-group-btn">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> Search
                </button>
                <button type="reset" class="btn btn-secondary">
                    <i class="fa fa-refresh"></i> Reset
                </button>
            </div>
        </div>
    </form>
</div>
        <hr class="text-primary">

        <div id="viewstudent">
            Student Records Here.........
        
    </div>
</hr>
<input type="text" class="form-control" id="myname">
<br>
    <button type="button" class="btn btn-info" id="showstudent" data-toggle="modal" data-target="#showstudent">
        <i class="fa fa-eye"></i> see more details </button> 


    <!-- Add Student Modal -->
    <div class="modal fade" id="addstudent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="text-primary">Add New Student</h3>
                    <button class="close" data-dismiss="modal"><i class="fa fa-window-close"></i></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" class="form">
                        <div class="form-group">
                            <label for="regno">RegN<sup>o</sup></label>
                            <input type="text" name="Regno" id="Regno" class="form-control" placeholder="Enter RegNo" required>
                        </div>
                        <div class="form-group">
                            <label for="firstname">FirstName</label>
                            <input type="text" name="FirstName" id="FirstName" class="form-control" placeholder="Enter First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">LastName</label>
                            <input type="text" name="LastName" id="LastName" class="form-control" placeholder="Enter Last Name" required>
                        </div>
                        <div class="form-group">
                            <label for="module">Module</label>
                            <select name="module" id="module" class="form-control" required>
                                <?php
                                $data=$obj->readAll("module","IDmdl");;
                                while($row=$data->fetch()){
                                    ?>
                                    <option value="<?php echo $row['IDmdl']; ?>"><?php echo $row['Modcode']; ?></option>
                                    <?php
                                }
                                ?>
                                
                            </select>
                        </div>
                        <div class="form-outline mb-4">
                            <label for="marks">Marks</label>
                            <input type="text" name="Marks" id="Marks" class="form-control" placeholder="Enter Marks" required>
                        </div>
                        <div class="form-group text-right">
                        <button type="submit" class="btn btn-primary" name="add" id="add">
                                <i class="fa fa-check"></i> Add
                            </button>
                            <button type="reset" class="btn btn-secondary" name="add">
                                <i class="fa fa-refresh"></i> Reset
                            </button>
                            
                        </div>
                    </form>
                    <!-- Add Student Logic -->
                    <?php
                    if(isset($_POST['add'])){
                      $send=$obj->InsertFiveCols("student",$_POST['Regno'],$_POST['FirstName'],$_POST['LastName'],$_POST['module'],$_POST['Marks']);
                        if($send){
                            echo "<script>alert('Student Added Successfully');</script>";
                        }else{
                            echo "<script>alert('Failed to add student');</script>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function getSearchData() {
        var xmldata = new XMLHttpRequest();
        xmldata.onreadystatechange = function() {
            if (xmldata.readyState == 4 && xmldata.status == 200) {
                document.getElementById('viewstudent').innerHTML = xmldata.responseText;
            }
        };
        var searchData = document.getElementById('search').value;
        xmldata.open("GET", "action.php?searchkey=" + encodeURIComponent(searchData), true);
        xmldata.send();
    }
      /*
    $(document).ready(function(){
      $('#myname').attr('placeholder','Enter your Name');
        $('#showstudent').click(function(){
          

           var name= $('#myname').val();
            alert(name+ 'well came to jquery script');
        })*/
        $(document).ready(function() {
    $('#add').click(function() {
        var Regno = $('#Regno').val();
        var FirstName = $('#FirstName').val();
        var LastName = $('#LastName').val();
        var IDmdl = $('#module').val(); // Corrected ID to match the select element's ID
        var Marks = $('#Marks').val();

        $.ajax({
            url: 'action.php',
            method: 'post',
            data: {
                Regno: Regno,
                FirstName: FirstName,
                LastName: LastName,
                IDmdl: IDmdl,
                Marks: Marks
            },
            success: function(data) {
                alert(data);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                alert('Failed to add student. Please try again.');
            }
        });
    });
});
</script>
</body>
</html>