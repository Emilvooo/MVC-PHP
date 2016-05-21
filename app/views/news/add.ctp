<a class="btn btn-info" href="/news/overview">Terug naar het overzicht</a>
<form class="marg-top" method="post">
    <div class="input-group">
        <label for="auteur">Auteur:</label>
        <input type="text" name="author" class="form-control" value="<?php echo $data[0]['author'] ?>">
    </div>
    <div class="input-group">
        <label for="titel">Titel:</label>
        <input type="text" name="title" class="form-control" value="<?php echo $data[0]['title'] ?>">
    </div>
    <div class="input-group">
        <label for="tekst">Tekst:</label>
        <textarea style="height: 100px;" rows="4" cols="50" name="content" class="form-control"><?php echo $data[0]['content'] ?></textarea>
    </div>
    <br />
    <button id="button" type="submit" class="btn btn-info"><?php echo (isset($_GET['id']) ? 'Edit' : 'Add')?></button>
</form>



