<h5 class="panel-title-heading"><?php echo $message; ?></h5>
<form method="post" enctype="multipart/form-data">
    <div class="input-group">
        <label for="auteur">Select image to upload:</label>
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <button id="button" type="submit" name="submit" class="btn btn-info">Add</button>
</form>
