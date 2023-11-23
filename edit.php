<?php
session_start();
if (empty($_SESSION['email'])) {
    header("location: login.php?message=belum_login");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GymBro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body class="main" style="background-color: #252525;">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="Aset/logo.png" alt="Logo" width="45" class="d-inline-block align-text-middle">
                    GymBro
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="exercise.php">Exercise</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="schedule.php">Schedule</a>
                        </li>
                    </ul>
                </div>
                <a href="logout.php" class="btn btn-outline-danger " tabindex="-1" role="button" aria-disabled="true">Log Out</a>
            </div>
        </nav>
    </header>

    <main class="mt-2">
        <section>
            <h1 class="text-white text-center fw-bold mb-3">CREATE SCHEDULE</h1>
            <div class="container card" style="box-shadow: 9px 5px 10px 4px #000; width:30%;">
                <form action="edit_process.php" method="POST" class="p-4">
                    <div class="mb-4">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Exercise name...">
                    </div>
                    <div class="mb-4">
                        <label for="time" class="form-label">Time</label>
                        <input type="time" class="form-control" id="time" name="time">
                    </div>
                    <div class="mb-4">
                        <label for="date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="mb-4">
                        <label for="select" class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" id="select" name="type">
                            <option selected>Choose Type...</option>
                            <?php
                            $id = $_GET['id'];
                            include 'koneksi.php';
                            $sql = "SELECT * FROM exercise_type";
                            $query = mysqli_query($konek, $sql);
                            while ($data = mysqli_fetch_array($query)) {
                            ?>
                                <option value="<?= $data['id_type'] ?>"><?= $data['type_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <input type="hidden" name="id_schedule" value="<?= $id; ?>">
                    <div class="mb-4">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" aria-label="With textarea" id="description" name="description"></textarea>
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-outline-success fw-bold container-fluid">SUBMIT</button>
                    </div>
                </form>
            </div>
        </section>

    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>