<!DOCTYPE html>
<html>
<body>

<h1>GRE Vocab Quiz</h1>

		<?php
			$wordDoc = file("words.txt");
			$numLines = sizeof($wordDoc);
			$pickedWord = rand(0, $numLines-1);
			$wordElements = explode("\t", $wordDoc[$pickedWord]);
			$word = $wordElements[0];
			$part = $wordElements[1];
			$def = $wordElements[2];
			echo("<h1> Word: " . $word . " - " . $part . "</h1>");
			echo("<br>");
			$ansPos = rand(0, 4);


			//create an array of answers already echoed
			//before writing an answer, check to see if its position is in the array
			//when ansnwer is writen, add its position to the array
			//if the anwers position is in the array, $i--
			$arrOfWrittenAnswers = array();
			for($i=0; $i<4; $i++){
				$wordAnsPoss = rand(0, $numLines-1);
				$wordElements2 = explode("\t", $wordDoc[$wordAnsPoss]);
				$possDef = $wordElements2[2];

				if($i==$ansPos)
					echo("<input type='radio' name='correctAns'>".$def."<br>");
				else if()
					echo("<input type='radio' name='gender'>". $possDef ."<br>");
				else
					$i--;
		}
		?>	
	</ul>
	<input type='submit' value="Another!">
</body>
</html>





