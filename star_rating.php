<!DOCTYPE html>
<html>
<head>
  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
 <title>User Rating</title>
</head>
<style type="text/css">
  i#mainstar{
  font-size: 10px;
  padding: 10px;
  color:orange;
  }
  div#details{
    border:2px solid grey;
    margin:10px 100px 10px 100px;
    text-align:center;
  }
  img{
    border-radius:50%;
  }
</style>
<body onload="getstars()" style="font-size: 10px;">

<p id="txtHint"></p>

<?php 
define('dbname', 'starrating');
define('dbhost', 'localhost');
define('dbuser', 'root');
define('dbpassword', '');

$conn = mysqli_connect(dbhost ,dbuser, dbpassword, dbname);
if ($conn) {
  $sql = "SELECT * FROM user_rating";
  $q = mysqli_query($conn,$sql);
  
} else  die('couldnt connect');

 ?>

<?php 

while (  $r = mysqli_fetch_assoc($q)) {?>
<div id="details">
  <img src="img/avatae.png" height="100" width="100" alt="avatar">
  <br/>
  <?php echo $r['fullname']. '   '.'Skill: '. $r['skills'].' rating: '. $r['rating'].'<br/>';   ?>
  <?php

if($r['rating'] == 5){
echo'
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
';
}
elseif($r['rating'] == 4)
{echo '
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
';
}

elseif($r['rating'] == 3)
{echo '
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
';
}
elseif($r['rating'] == 2)
{echo '
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
';
}
elseif($r['rating'] == 4)
{echo '
<i id="mainstar" class="fas fa-star"></i>
<i id="mainstar" class="fas fa-star"></i>
';
}else{
  echo 'No rating yet ,be the first';
}
?>
<h4>Rate User below</h4>
<i class="fas fa-star"  onclick="star(1, <?php echo $r["id"];?> )"></i>
<i class="fas fa-star" onclick="star(2, <?php echo $r["id"];?> )"></i>
<i class="fas fa-star" onclick="star(3, <?php echo $r["id"];?> )"></i>
<i class="fas fa-star" onclick="star(4, <?php echo $r["id"];?> )"></i>
<i class="fas fa-star" onclick="star(5, <?php echo $r["id"];?>)"></i>
</div>
  <?php
}
 ?>

<script>
 var xhttp;
 var rating;
 var id;

 function getstars(){
  console.log('document loaded and ready to load the right stars');;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("stars").innerHTML = this.responseText;
    
    }
  };
  xhttp.open("GET", "rateplayer.php?load=yes" , true);
  xhttp.send();
 }


function star(val,id){
let rating = val;
console.log('rating recieved as ' + rating);
console.log('user id = ' + id);
this.passvaluetoajax(rating,id);
}

function passvaluetoajax(rating,id) {

  console.log('recieved rating as ' + rating + ' from child function for user with id = '+ id);
  // ajax call

  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    window.setTimeout(function(){window.location.reload()},1000);
    }
  };
  xhttp.open("GET", "rateplayer.php?rating="+rating+"&id="+id , true);
  xhttp.send();   
}
</script>

</body>
</html>