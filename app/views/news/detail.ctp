<p>
    <?php
    foreach($data as $row) {
        echo '
        <p>
        Naam: '.$row->author.' </br>
        Titel: '.$row->title.' </br>
        Content: '.$row->content.' </br>
        Price: '.$row->price.' </br>
        Type: '.$row->type.' </br>
        Datum: '.$row->date.'</br>
        </p>';
    }
    ?>
</p>
