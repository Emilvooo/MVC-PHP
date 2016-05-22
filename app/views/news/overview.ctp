<table class="table">
    <tr>
        <th>Naam</th>
        <th>Title</th>
        <th>Content</th>
        <th>Action</th>
    </tr>
    <?php
        foreach($data as $row)
        {
            echo '
            <tr>
                <td>'.$row['author'].'</td>
                <td>'.$row['title'].'</td>
                <td>'.$row['content'].'</td>
                <td>
                    <a href="/news/detail/'.$row['id'].'" class="btn btn-info">Show</a>
                    <a href="/news/add/'.$row['id'].'" class="btn btn-info">Edit</a>
                    <a href="/news/delete/'.$row['id'].'" class="btn btn-danger">Delete</a>
                </td>
            </tr>';
        }
    ?>
</table>
