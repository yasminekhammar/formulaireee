<?php
$con = mysqli_connect('localhost','root','','admin_db');

if($con)
{
    echo'';
}
else{
    echo mysqli_error($con);
}

?>