<form method="post">
    <div class="input-group">
        <pre><?php if(!empty($message)) { print_r($message); }?></pre>
        <input class="btn btn-danger" type="submit" name="submit" value="Delete">
    </div>
</form>
