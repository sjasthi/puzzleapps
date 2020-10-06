<?php
require_once __DIR__.'/../bootstrap.php';
require_once ROOT_DIR . '/bin/Tokens.php';
require_once ROOT_DIR . '/bin/user.php';
require_once ROOT_DIR . '/bin/Connection.php';

function displayPuzzleCreatorInformation($puzzleCreator)
{
	
	if(!$puzzleCreator == null)
	{
		echo " <div class=\"col-md-4\">\n";
			echo "<form action=\"PuzzleCreatorUpdateIcon.php\" class=\"dropzone\">";
		echo "<div class=\"dz-message\" data-dz-message><span>Drop new icon here.\n Or click here to select.</span></div>";
		if (file_exists($puzzleCreator->icon)) {
			echo "                    <img class=\"img-responsive img-hover\" src='" . $puzzleCreator->icon . "' alt=\"\">\n";
			} else {
				echo "                    <img class=\"img-responsive img-hover\" src=\"images\puzzles\default.png\" alt=\"\">\n";
			}
		echo "<input hidden='true' type='text' name='id' value='" . $puzzleCreator->puzzleCreatorId . "'/>";
		//echo "<input type=\"file\" name=\"file\" />";
		echo "</form>";
		echo "<form action=\"PuzzleCreatorDeleteIcon.php\" method=\"post\">";
		echo "<input hidden='true' type='text' name='id' value='" . $puzzleCreator->puzzleCreatorId . "'/>";
		echo "<button class=\"btn btn-link\" role=\"link\" type=\"submit\" value=\"submit\">Delete Icon</button></form>";
		echo "</div>";
	}
	
	
    echo " <div class=\"col-md-6\">\n";
    echo " <h1>" . ($puzzleCreator != null ? $puzzleCreator->puzzleCreatorName : '') . "</h1>\n";
    if ($puzzleCreator != null) {
        echo "<h3>Edit Puzzle Creator Details <br/> (Token: " . $puzzleCreator->token . " )</h3>\n";
    } else {
        echo " <h3>Enter Puzzle Creator Details</h3>\n";
    }
	if ($puzzleCreator != null)
	{
    	echo "  <form name=\"puzzleCreateedit\" id=\"puzzleedit\"   action='puzzleCreatorSave.php' method='post' enctype=\"multipart/form-data\" novalidate>";
		echo "<input hidden='true' type='text' name='id' value='" . $puzzleCreator->puzzleCreatorId . "'/>";
	}
	else
	{
		echo "  <form name=\"puzzleCreateedit\" id=\"puzzleedit\"   action='createPuzzleCreator.php' method='post' enctype=\"multipart/form-data\" novalidate>";
		echo "<input hidden='true' type='text' name='id' value='-1'/>";
	}
	
	//Name
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Name:</label>\n";
    echo "          <input class=\"form-control\" name='name' value=\"" . ($puzzleCreator != null ? $puzzleCreator->puzzleCreatorName : '') . "\" 
                        required data-validation-required-message=\"Please enter the name.\"  maxlength=\"500\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//description
	 echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Description:</label>\n";
    echo "         <textarea rows=\"5\" class=\"form-control\" name='description'
                          maxlength=\"5000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">" . ($puzzleCreator != null ? $puzzleCreator->puzzleCreatorDescription : '') . "</textarea>";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//notes
	 echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Notes:</label>\n";
    echo "         <textarea rows=\"5\" class=\"form-control\" name='notes'
                        maxlength=\"5000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">" . ($puzzleCreator != null ? $puzzleCreator->notes : '') . "</textarea>";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//Playable
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "			<input name=\"playable\" type=\"checkbox\" " . ($puzzleCreator != null && $puzzleCreator->playable == 1?  "checked" : '') . "> Playable Puzzles</input>";
    echo "      </div>\n";
    echo "  </div>";
	//inputFromUI
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "			<input name=\"inputFromUI\" type=\"checkbox\" " . ($puzzleCreator != null && $puzzleCreator->inputFromUI == 1?  "checked" : '') . "> Input from UI</input>";
    echo "      </div>\n";
    echo "  </div>";
	//inputFromDB
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "			<input name=\"inputFromDB\" type=\"checkbox\" " . ($puzzleCreator != null && $puzzleCreator->inputFromDatabase == 1?  "checked" : '') . "> Input from DB</input>";
    echo "      </div>\n";
    echo "  </div>";
	//ouputToUI
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "			<input name=\"ouputToUI\" type=\"checkbox\" " . ($puzzleCreator != null && $puzzleCreator->outputToUI == 1?  "checked" : '') . "> Output to UI</input>";
    echo "      </div>\n";
    echo "  </div>";
	//ouputToDB
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "			<input name=\"ouputToDB\" type=\"checkbox\" " . ($puzzleCreator != null && $puzzleCreator->outputToDatabase == 1?  "checked" : '') . "> Output to DB</input>";
    echo "      </div>\n";
    echo "  </div>";
	//Developer
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Developer:</label>\n";
    echo "          <input class=\"form-control\" name='developer' value=\"" . ($puzzleCreator != null ? $puzzleCreator->developedBy : '') . "\" 
                         maxlength=\"500\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
    //Status
	echo "<div class=\"form-group\">";
  	echo "	<label for=\"status\">Status:</label>";
  	echo "		<select class=\"form-control\" id=\"status\" name=\"status\">";
	if ($puzzleCreator == null)
	{
    	echo "			<option value=\"1\">Active</option>";
    	echo "			<option value=\"2\">Inactive</option>";
    	echo "			<option value=\"3\">Obsolete</option>";
	}
	else
	{
		if($puzzleCreator->status == 1)
		{
			echo "		<option value=\"1\" selected>Active</option>";
		}
		else{
			echo "			<option value=\"1\">Active</option>";
		}
		if($puzzleCreator->status == 2)
		{
			echo "		<option value=\"2\" selected>Inactive</option>";
		}
		else{
			echo "			<option value=\"2\">Inactive</option>";
		}
		if($puzzleCreator->status == 3)
		{
			echo "		<option value=\"3\" selected>Obsolete</option>";
		}
		else{
			echo "			<option value=\"3\">Obsolete</option>";
		}
		
	}
  	echo "		</select>";
	echo "</div>";
	//image
	if ($puzzleCreator == null) {
        echo "        <div class=\"control-group form-group\">\n";
        echo "          <div class=\"controls\">\n";
        echo "              <label>Puzzle Creator Image:</label>\n";
        echo "                <input type=\"file\" name=\"fileToUpload\"  id=\"fileToUpload\" >";
        echo "          <p class=\"help-block\"></p><br/><br/>\n";
        echo "      </div>\n";
        echo "  </div>";

        echo " <div id=\"success\"></div>";
    }
	

	
	
    echo " <button class='btn btn-primary' type='submit' value='Save'>Save</button>\t";

    if (!$puzzleCreator == null) {
        echo printNormalButton("Cancel", ("creators.php"), false);
    } else {
        echo printNormalButton("Cancel", ("creators.php"), false);
    }
    echo "                </form>";


    if (!$puzzleCreator == null) {
		echo "<br/>";
        if($puzzleCreator->numPuzzles > 0)
								{
									echo "                <form action='PuzzleCreatorDelete.php' method='post' onsubmit='return confirm(\"Do you really want to delete " . $puzzleCreator->puzzleCreatorName . "? " . (($puzzleCreator->numPuzzles > 1)?	 $puzzleCreator->numPuzzles ." puzzles " : $puzzleCreator->numPuzzles ." puzzle ") . "will be deleted.\");'>";
								}
								else
								{
									echo "                <form action='PuzzleCreatorDelete.php' method='post' onsubmit='return confirm(\"Do you really want to delete " . $puzzleCreator->puzzleCreatorName . "?\");'>";
								}
        echo "                <input hidden='true' type='text' name='id' value=\"" . $puzzleCreator->puzzleCreatorId . "\">";
        echo "                <button class='btn btn-danger' type='submit'>Delete <span class=\"glyphicon glyphicon-trash\"</span></button>";
        echo "                </form>";
    }
}
function displayPuzzleView($puzzle)
{
	 
	if(!$puzzle == null)
	{
		echo " <div class=\"col-md-12\">\n";
		echo " <h1>" . ($puzzle != null ? $puzzle->puzzleName : '') . "</h1>\n";
		echo "<hr/>";
	
		if (file_exists($puzzle->image)) {
			echo " <div class=\"col-md-6\">\n";
			echo "                    <img class=\"img-responsive img-hover\" src='" . $puzzle->image . "' alt=\"\">\n";
			} else {
				echo "                    <img class=\"img-responsive img-hover\" src=\"images\puzzles\default.png\" alt=\"\">\n";
			}
			echo "</div>";
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
		{
		if (file_exists($puzzle->solutionImage)) {
			echo " <div class=\"col-md-6\">\n";
			echo "                    <img class=\"img-responsive img-hover\" src='" . $puzzle->solutionImage . "' alt=\"\">\n";
			} else {
				echo "                    <img class=\"img-responsive img-hover\" src=\"images\puzzles\default.png\" alt=\"\">\n";
			}
		echo "</div>";
		}
		echo " <div class=\"col-md-12\">\n";
		echo "<ul class=\"list-group\">\n";
		echo "  <li class=\"list-group-item\"><b>Name:</b> "  . $puzzle->puzzleName  .  "</li>\n";
		echo "  <li class=\"list-group-item\"><b>PuzzleCreator:</b> "  . $puzzle->puzzleCreatorName  .  "</li>\n";
		echo ($puzzle->description != ''? "<li class=\"list-group-item\"><b>Descripton:</b> " . $puzzle->description . "</li>\n" :'');
		echo ($puzzle->puzzleKeywords != ''? "<li class=\"list-group-item\"><b>Keywords:</b> " . $puzzle->puzzleKeywords . "</li>\n" :'');
		echo ($puzzle->puzzleInstructions != ''? "<li class=\"list-group-item\"><b>Instructions:</b> " . $puzzle->puzzleInstructions . "</li>\n" :'');
		if(isset($_SESSION['admin']) && $_SESSION['admin'] == true)
		{
			echo ($puzzle->solutionText != ''? "<li class=\"list-group-item\"><b>Solution Text:</b> " . $puzzle->solutionText . "</li>\n" :'');
		}
		echo ($puzzle->puzzleProject != ''? "<li class=\"list-group-item\"><b>Project:</b> " . $puzzle->puzzleProject . "</li>\n" :'');
		echo ($puzzle->puzzleNotes != ''? "<li class=\"list-group-item\"><b>Notes:</b> " . $puzzle->puzzleNotes . "</li>\n" :'');
		echo ($puzzle->puzzleCreated != ''? "<li class=\"list-group-item\"><b>Created:</b> " . $puzzle->puzzleCreated . "</li>\n" :'');
		echo ($puzzle->puzzleUpdated != ''? "<li class=\"list-group-item\"><b>Updated:</b> " . $puzzle->puzzleUpdated . "</li>\n" :'');
		if(getPuzzleCreatorById($puzzle->puzzleCreatorId)->playable == 1)
		{
			
		}
		echo "</ul>";
		echo "</div>";

	}

	
}

function displayPuzzleInformation($puzzle)
{
	/* public $puzzleCreatorId;
	public $puzzleCreatorName;// extra add on
    public $image;
    public $description;
	public $puzzleName;
	public $puzzleKeywords;
	public $puzzleInstructions;
	public $puzzleProject;
	public $solutionImage;
	public $solutionText;
	public $puzzleNotes;
	public $puzzleCreated;
	public $puzzleUpdated;*/
	if(!$puzzle == null)
	{
		echo " <div class=\"col-md-4\">\n";
		echo " <div class=\"col-md-6\">\n";
			echo "<form action=\"PuzzleUpdateImage.php\" class=\"dropzone\">";
		echo "<div class=\"dz-message\" data-dz-message><span>Drop new image here.\n Or click here to select.</span></div>";
		if (file_exists($puzzle->image)) {
			echo "                    <img class=\"img-responsive img-hover\" src='" . $puzzle->image . "' alt=\"\">\n";
			} else {
				echo "                    <img class=\"img-responsive img-hover\" src=\"images\puzzles\default.png\" alt=\"\">\n";
			}
		echo "<input hidden='true' type='text' name='id' value='" . $puzzle->id . "'/>";
		//echo "<input type=\"file\" name=\"file\" />";
		echo "</form>";
		echo "<form action=\"PuzzleDeleteImage.php\" method=\"post\">";
		echo "<input hidden='true' type='text' name='id' value='" . $puzzle->id . "'/>";
		echo "<button class=\"btn btn-link\" role=\"link\" type=\"submit\" value=\"submit\">Delete Image</button></form>";
		echo "</div>";
		echo " <div class=\"col-md-6\">\n";
			echo "<form action=\"PuzzleUpdateSolutionImage.php\" class=\"dropzone\">";
		echo "<div class=\"dz-message\" data-dz-message><span>Drop new solution image here.\n Or click here to select.</span></div>";
		if (file_exists($puzzle->solutionImage)) {
			echo "                    <img class=\"img-responsive img-hover\" src='" . $puzzle->solutionImage . "' alt=\"\">\n";
			} else {
				echo "                    <img class=\"img-responsive img-hover\" src=\"images\puzzles\default.png\" alt=\"\">\n";
			}
		echo "<input hidden='true' type='text' name='id' value='" . $puzzle->id . "'/>";
		//echo "<input type=\"file\" name=\"file\" />";
		echo "</form>";
		echo "<form action=\"PuzzleDeleteSolutionImage.php\" method=\"post\">";
		echo "<input hidden='true' type='text' name='id' value='" . $puzzle->id . "'/>";
		echo "<button class=\"btn btn-link\" role=\"link\" type=\"submit\" value=\"submit\">Delete Image</button></form>";
		echo "</div>";
		echo "</div>";
	}
	
	
    echo " <div class=\"col-md-6\">\n";
    echo " <h1>" . ($puzzle != null ? $puzzle->puzzleName : '') . "</h1>\n";
    if (!$puzzle == null) {
        echo "<h3>Edit Puzzle Details</h3>\n";
    } else {
        echo " <h3>Enter Puzzle Details</h3>\n";
    }
	if (!$puzzle == null)
	{
    	echo "  <form name=\"puzzleCreateedit\" id=\"puzzleedit\"   action='puzzleSave.php' method='post' enctype=\"multipart/form-data\" novalidate>";
		echo "<input hidden='true' type='text' name='id' value='" . $puzzle->id . "'/>";
	}
	else
	{
		echo "  <form name=\"puzzleCreateedit\" id=\"puzzleedit\"   action='createPuzzle.php' method='post' enctype=\"multipart/form-data\" novalidate>";
	}
	if ($puzzle == null) 
	{
		$tokens = getPuzzleCreatorsInformation();
		//RefID
		echo "<div class=\"form-group\">\n";
		echo "  <label for=\"sel1\">Puzzle Creator:</label>\n";
		echo "  <select class=\"form-control\" id=\"sel1\" name=\"token\">\n";
		foreach($tokens as $token)
		{
			echo "    <option value=" . $token->token  . ">" .  $token->puzzleCreatorName . "</option>\n";
		}
		echo "  </select>\n";
		echo "</div>";
		
	}
	if (!$puzzle == null) 
	{
		$tokens = getPuzzleCreatorsInformation();
		//RefID
		echo "<div class=\"form-group\">\n";
		echo "  <label for=\"sel1\">Puzzle Creator:</label>\n";
		echo "  <select required class=\"form-control\" id=\"sel1\" name=\"creatorId\">\n";
		foreach($tokens as $token)
		{
			if($token->puzzleCreatorId == $puzzle->puzzleCreatorId)
			{
				echo "    <option value=\"" . $token->puzzleCreatorId  . "\" selected>" .  $token->puzzleCreatorName . "</option>\n";
			}
			else{
				echo "    <option value=\"" . $token->puzzleCreatorId  . "\">" .  $token->puzzleCreatorName . "</option>\n";
			}
		}
		echo "  </select>\n";
		echo "</div>";
		
	}
	
	//Name
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Name:</label>\n";
    echo "          <input class=\"form-control\" name='name' value=\"" . ($puzzle != null ? $puzzle->puzzleName : '') . "\" 
                        required data-validation-required-message=\"Please enter the name.\"  maxlength=\"500\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
    //description
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Description:</label>\n";
    echo "          <textarea rows=\"5\" class=\"form-control\"  name='description' 
                          maxlength=\"1000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">" . ($puzzle != null ? $puzzle->description : '') . "</textarea>";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//Keywords
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Keywords (comma seperated):</label>\n";
    echo "          <input class=\"form-control\"  name='keywords' value=\"" . ($puzzle != null ? $puzzle->puzzleKeywords : '') . "\" 
                         maxlength=\"1000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//puzzleInstructions
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Instructions:</label>\n";
    echo "          <textarea rows=\"5\" class=\"form-control\"  name='instructions'
                     maxlength=\"1000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">" . ($puzzle != null ? $puzzle->puzzleInstructions : '') . "</textarea>";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//puzzleProject
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Project:</label>\n";
    echo "          <input class=\"form-control\"  name='project' value=\"" . ($puzzle != null ? $puzzle->puzzleProject : '') . "\" 
                          maxlength=\"1000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//Solution Text
    echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Solution Text:</label>\n";
    echo "          <textarea rows=\"5\" class=\"form-control\"  name='solutionText'
                          maxlength=\"1000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">" . ($puzzle != null ? $puzzle->solutionText : '') . "</textarea>";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//puzzleNotes
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Notes:</label>\n";
    echo "          <input class=\"form-control\"  name='notes' value=\"" . ($puzzle != null ? $puzzle->puzzleNotes : '') . "\" 
                          maxlength=\"1000\" data-validation-maxlength-message=\"Enter fewer characters.\" aria-invalid=\"false\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	//image
	if ($puzzle == null) {
		//echo "LibID : " . $libraryID;
        echo "        <div class=\"control-group form-group\">\n";
        echo "          <div class=\"controls\">\n";
        echo "              <label>Puzzle Image:</label>\n";
        echo "                <input type=\"file\" name=\"fileToUpload\"  id=\"fileToUpload\" >";
        echo "          <p class=\"help-block\"></p><br/><br/>\n";
        echo "      </div>\n";
        echo "  </div>";

        echo " <div id=\"success\"></div>";
		echo "        <div class=\"control-group form-group\">\n";
        echo "          <div class=\"controls\">\n";
        echo "              <label>Puzzle Solution Image:</label>\n";
        echo "                <input type=\"file\" name=\"fileToUpload2\"  id=\"fileToUpload2\" >";
        echo "          <p class=\"help-block\"></p><br/><br/>\n";
        echo "      </div>\n";
        echo "  </div>";

        echo " <div id=\"success\"></div>";
    }

	
	
    echo " <button class='btn btn-primary' type='submit' value='Save'>Save</button>\t";

    if (!$puzzle == null) {
        echo printNormalButton("Cancel", ("applications.php"), false);
    } else {
        echo printNormalButton("Cancel", ("applications.php"), false);
    }
    echo "                </form>";


    if (!$puzzle == null) {
		echo "<br/>";
        echo "                <form action='puzzleDelete.php' method='post' onsubmit='return confirm(\"Do you really want to delete " . $puzzle->puzzleName . "?\");'>";
        echo "                <input hidden='true' type='text' name='id' value=\"" . $puzzle->id . "\">";
        echo "                <input hidden='true' type='text' name='creatorId' value=\"" . $puzzle->puzzleCreatorId . "\">";
        echo "                <button class='btn btn-danger' type='submit'>Delete <span class=\"glyphicon glyphicon-trash\"</span></button>";
        echo "                </form>";
    }
}
function printSearchForm()
{
		echo "<form action='index.php' method='get'>\n";
		echo "    <div class=\"input-group input-group-lg\">\n";
		echo "      <input type=\"text\" name='searchTerm' value='' required placeholder='enter name, description, keywords, notes, project, or instructions' class=\"form-control\" placeholder=\"Search\">\n";
		echo "      <div class=\"input-group-btn\">\n";
		echo "        <button class=\"btn btn-default\" type=\"submit\"><i class=\"glyphicon glyphicon-search\"></i></button>\n";
		echo "      </div>\n";
		echo "    </div>\n";
		echo "  </form>";
}
function printHeader()
{
	echo "<!-- Navigation -->\n";
	echo "    <nav class=\"navbar navbar-fixed-top\" role=\"navigation\">\n";
	
	echo "        <div class=\"container\">\n";
	echo " 			<div class=\"col-md-12\">\n";
	echo " 			<div class=\"col-md-2\">\n";
	echo "				<img src=\"images/logo.png\" class=\"img-responsive\"/>";
	echo "			</div>";	
	echo " 			<div class=\"col-md-10\">\n";
	echo "            <!-- Brand and toggle get grouped for better mobile display -->\n";
	echo "            <div class=\"navbar-header\">\n";
	
	echo "                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">\n";
	echo "                    <span class=\"sr-only\">Toggle navigation</span>\n";
	echo "                    <span class=\"icon-bar\"></span>\n";
	echo "                    <span class=\"icon-bar\"></span>\n";
	echo "                    <span class=\"icon-bar\"></span>\n";
	echo "                </button>\n";
	echo "            </div>\n";
	echo "            <!-- Collect the nav links, forms, and other content for toggling -->\n";
	echo "            <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">\n";
	echo "                <ul class=\"nav navbar-nav navbar-right\">\n";
//	if (isset($_SESSION['admin']) && $_SESSION['admin'] == true)
//	{
		echo "                    <li>\n";
		echo "                        <a href=\"puzzles.php\">Puzzles</a>\n";
		echo "                    </li>\n";
		echo "                    <li>\n";
		echo "                        <a href=\"books.php\">Books</a>\n";
		echo "                    </li>\n";
//	}
//	else{
		echo "                    <li>\n";
		echo "                        <a href=\"sponsor.php\">Sponsor</a>\n";
		echo "                    </li>\n";

		echo "                    <li>\n";
		echo "                        <a href=\"applications.php\">Apps</a>\n";
		echo "                    </li>\n";

//	}
    echo "                    <li>\n";
    echo "                        <a href=\"applications.php\">Admin</a>\n";
    echo "                    </li>\n";
	echo "                    <li>\n";
	echo "                        <a href=\"about.php\">About</a>\n";
	echo "                    </li>\n";
	echo "                    <li>\n";
	echo "                        <a href=\"login.php\">Login</a>\n";
	echo "                    </li>\n";
	echo "                </ul>\n";
	echo "            </div>\n";
	echo "            <!-- /.navbar-collapse -->\n";
	echo "        </div>\n";
	echo "        <!-- /.container -->\n";
	echo "    </nav>";
	echo "			</div>";
	echo "			</div>";	

}

function printFooter()
{
	echo " <!-- Footer -->\n";
	echo "<hr>";
	echo "        <footer>\n";
	echo "            <div class=\"row\">\n";
	echo "                <div class=\"col-lg-12\">\n";
	echo "                    <p>Copyright © PuzzleMaster 2017</p>\n";
	echo "                </div>\n";
	echo "            </div>\n";
	echo "            <!-- /.row -->\n";
	echo "        </footer>";

}
function printBigButton($text, $link, $disabled)
{
    $text = filter_var(($text), FILTER_SANITIZE_STRING);
    if ($disabled) {
        return "<div disabled='true' class='btn btn-lg btn-primary' >" . $text . "</div>";
    } else {
        return "<a class='btn btn-lg btn-primary' href='" . $link . "'><span class=\"glyphicon glyphicon-book\"></span> " . $text . "</a>";
    }
}

function printNormalButton($text, $link, $disabled)
{
    $text = filter_var(($text), FILTER_SANITIZE_STRING);
    if ($disabled) {
        return "<div disabled='true' class='btn btn-default' >" . $text . "</div>";
    } else {
        return "<a class='btn btn-default'  href='" . $link . "'>" . $text . "</a>";
    }
}

function printNormalPrimaryButton($text, $link, $disabled)
{
    $text = filter_var(($text), FILTER_SANITIZE_STRING);
    if ($disabled) {
        return "<div disabled='true' class='btn btn-primary' >" . $text . "</div>";
    } else {
        return "<a class='btn btn-primary'  href='" . $link . "'>" . $text . "</a>";
    }
}

function printWarnButton($text, $link, $disabled)
{
    $text = filter_var(($text), FILTER_SANITIZE_STRING);
    if ($disabled) {
        return "<div disabled='true' class='btn btn-warning' >" . $text . "</div>";
    } else {
        return "<a class='btn btn-warning'  href='" . $link . "'>" . $text . "</a>";
    }
}

function printSuccessButton($text, $link, $disabled)
{
    $text = filter_var(($text), FILTER_SANITIZE_STRING);
    if ($disabled) {
        return "<div disabled='true' class='btn btn-success' >" . $text . "</div>";
    } else {
        return "<a class='btn btn-success'  href='" . $link . "'>" . $text . "</a>";
    }
}

function printSuccessMessage($message)
{
    $message = filter_var(($message), FILTER_SANITIZE_STRING);
    echo "<div id='alert alert-success'><div class='alert alert-success'><button type='button' class=
        'close' data-dismiss='alert' aria-hidden='true'>x</button><strong>" . $message . "</strong></div></div>";
}

function printErrorMessage($message)
{
    $message = filter_var(($message), FILTER_SANITIZE_STRING);
    echo "<div id='alert alert-danger'><div class='alert alert-danger'><button type='button' class=
        'close' data-dismiss='alert' aria-hidden='true'>x</button><strong>" . $message . "</strong></div></div>";
}
function printerrorAndExit($error, $returnPath)
{
    $error = filter_var(($error), FILTER_SANITIZE_STRING);
    echo "<div class=\"container\">";
    echo "<div class=\"row\">";
    echo "<div class=\"col-lg-12\">";
    echo "<div class=\"alert alert-danger\" >" . $error . "\t<a href=\"" . $returnPath . "\" class=\"btn btn-danger\">Go Back</a></div>";
    printFooter();
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    exit;
}

/*

Login form

*/
function printAdminLoginForm($success, $message)
{
    if (!$success) {
        echo "<div class=\"error\" control-group form-group>";
        echo "<div>" . $message . "</div><br/>\n";
        echo "<form action=\"login.php\" enctype=\"application/x-www-form-urlencoded\" method=\"post\" control-group form-group>\n";
        echo "\n";
        echo "<div>\n";
        echo "<label for=\"webusername\">Username:</label><br />\n";
        echo "<input id=\"webusername\" name=\"webusername\" size=\"25\" type=\"text\" class=\"form-control\" required /><br/>\n";
        echo "</div>\n";
        echo "\n";
        echo "<div>\n";
        echo "<label for=\"pass\">Password:</label><br />\n";
        echo "<input id=\"pass\" name=\"pass\" size=\"25\" type=\"password\" class=\"form-control\"required /><br/><br/>\n";
        echo "</div>\n";
        echo "<div>\n";
        echo "<button class=\"btn btn-danger\" name=\"submit\" type=\"submit\">Login <span class=\"glyphicon glyphicon-user\"/></button><br/>\n";
        echo "</div>\n";
        echo "</form>";
        echo "</div>\n";
    } else {
        echo "<div class=\"success\">";
        echo "<div>" . $message . "</div><br/>\n";
        echo printSuccessButton("Libraries", "LibraryList.php", false);
        echo "\t";
        echo printWarnButton("Logout", "login.php?logout=true", false);
        echo "</div>\n";
    }

}

function printUserForm($user)
{
	echo "   <form action='UserSave.php' method='post' novalidate>";
    echo "   <input hidden='true' type='text' name='userID' value='" . $user->id . "'>";
	echo "   <input hidden='true' type='text' name='updateUser'>";
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Username:</label>\n";
    echo "          <input class=\"form-control\" name='userName' value=\"" . $user->name . "\" 
                        required data-validation-required-message=\"Please enter the username.\" aria-invalid=\"false\" maxlength=\"500\" data-validation-maxlength-message=\"Enter fewer than 500 characters.\" >";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	
	$puzzleCreators = getPuzzleCreatorsInformation();
	if($user->creatorAccessId != 0)
	{
		 echo "          <label>PuzzleCreator Assignment:</label>\n";
		echo "<select class=\"form-control\" id=\"creatorAccessId\" name=\"creatorAccessId\" required data-validation-required-message=\"Please select a puzzle creator.\">";
		foreach ($puzzleCreators as $creator) 
		{

			if($user->creatorAccessId == $creator->puzzleCreatorId)
			{
				echo "<option selected=\"true\" value=\"" . $creator->puzzleCreatorId . "\">" . $creator->puzzleCreatorName . "</option>";
				$thisToken = $creator->token;
			}
			else
			{
				echo "<option value=\"" . $creator->puzzleCreatorId . "\">" . $creator->puzzleCreatorName . "</option>";
			}
			
		}
		echo "</select>";
		echo "          <label>Token:</label>\n";
		echo $thisToken;  
		echo "<br/>";
	}
	else
	{
		echo "<input hidden='true' type='text' id=\"creatorAccessId\" name=\"creatorAccessId\" value=\"0\" />";
	}
	echo "<input class='btn btn-warning' type='submit' value='Update " . $user->name . "'>";
	echo "</form>";
}
function printUserCreationForm()
{
	echo "                <form action='UserSave.php' id=\"userCreate\"  method='post' novalidate>";
	echo "                <input hidden='true' type='text' name='createUser'>";
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Username:</label>\n";
    echo "          <input class=\"form-control\" name='userName' 
                        required data-validation-required-message=\"Please enter the username.\" aria-invalid=\"false\" maxlength=\"500\" data-validation-maxlength-message=\"Enter fewer than 500 characters.\" >";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Password:</label>\n";
    echo "          <input type=\"password\" class=\"form-control\" name='p' 
                        required data-validation-required-message=\"Please enter the password.\" aria-invalid=\"false\" maxlength=\"500\" minlength=\"8\" data-validation-maxlength-message=\"Enter fewer than 500 characters.\" data-validation-minlength-message=\"Enter more than 8 characters.\" >";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	echo "    <div class=\"control-group form-group\">\n";
	echo "      <div class=\"controls\">\n";
	$tokens = getPuzzleCreatorsInformation();
	echo "          <label>Puzzle Creator Association:</label>\n";
		echo "<select class=\"form-control\" id=\"creatorAccessId\" name=\"creatorAccessId\" required data-validation-required-message=\"Please select a Creator.\">";

	foreach ($tokens as $token) {
		echo "<option value=\"" . $token->puzzleCreatorId . "\">" . $token->puzzleCreatorName . "</option>";
		}
	echo "            </select>";
	echo "          <p class=\"help-block\"></p>\n";
	echo "      </div>\n";
	echo "  </div>";
	echo "<div>";
	echo "                <input class='btn btn-warning' type='submit' value='Create User'>";
    echo "                </form>";
	echo printNormalButton("Cancel","users.php",false);
	echo "  </div>";
	
}
function createUser($username, $p, $creatorAccessId)
{
	//createUser
	
	 try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $creatorAccessId = filter_var(($creatorAccessId), FILTER_SANITIZE_STRING);
		$username = filter_var(($username), FILTER_SANITIZE_STRING);

        $sqlExecSP = "CALL createUser(\"" . $creatorAccessId . "\",
		\"" . $username . "\",
		\"" . $p . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();

        $connection = null;
        $stmt = NULL;
        $db = NULL;
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
function getPuzzlesPerPage()
{
	 try {
        $connection = new Connection();
        $db = $connection->getConnection();

        $sqlExecSP = "CALL getPuzzlesPerPage()";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();
		if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $number = $row['number'];
            $connection = null;
        	$stmt = NULL;
        	$db = NULL;
			return $number;
        } else {
            $connection = null;
            $stmt = NULL;
            $db = NULL;
            return 500;
        }
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
function updatePuzzlePerPage($puzzlesPerPage)
{
	try {
        $connection = new Connection();
        $db = $connection->getConnection();

        $sqlExecSP = "CALL updatePuzzlesPerPage(\"" . $puzzlesPerPage . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
function printPuzzlePerPageForm()
{
	$puzzlesPerPage = getPuzzlesPerPage();
	echo "                <form action='updatePuzzlesPerPage.php' method='post'>";
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Number of puzzle to show per page:</label>\n";
    echo "          <input type=\"number\" class=\"form-control\" name='puzzlePerPage' 
                        required data-validation-required-message=\"Please enter the number.\" aria-invalid=\"false\" maxlength=\"3\" data-validation-maxlength-message=\"Enter fewer than 3 characters.\" 
						minlength=\"1\" data-validation-minlength-message=\"Enter at least 1 number.\" value=\"" . $puzzlesPerPage . "\">";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	echo "                <input class='btn btn-warning' type='submit' value='Update'>";
    echo "                </form>";
}
function printUpdatePasswordForm($user)
{
	echo "                <form action='UserSave.php' method='post'>";
    echo "                <input hidden='true' type='text' name='userID' value='" . $user->id . "'>";
	echo "                <input hidden='true' type='text' name='userName' value='" . $user->name . "'>";
	echo "                <input hidden='true' type='text' name='updatePassword'>";
	echo "    <div class=\"control-group form-group\">\n";
    echo "      <div class=\"controls\">\n";
    echo "          <label>Password:</label>\n";
    echo "          <input type=\"password\" class=\"form-control\" name='p' 
                        required data-validation-required-message=\"Please enter the password.\" aria-invalid=\"false\" maxlength=\"500\" data-validation-maxlength-message=\"Enter fewer than 500 characters.\" 
						minlength=\"8\" data-validation-minlength-message=\"Enter at least 8 characters.\" >";
    echo "          <p class=\"help-block\"></p>\n";
    echo "      </div>\n";
    echo "  </div>";
	echo "                <input class='btn btn-warning' type='submit' value='Update " . $user->name . " password'>";
    echo "                </form>";
	
}
function updateUserPassword($id, $userName, $p)
{
    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $id = filter_var(($id), FILTER_SANITIZE_STRING);
        $userName = filter_var(($userName), FILTER_SANITIZE_STRING);
		
        $sqlExecSP = "CALL updateUserPassword(\"" . $id . "\",
		\"" . $p . "\",
		\"" . $userName . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();

        $connection = null;
        $stmt = NULL;
        $db = NULL;
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
function printDeleteUserForm($user)
{
	echo "                <form action='UserSave.php' method='post' onsubmit='return confirm(\"Do you really want to delete " . $user->name . "?\");'>";
    echo "                <input hidden='true' type='text' name='userID' value='" . $user->id . "'>";
	echo "                <input hidden='true' type='text' name='creatorAccessId' value='" . $user->creatorAccessId . "'>";
	echo "                <input hidden='true' type='text' name='deleteUser'>";
	
	echo "                <button class='btn btn-danger' type='submit' value='Delete " . $user->name . "' >Delete " . $user->name . " <span class=\"glyphicon glyphicon-trash\"></span></button>";
	
    echo "                </form>";
	
}
function deleteUser($id)
{
    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $id = filter_var(($id), FILTER_SANITIZE_STRING);
		
        $sqlExecSP = "CALL deleteUser(\"" . $id . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();

        $connection = null;
        $stmt = NULL;
        $db = NULL;
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
function updateUser($id, $userName, $creatorAccessId)
{
    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $id = filter_var(($id), FILTER_SANITIZE_STRING);
        $userName = filter_var(($userName), FILTER_SANITIZE_STRING);
        $creatorAccessId = filter_var(($creatorAccessId), FILTER_SANITIZE_STRING);
		
        $sqlExecSP = "CALL updateUsernameAndCreatorAccessId(\"" . $id . "\",
		\"" . $creatorAccessId . "\",
		\"" . $userName . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();

        $connection = null;
        $stmt = NULL;
        $db = NULL;
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}

/*
Get the user by the username and verify the entered password. 
If valid, return the relevant info.
*/
function getUser($webusername, $pass)
{
    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $webusername = filter_var(($webusername), FILTER_SANITIZE_STRING);
        $pass = filter_var(($pass), FILTER_SANITIZE_STRING);

        $sqlExecSP = "CALL getUser(\"" . $webusername . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();
        $user = null;
        if ($stmt->rowCount() == 1) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $hash = $row['password'];
            //echo "<br/>hello : " . $hash;
            if (password_verify($pass, $hash)) {
                $connection = null;
                $stmt = NULL;
                $db = NULL;
                $user = new user();
                $user->name = $row['username'];
                $user->id = $row['id'];
				$user->creatorAccessId = $row['creatorAccessId'];
                $user->token = getToken(16);
                //echo $user->token;
                $user->expires = updateUserToken($user->id, $user->token);
                return $user;
            }
        } else {
            $connection = null;
            $stmt = NULL;
            $db = NULL;
            return null;
        }
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
/*

Update a user's token
(after a login)
*/
function updateUserToken($id, $token)
{

    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $id = filter_var(($id), FILTER_SANITIZE_STRING);
        $token = filter_var(($token), FILTER_SANITIZE_STRING);
        $expiresTime = time() + (60 * 60);
        $sqlExecSP = "CALL UpdateUserToken(\"" . $id . "\",
		\"" . $token . "\",
		\"" . $expiresTime . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();

        $connection = null;
        $stmt = NULL;
        $db = NULL;
        return $expiresTime;
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}
/*
Check if the user has a valid token
*/
function checkUserCreds($id, $token)
{
    if (getUserToken($id) != $token) {
        return false;
    } else {
        return true;
    }
}
function validateUserAccess($creatorAccessId, $puzzleId)
{
	if($creatorAccessId == 0)
	{
		return true;
	}
	if($creatorAccessId != $puzzleId)
	{
		return false;
	}
	return true;
}
/*
Get the expiration timestamp for a user ID
*/
function getUserExpiresTime($id)
{
    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $id = filter_var(($id), FILTER_SANITIZE_STRING);
        $sqlExecSP = "CALL getUserExpiresTime(\"" . $id . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();
		$expiresTime = 0;
        if ($stmt->rowCount() == 1) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $expiresTime = $row['expires'];

            }
        } else {
            $connection = null;
            $stmt = NULL;
            $db = NULL;
            return NULL;
        }
        $connection = null;
        $stmt = NULL;
        $db = NULL;
		return $expiresTime;
    } catch (Exception $e) {
        echo $e;
        return NULL;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }

}

/*
Logout a user by setting their timeout to now -1 and nullifying the token
*/
function logoutUser($id)
{
    try {
        $connection = new Connection();
        $db = $connection->getConnection();
        $id = filter_var(($id), FILTER_SANITIZE_STRING);

        $sqlExecSP = "CALL logoutUser(\"" . $id . "\")";
        $stmt = $db->prepare($sqlExecSP);
        $stmt->execute();

        $connection = null;
        $stmt = NULL;
        $db = NULL;
    } catch (Exception $e) {
        echo $e;
    } finally {
        $connection = null;
        $stmt = NULL;
        $db = NULL;
    }
}

function getToken($length)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen($codeAlphabet); // edited

    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure(0, $max - 1)];
    }

    return $token;
}
function crypto_rand_secure($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min; // not so random...
    $log = ceil(log($range, 2));
    $bytes = (int)($log / 8) + 1; // length in bytes
    $bits = (int)$log + 1; // length in bits
    $filter = (int)(1 << $bits) - 1; // set all lower bits to 1
    do {
        $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
        $rnd = $rnd & $filter; // discard irrelevant bits
    } while ($rnd > $range);
    return $min + $rnd;
}