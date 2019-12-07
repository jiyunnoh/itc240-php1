<?php 
// We are going to declare an array

$people['Donald_Trump'] = 'trump_President from NY';
$people['Joe_Biden'] = 'biden_Vice President from PA';
$people['Hilary_Clinton'] = 'clint_Secretary from NY';
$people['Bernie_Sanders'] = 'sande_Senator from VT';
$people['Elizabeth_Warren'] = 'warre_Senator from MA';
$people['Kamala_Harris'] = 'harri_Senator from CA';
$people['Cory_Booker'] = 'booke_Senator from NY';
$people['Andrew_Yang'] = 'ayang_Entrepreneur from NY';
$people['Pete Buttigieg'] = 'butti_Mayor from IN';
$people['Amy Klobuchar'] = 'klobu_Senator from MN';
$people['Julian Castro'] = 'castr_Housing/Urban from TX';

?>

<!doctype html>
<html>
<head>
<title>Candidates</title>
<style>
table {
    width: 580px;
    margin: 20px auto;
}

td {
    width: 33%;
}

table img {
    width: 180px;
}

</style>
</head>

<body>

<table>
<?php foreach($people as $full_name => $image) : ?>
<tr>

<td><img src="images/<?php echo substr($image, 0, 5); ?>.jpg" 
alt="<?php echo htmlspecialchars($full_name); ?>">
</td>

<td><?php echo str_replace('_', ' ', $full_name); ?>
</td>

<td><?php echo substr($image, 6); ?>
</td>

</tr>
<?php endforeach; ?>
</table>

</body>

</html>

