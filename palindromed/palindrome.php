<?php 
	$wordCounter = 0; 
	$displayPageContent = "";

	function wordCountOutput($sw)
	{
		global $wordCounter;
		echo "<section><p>There are $wordCounter instances of $sw on this site</p></section>";
	}
	function output($inputArray, $sw)
	{
		global $wordCounter;
		$return = "";
		foreach($inputArray as $input)
		{
			if(strpos(strtolower($input), $sw) !== false) $wordCounter++;
			
			$return .= "<section><h3>Facts About \"$input\"</h3>";
			$return .= "<ul>";
			$return .= "<li> Palindrome: ".(isPalindrome($input) ? "<span class='message'>TRUE</span>" : "<span class='warning'>FALSE</span>")."</li>";
			$return .= "<li> Number of Characters: <span class='contrast'>".strlen($input)."</span></li>";
			$return .= "<li> Number of Words: <span class='contrast'>".str_word_count($input)."</span></li>";
			$return .= "</ul></section>";
		}
		
		return $return;
	}
		
	function isPalindrome($phrase)
	{
		
		//removes spaces from phrase
		$phrase = str_replace(" ", "", $phrase); 
		$phrase = str_replace("'", "", $phrase); 
		$phrase = str_replace("?", "", $phrase); 
		$phrase = str_replace("/", "", $phrase); 
		$phrase = str_replace("\\", "", $phrase); 
		$phrase = str_replace(".", "", $phrase); 
		$phrase = str_replace(",", "", $phrase); 
		
		//lower case the phrase
		$phrase = strtolower($phrase);
		
		//reverse phrase and assign to variable
		$revPhrase = strrev($phrase);
		
		//compare and return
		if($revPhrase == $phrase) return true;
		else return false;
	}
	
	if(!empty($_POST['search-word']) && !empty($_POST['pal-count']))
	{
		$searchWord = $_POST['search-word'];
		$palCount = $_POST['pal-count'];
	}
	else header('location: .?error=true');	
	
	if (!isset($_POST['palindromes']))
	{
		$displayPageContent .= '<form method="post">';
			$displayPageContent .= '<input type="hidden" name="search-word" value="'.$searchWord.'">';
			$displayPageContent .= '<input type="hidden" name="pal-count" value="'.$palCount.'">';
			for ($x=0;$x<$_POST['pal-count'];$x++)
				$displayPageContent .= '<input name="palindromes[]"><br>';
			
				$displayPageContent .= '<input type="submit">';
		$displayPageContent .= '</form>';
	}
	else
	{
		$inputs = $_POST['palindromes'];
		$displayPageContent .= output($inputs, $searchWord);
		$displayPageContent .= wordCountOutput($searchWord);
	}
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Palindrome Stuff</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<nav><a href=".">Back Home</a></nav>
		<main>
			<?php echo $displayPageContent; ?>
		</main>
	</body>
</html>