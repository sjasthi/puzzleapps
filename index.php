<?php
require_once __DIR__.'/bootstrap.php';
require_once ROOT_DIR . '/db_configuration.php';
require_once ROOT_DIR . '/src/lib/functions.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SILC Puzzle Games</title>
    <link rel="icon" href="images/favico.ico">

    <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
   <?php
		printHeader();
		echo "<br/>";
		echo "<br/>";
		echo "<br/>";
	?>
	<div class="container">
	<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Puzzle
                    <small>Creators</small>
                </h1>
            </div>
			
    </div>
	<div class="col-lg-12">
    <div class="panel">
        <div class="panel-group">
            <div class="panel panel-primary">
               
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="bordering1">
                                <a href="WordFind/index.html">
                                    <h2>Word Ladder</h2>
                                    <img src="images/ladder.png" class="img-responsive">
                                </a>
                            </div>
                        </div> 
						<div class="col-xs-2">
                            <div class="bordering2">
                                <a href="WordFind/index.html">
                                    <h2>Word Find</h2>
                                    <img src="images/wordFind.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
						<div class="col-xs-2">
                            <div class="bordering1">
                                <a href="Dabble/index.php">
                                    <h2>Dabble</h2>
                                    <img src="images/dabble.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
						<div class="col-xs-2">
						    <div class="bordering2">
							    <a href="Wordoku/index.php">
								    <h2>Wordoku</h2>
								    <img src="images/wordoku.png" class="img-responsive">
							    </a>
						    </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering1">
                                <a href="Wordoku/index.php">
                                    <h2>Jumble</h2>
                                    <img src="images/jumble.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="Wordoku/index.php">
                                    <h2>7 Little Words</h2>
                                    <img src="images/7littlewords.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
						<div class="col-xs-2">
							<div class="bordering1">
								<a href="Crossword/index.php">
									<h2>Crossword</h2>
									<img src="images/join.jpeg" class="img-responsive">
								</a>
							</div>
						</div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="ScrambledShapes/indexshapes.html">
                                    <h2>Scrambled Shapes</h2>
                                    <img src="images/ScrambledShapes.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
						<div class="col-xs-2">
                            <div class="bordering1">
                                <a href="bingo/Bingo.php">
                                    <h2>Bingo</h2>
                                    <img src="images/bingo.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="Crossword/index.php">
                                    <h2>Scrambler</h2>
                                    <img src="images/scrambler.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering1">
                                <a href="ScrambledShapes/indexshapes.html">
                                    <h2>Rebus</h2>
                                    <img src="images/rebus.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="bingo/Bingo.php">
                                    <h2>Name in Synonyms</h2>
                                    <img src="images/synonyms.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        
					</div>
					<div class="row">
						<div class="col-xs-2">
                            <div class="bordering1">
                                <a href="Word_Match/index.html">
                                    <h2>Word Match</h2>
                                    <img src="images/wordMatch.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
						<div class="col-xs-2">
                            <div class="bordering2">
                                <a href="4pic1word/index.html">
                                    <h2>4 PICS 1 WORD</h2>
                                    <img src="images/4pic1word.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
						<div class="col-xs-2">
                            <div class="bordering1">
                                <a href="Whats/index.php">
                                    <h2>Whats The Name</h2>
                                    <img src="images/whats.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                            <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="Crossword/index.php">
                                    <h2>Quiz Master</h2>
                                    <img src="images/quizmaster.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering1">
                                <a href="ScrambledShapes/indexshapes.html">
                                    <h2>Text Twist</h2>
                                    <img src="images/texttwist.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="bingo/Bingo.php">
                                    <h2>Rank By X</h2>
                                    <img src="images/rankByX.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
			 	</div>
				<div class="row">
					<div class="col-xs-2">
                            <div class="bordering1">
                                <a href="QSFL/Index.php">
                                    <h2>Quote Scrambler</h2>
                                    <img src="images/FindTheWords.GIF" class="img-responsive">
                                </a>
                            </div>
                        </div>
					<div class="col-xs-2">
                            <div class="bordering2">
                                <a href="IndicTextAnalyzer/index.html">
                                    <h2>Text Analyzer</h2>
                                    <img src="images/IndicTextAnalyze.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
				  <div class="col-xs-2">
                            <div class="bordering1">
                                <a href="TestingLanguages1/Index.html">
                                    <h2>Logical Characters</h2>
                                    <img src="images/Test.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                            <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="Crossword/index.php">
                                    <h2>Pick n Assemble</h2>
                                    <img src="images/picknassemble.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering1">
                                <a href="ScrambledShapes/indexshapes.html">
                                    <h2>FillIn</h2>
                                    <img src="images/fillIn.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="crossword/crossword.php">
                                    <h2>Crossword (Skeleton)</h2>
                                    <img src="images/skeletonCrossword.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
			</div>
			<div class="row">
					<div class="col-xs-2">
                            <div class="bordering1">
                                <a href="Wordoku/index.php">
                                    <h2>wordoku</h2>
                                    <img src="images/wordoku.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="bordering2">
                                <a href="crossword/crosswordC.php">
                                    <h2>Crossword Classic</h2>
                                    <img src="images/classicCrossword.png" class="img-responsive">
                                </a>
                            </div>
                        </div>
                      
						</div>
                
                        </div>
                    </div>
                </div>

            </div>
        </div>
		</div>
	</div>
		 <?php
		
		printFooter();
		
		?>


</div>
</body>
</html>
