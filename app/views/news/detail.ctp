<div class="container">
    <a class="btn btn-info" href="/news/overview">Terug naar het overzicht</a>
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
</div>
