<?php 

if (isset($_GET['rating']) && isset($_GET['id']) ) {
	 echo 'rating recieved as '.$_GET['rating'].'</br>';
	 	 echo'for user with id as '. $_GET['id'];
	 $rating = $_GET['rating'];
	 $id = $_GET['id'];
// database connection
define('dbname', 'starrating');
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpassword', '');

$conn = mysqli_connect(dbhost ,dbuser, dbpassword, dbname);

if ($conn) {
	// print_r('connected');
	$sql = "UPDATE user_rating SET rating = $rating WHERE id = $id ORDER BY rating;";
	if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

}

}
if (isset($_GET['load'])) {
	echo "ready to Load";
}


 ?>