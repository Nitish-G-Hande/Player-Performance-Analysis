<?php 

    require_once("config/db.php");
    
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $cno = $_POST['cno'];
        $pname = $_POST['pname'];
        $nom = $_POST['nom'];
        $salary = $_POST['salary'];
    
        $query = "UPDATE matches SET cno = ?, pname = ?, nom = ?, salary = ? WHERE id = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "isiii",$cno, $pname, $nom, $salary,$id);
    
        if (mysqli_stmt_execute($stmt)) {
            $success_message = "Record updated successfully.";
        } else {
            $error_message = "Error updating record: " . mysqli_error($con);
        }
    
        mysqli_stmt_close($stmt);
    }

    $query = " select * from matches";
    $result = mysqli_query($con,$query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Player Stats</title>
    <style>
        tr {
            text-align:center;
        }
        .one{
           font-weight: bold;
        }
        .botnav {
  overflow: hidden;
  padding-left:20px;
  padding-right:70px;
  margin-left:655px; 
  margin-right:650px;
}
body {
      background: linear-gradient(135deg, #757F9A,#D7DDE8);
      background-size: 400% 400%;
      animation: gradientAnimation 5s ease infinite;
      color: #fff;
    }

    @keyframes gradientAnimation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
    </style>
</head>
<body class="bg-dark">
<h3 style="color:brown; text-align:center;margin-top:10px;" >PLAYER STATS</h3>
        <div class="container">
            <div class="row">
                <div class="col m-auto">
                    <div class="card mt-3">
                        
                        <table class="table table-bordered">
                            <tr class="one">
                                <td>Cap Number</td>
                                <td>Player Name</td>
                                
                                <td>No of Matches</td>
                                <td>Salary</td>
                                <td>Edit</td>
                                <td>Delete</td>
                            </tr>

                            <?php 
                                    
                                    while($row=mysqli_fetch_assoc($result))
                                    {
                                        $cno = $row['cno'];
                                        $pname = $row['pname'];
                                    
                                        $nom = $row['nom'];
                                        $salary = $row['salary'];
                            ?>
                                    <tr>
                                        <td><?php echo $cno ?></td>
                                        <td><?php echo  $pname ?></td>
                                        
                                        <td><?php echo $nom ?></td>
                                        <td><?php echo $salary ?></td>
                                        <td><a href="edit_record.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a></td>
                                        <td><a href="#" class="btn btn-danger">Delete</a></td>
                                    </tr>        
                            <?php 
                                    }  
                            ?>                                                                    
                                   

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="botnav">
        <a href="2.html" class='btn btn-primary'>Back</a>
        </div>
        <br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>