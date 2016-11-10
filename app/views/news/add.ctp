<form id="commentForm" method="post">
    <fieldset>
        <?php
            if ($error) {
                echo
                '<div class="alert alert-warning">
                  '.$error.'
                </div>';
        }
        ?>
        <div class="form-group">
            <label for="cauthor">Author (required)</label>
            <input id="cauthor" class="form-control" name="author" type="text" value="<?php echo (isset($data[0]->author) ? $data[0]->author : '')?>">
        </div>
        <div class="form-group">
            <label for="ctitle">Title (required)</label>
            <input id="ctitle" class="form-control" type="text" name="title" value="<?php echo (isset($data[0]->title) ? $data[0]->title : '')?>">
        </div>
        <div class="form-group">
            <label for="cprice">Price (required)</label>
            <input id="cprice" class="form-control" type="text" name="price" value="<?php echo (isset($data[0]->price) ? $data[0]->price : '')?>">
        </div>
        <div class="form-group">
            <label for="ctype">Type (required)</label>
            <input id="ctype" class="form-control" type="text" name="type" value="<?php echo (isset($data[0]->type) ? $data[0]->type : '')?>">
        </div>
        <div class="form-group">
            <label for="ccontent">Content (required)</label>
            <textarea id="ccontent" class="form-control" name="content" rows="3"><?php echo (isset($data[0]->content) ? $data[0]->content : '')?></textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Submit">
        </div>
    </fieldset>
</form>

<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.js"></script>-->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.1/jquery.validate.js"></script>-->
<!--<script>-->
<!--    $("#commentForm").validate();-->
<!--</script>-->






