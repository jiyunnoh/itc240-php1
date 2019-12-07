<?php
//This is going to be our people page!!

include('config.php');
//include('includes/header.php');

$sql = 'SELECT * FROM People';

// We need to connect to the database
$iConn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error()));

// We need to extract the data
$result = mysqli_query($iConn, $sql) or
die(myerror(__FILE__, __LINE__, mysqli_connect_error($iConn)));


// We need an if statement asking if we have more than 0 row.

if(mysqli_num_rows($result) > 0) { // show the records
    while($row = mysqli_fetch_assoc($result)) { // the mysqli fetch associative array will display the contents of the row
        echo '<ul>';
        echo '<li class="large">For more info about <a href="people-view.php?id='.$row['PeopleID'].'"> '.$row['FirstName'].' </a> </li>';
        echo '<li> '.$row['FirstName'].' </li>';
        echo '<li> '.$row['LastName'].' </li>';
        echo '<li> '.$row['Occupation'].' </li>';
        echo '</ul>';
    } // end while loop
} else // end if statement and what if not people exist?
{
    echo 'Sorry, no candidates!';
}

// release web server
@mysqli_free_result($result);

//close the connection
@mysqli_close($iConn);

//include('includes/footer.php');
