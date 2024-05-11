 <?php
require_once("config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cnum = $_POST['cnum'];
    $plname = $_POST['plname'];
    $totalruns = $_POST['totalruns'];
    $sr = $_POST['sr'];
    $average = $_POST['average'];
    $hs = $_POST['hs'];
    $noto = $_POST['noto'];

    $query = "INSERT INTO batting (cnum, plname, totalruns, sr, average, hs, noto) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "isidiii", $cnum, $plname, $totalruns, $sr, $average, $hs, $noto);

    if (mysqli_stmt_execute($stmt)) {
        $success_message = "Record added successfully.";
    } else {
        $error_message = "Error adding record: " . mysqli_error($con);
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
    <title>Add Record</title>
</head>
<body class="bg-dark">
    <h3 style="color:white; text-align:center; margin-top:10px;">Add New Record</h3>
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
                        <div class="form-group">
                            <label for="cnum">Cap Number</label>
                            <input type="text" class="form-control" id="cnum" name="cnum" required>
                        </div>
                        <div class="form-group">
                            <label for="plname">Name</label>
                            <input type="text" class="form-control" id="plname" name="plname" required>
                        </div>
                        <div class="form-group">
                            <label for="totalruns">Runs</label>
                            <input type="number" class="form-control" id="totalruns" name="totalruns" required>
                        </div>
                        <div class="form-group">
                            <label for="sr">Strike-Rate</label>
                            <input type="number" step="0.01" class="form-control" id="sr" name="sr" required>
                        </div>
                        <div class="form-group">
                            <label for="average">Average</label>
                            <input type="number" step="0.01" class="form-control" id="average" name="average" required>
                        </div>
                        <div class="form-group">
                            <label for="hs">Highest-Score</label>
                            <input type="number" class="form-control" id="hs" name="hs" required>
                        </div>
                        <div class="form-group">
                            <label for="noto">Not-Outs</label>
                            <input type="number" class="form-control" id="noto" name="noto" required>
                        </div>
                        <button type="submit" name="add" class="btn btn-primary">Add Record</button>
                        <a href="batting_stats.php" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>