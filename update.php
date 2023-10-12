<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Update</title>
</head>

<body>
    <?php
    $index = $_GET["index"];
    $contents = file_get_contents("books.json");
    $data_array = json_decode($contents, true);
    $row = $data_array[$index];
    if (isset($_POST["save"])) {
        $input = array(
            "title" => $_POST["title"],
            "author" => $_POST["author"],
            "available" => (bool)$_POST["available"],
            "pages" => $_POST["pages"],
            "isbn" => $_POST["isbn"]
        );

        $data_array[$index] = $input;
        $data = json_encode($data_array, JSON_PRETTY_PRINT);
        file_put_contents("books.json", $data);
        header("location:index.php");
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8"><a href="index.php" class="btn btn-primary mb-3 mt-3">Back</a></div>
            <div class="col-5"></div>
        </div>
        <div class="row">
            <div class="col-1"></div>
            <div class="col-8">
                <form method="post">
                    <div class="mt-3 row">
                        <label for="title" class="col-sm-2 col-form-label">title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="<?php echo $row["title"] ?>" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" name="author" value="<?php echo $row["author"] ?>" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="available" class="col-sm-2 col-form-label">Available</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="available" name="available" value="<?php echo $row["available"] ?>" placeholder="0 or 1" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="pages" class="col-sm-2 col-form-label">Pages</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pages" name="pages" value="<?php echo $row["pages"] ?>" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $row["isbn"] ?>" required>
                        </div>
                    </div>
                    <br><br>
                    <input type="submit" name="save" value="save" class="btn btn-primary">
                </form>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
</body>

</html>