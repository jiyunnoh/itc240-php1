<?php 
/* heredoc is a syntax that you would use for a massive amount of content
that has an abundance of single quotes and double quotes 
http://www.hackingwithphp.com/2/6/3/heredoc
*/

$book = "Handmaid's Tale";
$author = "Margaret Atwood";
$character = "June";
$actor = "Elizabeth Moss";

$content = <<< EOT
My favorite book is $book, written by $author, and is presently a
miniseries on HULU. Hulu's viewing audience is extremely excited about the
miniseries and looks forward to the 5th season of the award winning 
"Handmaid's Tale"! The $actor's rendition of $character is right on! 
Again, the content is displayed in white - it's not working!
EOT;

echo $content;





?>