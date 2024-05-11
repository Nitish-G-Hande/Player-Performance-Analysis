<?php
require_once("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id = $_GET['id'];
    $query = "SELECT * FROM matches WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
    $id=$row['id'];
    $cno = $row['cno'];
    $pname = $row['pname'];
    $nom = $row['nom'];
    $salary = $row['salary'];
} 
elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $cno = $_POST['cno'];
    $pname = $_POST['pname'];
    $nom = $_POST['nom'];
    $salary = $_POST['salary'];

    $query = "UPDATE matches SET cno = ?, pname = ?, nom = ?, salary = ? WHERE id = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "isiii", $cno, $pname, $nom, $salary,$id);

    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Record updated successfully.";
    } else {
        $error_message = "Error updating record: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Record</title>
</head>
<body class="bg-dark">
    <h3 style="color:white; text-align:center; margin-top:10px;">Edit Record</h3>
    <div class="container">
        <div class="row">
            <div class="col m-auto">
                <div class="card mt-5">
                    <?php
                    if (isset($success_message)) {
                        echo "<div class='alert alert-success'>$success_message</div>";
                    } elseif (isset($error_message)) {
                        echo "<div class='alert alert-danger'>$error_message</div>";
                    }
                    ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <div class="form-group">
                            <label for="cno">Cap Number</label>
                            <input type="text" class="form-control" id="cno" name="cno" value="<?php echo $cno; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="pname">Name</label>
                            <input type="text" class="form-control" id="pname" name="pname" value="<?php echo $pname; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">NO OF MATCHES</label>
                            <input type="number" class="form-control" id="nom" name="nom" value="<?php echo $nom; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="number" step="0.01" class="form-control" id="salaryr" name="salary" value="<?php echo $salary; ?>" required>
                        </div>
                        <button type="submit" name="edit" class="btn btn-primary">Update Record</button>
                        <a href="player_stats.php" class="btn btn-secondary">Back</a>
                    </form>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>