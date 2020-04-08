<?php 


function getData($query){
	$connection=mysqli_connect('localhost','root','','Babysitter');
	if($connection){
		$result = mysqli_query($connection,$query);
		mysqli_close($connection);
		return $result;
	}
}

function insertData($query){
	$connection=mysqli_connect('localhost','root','','Babysitter');
	if($connection){
		$result= mysqli_query($connection,$query);
		mysqli_close($connection);
		if($result){
			$result = true;
		}
		else{
			$result = false;
		}
		return $result;
	}
}





 ?>