<?php
include('class.upload.php');
//include('upload.php');

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="school"; // Database name 
$tbl_name="members_info"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// Get values from form 
$lastname=$_POST['lastname'];
$firstname=$_POST['firstname'];
$middlename=$_POST['middlename'];
$completedby=$_POST['completedby'];
// $maiden=$_POST['maiden'];
$homeaddress=$_POST['homeaddress'];
$previousemployer=$_POST['previous_employer'];
$phonenumber=$_POST['phonenumber'];
$DOB = $_POST['dob'];
$SOO = $_POST['soo'];
$LGA = $_POST['lga'];
$brief_info = $_POST['brief_info'];
$identification = $_POST['id'];
$collect = "uploads/";
$collect = $collect . basename($_FILES["upload_File"]["name"]);
$uploadOK=1;

	if (move_uploaded_file($_FILES["upload_File"]["tmp_name"], $collect)) {
		echo "The file " .  basename($_FILES["upload_File"]["name"]). " has been uploaded.";
		} else {
			echo "sorry, there was an error uploading your file.";
			}
	if (file_exists($collect . $_FILES["upload_File"]["name"])) {
		echo "sorry, file already exists.";
		$uploadOK = 0;
	}
	/**if ($uploadFile_size > 500000) {
		echo "sorry, file too large.";
		$uploadOk = 0;
	}
	if ($uploadFile_type == "text/php") {
		echo "sorry, wrong file format. Try uploading a format such as  'gif',  'jpg',  'png' ";
		$uploadOK = 0;
	}*/





//move_uploaded_file($_POST['upload_File']['tmp_name'], ".../uploads/{$_POST['upload_File']['name']}");











// Insert data into mysql 
$sql="INSERT INTO $tbl_name (last_name, first_name, middle_name, aliases, maiden_name, street_address, previous_church, Phone_number, DOB, state_of_origin, LGA, brief_info, identification)
VALUES('$lastname', '$firstname', '$middlename', '$completedby', '$homeaddress', '$previousemployer', '$phonenumber', '$DOB', '$SOO', '$LGA', '$brief_info', '$identification' )";
$result=mysql_query($sql);

 //if successfully insert data into database, displays message "Successful". 
if($result){
echo "Successful";
echo "<BR>";
echo "<a href='church_form.html'>Back to main page</a>";
}

else {
echo "ERROR";
}
?> 

<?php 
// close connection 
mysql_close();
?>