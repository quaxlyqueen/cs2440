<?php
	$numOfPals = 20;
?>
<!doctype html>
<html lang="en">
	<head>
		<title>Palindrome Stuff</title>
		<link rel="stylesheet" href="css/style.css" type="text/css">
	</head>
	<body>
		<main>
			<form action="palindrome.php" method="post">	
				<select name="pal-count">
					<option value="" disabled selected hidden>How Many Palindromes?</option>
					<?php
						for ($x = 1; $x <=$numOfPals; $x++)
							echo '<option value="'.$x.'">'.$x.' Palindrome'.($x==1 ? "" : "s").'</option>';
						?>
				</select>
				<input type="text" name="search-word" placeholder="Enter a word">
				<input type="submit">
				<?php
					if (isset($_GET['error']) && $_GET['error'] == "true")
						echo'<p class="warning">Enter Something!</p>';
					?>
			</form>
		</main>
	</body>
</html>
