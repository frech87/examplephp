<?php

include('include/db.php');


$result = mysqli_query($connection, "SELECT * FROM `userlist`");

?>

<ul>
	<?php
		echo '<li>' . 'Name		|' . 'Number		|'. 'Count		'. '</li>';
		while(($cat = mysqli_fetch_assoc($result)))
		{
			echo '<li>' . $cat['name']. '		|'. $cat['number']. '		|'. $cat['calls_count']. '</li>';
			}
			
			?>

</ul>