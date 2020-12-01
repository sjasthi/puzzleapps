<?php
$nav_selected = "ADMIN";
$left_buttons = "YES";
$left_selected = "PUZZLES";

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

        <h1>Create Puzzles</h1>
        <h2>Import Puzzle Metadata</h2>
        <p>Please ensure your CSV file has a header row and a comma-separated value for the following on each line:</p>
            <ul>
                <li>Title (string)</li>
                <li>Sub-Title (string)</li>
                <li>App ID (integer value of the app this puzzle belongs to)</li>
                <li>Author ID (integer value of the user that authored this puzzle)</li>
                <li>Directions (string)</li>
                <li>Notes (string)</li>
                <li>Puzzle Image (string, the filename of the image in the main directory mentioned above)</li>
                <li>Solution Image (string, the filename of the image in the solution directory mentioned above)</li>
            </ul>
        <p>The first row will be skipped upon import, so it is important the first row does NOT contain a puzzle you wish to import.<br/>
        The image columns should contain the image name only, with the extension (gif, jpg, jpeg, png). For example: puzzle_image.png</p>
        <form class="form" name="upload-metadata" action="puzzles_create_puzzles.php" method="POST" enctype="multipart/form-data">
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
        <h2>Import Puzzle Images</h2>
        <p>Now we will import the puzzle images named in your csv file import above.<br/>
        Ensure all puzzle images needed are located in the same directory so they can all be selected at the same time.<br/>
        Once all the images have been selected, click the Import Puzzle Images button to add them to our puzzle image database.</p>
        <form class="form" name="upload-puzzle-images" action="puzzles_create_puzzle_images.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Select Puzzle Images</legend>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="file" name="puzzle-images-file[]" id="puzzle-images-file" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" id="submit-puzzle-images" name="import-puzzle-images" class="btn btn-primary button-loading" data-loading-text="Loading...">
                            Import Puzzle Images
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
        <hr>
        <h2>Import Solution Images</h2>
        <p>Now we will import the solution images named in your csv file import above.<br/>
            Ensure all solution images needed are located in the same directory so they can all be selected at the same time.<br/>
            Once all the images have been selected, click the Import Solution Images button to add them to our solution image database.</p>
        <form class="form" name="upload-solution-images" action="puzzles_create_solution_images.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Select Solution Images</legend>
                <div class="form-group">
                    <div class="col-md-4">
                        <input type="file" name="solution-images-file[]" id="solution-images-file" multiple>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-4">
                        <button type="submit" id="submit-solution-images" name="import-solution-images" class="btn btn-primary button-loading" data-loading-text="Loading...">
                            Import Solution Images
                        </button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
</body>

<?php include("footer.php"); ?>
