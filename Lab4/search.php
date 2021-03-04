<!DOCTYPE html>
<html>
<body>

<h1>Elgoog</h1>
<form action="search.php" method="get">
	<input type="text" name="searchTerm" value="<?php echo $_GET["searchTerm"]; ?>">
	<input type="submit" name="runSearch" value="Search!">
</form>

	<ul>
		<?php
			$numResults = 0;
			$initTime = microtime();
			$runSearch = $_GET;
			$q = $_GET["searchTerm"];
			if(!empty($q)){
			if($runSearch){

			$results = glob("/webpages/jdavey/Lab4/doc/*".$_GET["searchTerm"]."*");
			foreach ($results as $value) {
					$fileContent = file_get_contents($value);
					echo "<li class='docitem'><a href=doc/" .$value .">" . basename($value, ".txt") . "</a></li>";
					echo "<li class='docitem'> Filename contains query term </li>";
					echo "<li class='docitem'>'..." . substr($fileContent, 0, 20) ."...'</li><br>";
					$numResults++;
			}

			$results2 = glob("/webpages/jdavey/Lab4/doc/*.txt");
			foreach($results2 as $value){
				$fileContent = file_get_contents($value);
				if(strpos($fileContent, $_GET["searchTerm"]) !== false){
					$filePos = strpos($fileContent, $_GET['searchTerm']); //Determines position of term in file content string

					if($filePos-10>=0) //Decides where to start file snippet preview - if negative, then begin at 0
						$previewStartPos = $filePos-10;
					else
						$previewStartPos = 0;

					echo "<li class='docitem'><a href=doc/" .$value .">" . basename($value, ".txt") . "</a></li>";
					echo "<li class='docitem'>'...". substr($fileContent, $previewStartPos, 25) ."...'</li><br>";
					$numResults++;
				}
				
			}

		}
	}

		$compTime = microtime();
		$runTime = (float)$compTime-(float)$initTime;
		echo "Time to run: ". $runTime . " seconds";
		echo "<br><br>";
		echo "We found " . $numResults . " results.";
		?>	
	</ul>
</body>
</html>