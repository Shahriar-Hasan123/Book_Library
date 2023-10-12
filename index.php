<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.js"></script>
    <title>Books</title>
</head>
<body>
    <div class="container">
        <div class ="row">
            <div class="col-4"></div>
            <div class="col-4"></div>
            <div class="col-4">
                <form method="GET" action="search.php">
                    <input type="text" class="form-control mt-3" name="search" id="search" placeholder=" Search Book">
                    <input type="submit" name="search_btn" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="add.php" class="btn btn-primary mb-3 mt-3">ADD</a>

                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Available</th>
                            <th>Pages</th>
                            <th>Isbn</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $book_data = json_decode(file_get_contents("books.json"));
                        $index = 0;
                        if (!empty($book_data)) {
                            foreach ($book_data as $data) {
                        ?>
                                <tr>
                                    <td><?php echo $data->title; ?></td>
                                    <td><?php echo $data->author; ?></td>
                                    <td> <?php 
                                      if($data->available)
                                      echo "YES";
                                      else
                                      echo "NO";
                                    ?></td>
                                    <td><?php echo $data->pages;  ?></td>
                                    <td><?php echo $data->isbn;  ?></td>
                                    <td>
                                        <a href="update.php?index=<?php echo $index; ?>" class="btn btn-secondary">Update</a>
                                        <a href="delete.php?index=<?php echo $index; ?>" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                        <?php
                                $index++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>