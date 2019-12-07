<?php
//This is going to be our people page!!

include('config.php');

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
} else {
    header('Location:people.php');

} //end if statement

$sql = 'SELECT * FROM People WHERE PeopleID = '.$id.'';

// We need to connect to the database
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error()));

// We need to extract the data
$result = mysqli_query($iConn, $sql) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error($iConn)));


// We need an if statement asking if we have more than 0 row.

if(mysqli_num_rows($result) > 0) { // show the records
    while($row = mysqli_fetch_assoc($result)) { // the mysqli fetch associative array will display the contents of the row
        $FirstName = stripslashes($row['FirstName']);
        $LastName = stripslashes($row['LastName']);
        $Occupation = stripslashes($row['Occupation']);
        $Email = stripslashes($row['Email']);
        $BirthDate = stripslashes($row['BirthDate']);
        $Description = stripslashes($row['Description']);
        $Feedback = '';
    } // end while loop
} else // end if statement and what if not people exist?
{
    $Feedback = 'Hey, this person or product does not exist.';
}

//include('includes/header.php'); In the people view page, the header include will appear below
?>

<h2><?php echo $FirstName; ?></h2>
<?php 
echo '<ul>';
echo '<li><strong>First Name: </strong>'.$FirstName.'</li>';
echo '<li><strong>Last Name: </strong>'.$LastName.'</li>';
echo '<li><strong>Occupation: </strong>'.$Occupation.'</li>';
echo '<li><strong>Email: </strong>'.$Email.'</li>';
echo '<li><strong>Birth Date: </strong>'.$BirthDate.'</li>';
echo '</ul>';

echo '<img src="uploads/people'.$id.'.jpg" alt="'.$FirstName.' '.$LastName.'">';


// release web server
@mysqli_free_result($result);

//close the connection
@mysqli_close($iConn);

//include('includes/footer.php');
?>