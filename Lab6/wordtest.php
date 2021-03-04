<!DOCTYPE html>
<html>
<body>
<h1>GRE Vocab Quiz</h1>
	<?php
		if(isset($_POST["guess"])){
			if($_POST["answer"]==$_POST["guess"]){
				print "<h1> Correct! </h1>";
			}
			else{
				print "<h1> Incorrect! </h1>";
			}
		}
	?>

<?php
$words=file("words.txt");
shuffle($words);
$choices=array_slice($words, 0,4);
list($answer, $part, $definition)=explode("\t", $choices[rand(0,3)]);
?>

<h1><?php print $answer."-".$part ?> </h1>
<form action="wordtest.php" method="post">

<?php
for($i=0; $i<4; $i++){
	$line=$choices[$i];
	list($word, $part, $definition) = explode("\t", $line);
?>

<input type="radio" name="guess" value="<?=$word ?>"></input> <?=$definition ?>
<br>

<?php
}
?>

<div>
	<input type="hidden" name="answer" value="<?= $answer ?>">
	<input type="submit" value="Another!">
	<input type="submit" value="Check">
</div>
</form>
	
</body>
</html>