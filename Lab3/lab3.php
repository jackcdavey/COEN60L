<!DOCTYPE html>
<html>
<body>
	<h1>PHP Photo List</h1>

<p><b>My Photo Album</b></p>
	<ul>
		<?php
			$photos = glob("/webpages/jdavey/Lab3/photo/*.jpg");
			foreach ($photos as $value) {
					echo "<li><a href= students.engr.scu.edu/~jdavey/Lab3/photo/iphone.jpg" .">" . basename($value, ".jpg") . " Size: " .  round(filesize($value)/1000) . " KB </a></li>";
			}
		?>	
	</ul>
</body>
</html>