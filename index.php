<?php

require_once'db.php';

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $age = $_POST['age'];

    $sql = "INSERT INTO users(fullname,age) VALUES(:fullname,:age)";

    $query = $conn->prepare($sql);
    $query->bindParam(':fullname', $fullname, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $conn->lastInsertId();

    if ($lastInsertId) {
        echo "<script>alert('رکورد".$fullname." با موفیقیت درج شد');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error');</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <title>پروژه اول</title>
</head>
<body>




    <section class="container pt-5">
        <form class="shadow p-4 mb-5 bg-body rounded " method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">نام ونام خانوادگی</label>
                <input type="text" class="form-control" id="fullname" name="fullname">
            </div>
            <div class="mb-3">
                <label for="age" class="form-label">سن</label>
                <input type="text" class="form-control" id="age" name="age"  maxlength="2"  oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');">
            </div>
     

            <button type="submit" class="btn btn-primary" name="submit">ثبت</button>
        </form>
        <hr class="w-100">

        <table class="table mt-5">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">سن</th> 
                </tr>
            </thead>
            <tbody>
            <?php
            $sql = "SELECT fullname,age FROM users";
            $query = $conn->prepare($sql);
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            

            $counter = 1;
            if($query->rowCount() > 0){
            foreach ($results as $result) {
            ?>
                <tr>
                <th scope="row"><?php echo htmlentities($counter) ?></th>
                <td><?php echo htmlentities($result->fullname) ?></td>
                <td><?php echo htmlentities($result->age) ?></td>
                </tr>
            <?php
            $counter++;
            }}
                ?>
            </tbody>
        </table>


    </section>























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>