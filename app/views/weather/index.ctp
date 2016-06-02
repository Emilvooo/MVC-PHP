<form class="marg-top" method="post">
    <div class="input-group">
        <label for="City">City:</label>
        <input type="text" name="city" class="form-control">
    </div>
    <br />
    <button id="button" type="submit" class="btn btn-info">City</button>
</form>
<p>
    <?php
        echo '<h4 class="panel-title-heading">Current Weather</h4>
        City: '. $weather->location->name.'
        <br>
        Region: '.$weather->location->region.'
        <br>
        Country: '.$weather->location->country.'
        <br>
        Lat: '.$weather->location->lat.' , Lon:'.$weather->location->lon.'
        <br>
        Temperature (&deg;C): '.$weather->current->temp_c;
    ?>
</p>