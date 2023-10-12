<?php
if (isset($_GET["search_btn"])) {
    $search = $_GET["search"];
    $books=json_decode(file_get_contents("books.json"),true);
    $books = array_filter($books, function ($a) use ($search) {
        return ($a["title"] == $search || $a["isbn"] == $search);
    });
    foreach ($books as $book) {
        echo "Title : {$book["title"]}<br>";
        echo "Author : {$book["author"]}<br>";
        echo "Available : {$book["available"]}<br>";
        echo "Pages : {$book["pages"]}<br>";
        echo "ISBN : {$book["isbn"]}<br>";

    }
}
