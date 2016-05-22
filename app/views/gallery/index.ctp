<a href="/gallery/add" class="btn btn-info">Add</a><br>
<?php
foreach($images as $image) {
     echo '<img src="'.$image.'" class="img-thumbnail" width="250" height="250">';
}
?>
