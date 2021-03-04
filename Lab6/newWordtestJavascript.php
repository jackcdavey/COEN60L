<!DOCTYPE html>
<html>
<body>
<h1>GRE Vocab Quiz</h1>

<h1 id="result"></h1>


<?php
$words=file("words.txt");
shuffle($words);
$choices=array_slice($words, 0,4);
list($answer, $part, $definition)=explode("\t", $choices[rand(0,3)]);
?>

<h1><?php print $answer."-".$part ?> </h1>
<form method="post">

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
	<input type="submit" value="New Question">
</div>
</form>
	<input type="submit" value="Submit" onclick="chkAns()">

<script>
	function chkAns(){
		var radios = document.getElementsByTagName("input");
		for(var i= 0; i< radios.length; i++){
			if (radios[i].type === "radio" && radios[i].checked) {
				var idk = "<?php echo($answer) ?>";
				var userin = radios[i].value;
				//alert(userin);
				//alert(idk);
				if(idk == userin){
					//alert("correct");
					document.getElementById("result").innerHTML = "Correct";
				}
				else{
					//alert("incorrect");
					document.getElementById("result").innerHTML = "Incorrect";
				}
				
			}
		}
	}

</script>


</body>
</html>