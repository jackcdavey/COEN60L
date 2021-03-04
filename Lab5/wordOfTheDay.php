<!DOCTYPE html>
<html>
<body>

<h1>Word of the Day</h1>


	<ul>
		<?php
			$wordDoc = file("words.txt");
			$numLines = sizeof($wordDoc);
			$pickedWord = rand(0, $numLines-1);

			$wordElements = explode("\t", $wordDoc[$pickedWord]);
			//print_r($wordElements);
			$word = $wordElements[0];
			$part = $wordElements[1];
			$def = $wordElements[2];
			print("Word: " . $word);
			echo("<br>");
			print("Part of Speech: " . $part);
			echo("<br>");
			print("Definition: " . $def);
			$hits=file_get_contents("hits.txt");
			echo("<br>");
			print("Hits: ". $hits);
			$hits++;
			file_put_contents("hits.txt", $hits);
		?>	
	</ul>
</body>
</html>