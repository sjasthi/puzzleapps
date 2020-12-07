<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "BOOKS";

require_once __DIR__ . '/bootstrap.php';
include(ROOT_DIR . '/nav.php');
require ROOT_DIR . '/db_configuration.php';

?>
<head>
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">-->
    <!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="right-content">
    <div class="container">

        <h1>Bulk Book Management</h1>
        <h2>Import Books Metadata</h2>
        <p>Please ensure your CSV file has a header row and a comma-separated value for the following on each line:</p>
        <ul>
            <li>Title (string)</li>
            <li>Author ID (integer value of the user that authored this book)</li>
            <li>Directions (string)</li>
            <li>Notes (string)</li>
            <li>Front Cover Image (string, the filename of the image in the main directory mentioned above)</li>
            <li>Back Cover Image (string, the filename of the image in the solution directory mentioned above)</li>
        </ul>
        <p>The first row will be skipped upon import, so it is important the first row does NOT contain a book you wish to import.<br/>
            The image columns should contain the image name only, with the extension (gif, jpg, jpeg, png). For example: cover_image.png</p>
        <form class="form" name="upload-metadata" action="books_create_books.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Select Directory</legend>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="file" name="metadata-file" id="metadata-file" class="input-large">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" id="submit-metadata" name="import-metadata" class="btn btn-primary button-loading" data-loading-text="Loading...">
                            Import Metadata
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
        <hr>
        <h2>Import Book Images</h2>
        <p>Upload front and back cover images for your books.<br/>
            Once all the images have been selected, click the Import Book Images button to add them to the book image database.</p>
        <form class="form" name="upload-book-images" action="books_create_book_images.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Select Book Images</legend>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="file" name="book-images-file[]" id="book-images-file" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" id="submit-book-images" name="import-book-images" class="btn btn-primary button-loading" data-loading-text="Loading...">
                            Import Book Images
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
        <hr>
    </div>
</div>
</body>

<?php include("footer.php"); ?>
