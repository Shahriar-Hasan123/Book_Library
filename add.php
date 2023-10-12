<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>ADD</title>
</head>

<body>
    <div class="container">
        <div class="mt-3 row">
            <div class="col-1"></div>
            <div class="col-8"><a href="index.php" class="btn btn-primary">Back</a></div>
            <div class="col-5"></div>
        </div>
        <div class="mb-3 row">
            <div class="col-1"></div>
            <div class="col-8">
                <form method="post">
                    <div class="mt-3 row">
                        <label for="title" class="col-sm-2 col-form-label">title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="author" class="col-sm-2 col-form-label">Author</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="available" class="col-sm-2 col-form-label">Available</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="available" name="available" placeholder="0 or 1" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="pages" class="col-sm-2 col-form-label">Pages</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pages" name="pages" required>
                        </div>
                    </div>
                    <div class="mt-3 row">
                        <label for="isbn" class="col-sm-2 col-form-label">ISBN</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                    </div>
                    <br><br>
                    <input type="submit" name="save" value="save" class="btn btn-primary">
                </form>
            </div>
            <div class="col-5"></div>
        </div>
    </div>
    <?php
    if (isset($_POST["save"])) {
        $data = json_decode(file_get_contents('books.json'),true);
        $input = array(
            "title" => $_POST["title"],
            "author" => $_POST["author"],
            "available" => (bool)$_POST["available"],
            "pages" => $_POST["pages"],
            "isbn" => $_POST["isbn"],
        );

        $data[] =$input;
        $data = json_encode($data, JSON_PRETTY_PRINT);
        file_put_contents("books.json", $data);
        header('location:index.php');
    }
    ?>
</body>

</html>