<a class="btn btn-info" href="/news/overview">Back</a>
<p>
    <?php
    foreach($data as $row) {
        echo '
        Naam: '.$row['author'].' <br />
        Titel: '.$row['title'].' <br />
        Content: '.$row['content'].' <br />
        Datum: '.$row['date'].'';
    }
    ?>
</p>
