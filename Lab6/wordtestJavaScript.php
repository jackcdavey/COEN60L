<!DOCTYPE html>
<html>
<body>
<h1>GRE Vocab Quiz</h1>

<h1 id="result"></h1>



<script>
	function chkAns(){
		alert("Hello");
		var radios = document.getElementsByTagName("input")
		for(var i= 0; i< radios.length; i++){
			if (radios[i].type === "radio" && radios[i].checked) {
				//alert("passed");
				// get the user’s choice .......
				var picked = radios[i];
				document.getElementById("result").innerHTML = "l";
			}
		}
	}

</script>


<?php
$words=file("words.txt");
shuffle($words);
$choices=array_slice($words, 0,4);
list($answer, $part, $definition)=explode("\t", $choices[rand(0,3)]);
?>

<h1><?php print $answer."-".$part ?> </h1>




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
	<input type="submit" value="Submit" onclick="">

</div>
<button onclick="chkAns()">Click me</button>
</form>
</body>
</html>