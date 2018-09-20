<?php 

if (isset($_GET['val'])) {
	if ( empty($_GET['val'])) {
		echo "empty";
	}elseif ($_GET['val'] == 'Alfred') {
		echo "Right";
	}
	else{
if ($_GET['val'] !== 'Alrfed') {
echo "Thats wrong";
}
	}
}

 ?>