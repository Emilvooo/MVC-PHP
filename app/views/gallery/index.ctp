<a href="/gallery/add" class="btn btn-info">Add</a><br>
<div class="row">
    <?php
    foreach($data as $row) {
        echo '
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="../images/'.$row->path.'" class="img-thumbnail">
                <div class="caption">
                     <p></p>
                    <p><a href="/gallery/delete/'.$row->id.'" class="btn btn-danger btn-sm" role="button">Delete</a></p>
                </div>
            </div>
        </div>';
    }
    ?>
</div>
