<a href="/gallery/add" class="btn btn-info">Add</a><br>
<?php
    foreach($data as $row) {
        echo '<img src="../images/'.$row['path'].'" class="img-thumbnail" width="250" height="250">';
        echo '<p><a href="/gallery/delete/'.$row['id'].'">Delete</a></p>';
    }
?>
