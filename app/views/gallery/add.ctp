<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputFile">Select image to upload:</label>
        <input name="files[]" id="file" type="file" multiple>
        <p class="help-block"><?php if(!empty($message)) { echo $message; }?></p>
    </div>
    <button id="button" type="submit" name="submit" class="btn btn-info">Add</button>
</form>



