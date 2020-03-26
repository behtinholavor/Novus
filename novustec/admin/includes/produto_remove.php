<?php
include 'config.php';

if(isset($_GET['produto_id'])) {
    $result = mysql_query("DELETE FROM `produtos` WHERE produto_id='".mysql_real_escape_string($_GET['produto_id']). "'");
    echo mysql_error();
    if($result)
        echo "succces";

} else {
    echo 'GET NOT SET';
}
 
 
?>