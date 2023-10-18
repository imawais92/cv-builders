<?php
// Assuming you have a database connection established
include('includes/db.php');

$user_id = $_SESSION['user_id']; // Replace with the user_id you want to retrieve data for

// Define an array to store the data from each table
$mainArray = array();

// Retrieve data from the 'education' table
$query = "SELECT `edu_id`, `user_id`, `instutute_name`, `dagree`, `total_marks`, `obtain_marks`, `deg_st_date`, `deg_end_date`, `field`, `data_time` FROM `education` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$x = 0;
while ($r = mysqli_fetch_assoc($q)) :
  $mainArray['education'][$x] = $r;
  $x++;
endwhile;
// Retrieve data from the 'hobbies' table
$query = "SELECT `hobbies_id`, `user_id`, `hobby`, `date_time` FROM `hobbies` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$h = 0;
while ($r = mysqli_fetch_assoc($q)) :
  $mainArray['hobbies'][$h] = $r;
  $h++;
endwhile;


// Retrieve data from the 'languages' table
$query = "SELECT `lang_id`, `user_id`, `language`, `date_time` FROM `languages` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$l = 0;
while ($r = mysqli_fetch_assoc($q)) :
  $mainArray['languages'][$l] = $r;
  $l++;
endwhile;

// Retrieve data from the 'reference' table
$query = "SELECT * FROM `user_references` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$ref = 0;
while ($r = mysqli_fetch_assoc($q)) :
  $mainArray['user_references'][$ref] = $r;
  $ref++;
endwhile;

// Retrieve data from the 'Skills' table
$query = "SELECT * FROM `skills` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$s = 0;
while ($r = mysqli_fetch_assoc($q)) :
  $mainArray['skills'][$s] = $r;
  $s++;
endwhile;

// Retrieve data from the 'work Exp' table
$query = "SELECT * FROM `work_exp` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$wx = 0;
while ($r = mysqli_fetch_assoc($q)) :
  $mainArray['work_exp'][$wx] = $r;
  $wx++;
endwhile;

// Retrieve data from the 'Per_information' table
$query = "SELECT * FROM `per_info` WHERE `user_id` = '$user_id'";
$q = mysqli_query($conn, $query);
$r = mysqli_fetch_assoc($q);
$mainArray['per_info'] = $r;

if ($r) {
  header('location: select.php');
}



// Repeat the above steps for other tables (per_info, skills, user_references, work_exp) as needed

// Output the main array as JSON
$mainArrayJson = json_encode($mainArray);

// Output the JSON
echo $mainArrayJson;


// Define the file name for the second JSON file
$secondJsonFileName = 'res.json';

// Write the JSON data to the second JSON file
file_put_contents($secondJsonFileName, $mainArrayJson);

echo "JSON data has been written to $secondJsonFileName";
