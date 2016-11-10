<?php
if (isset($_SESSION['user'])) {
    echo $data;
}
else {
    echo ':(';
}
?>
