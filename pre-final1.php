<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Final 1</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Prompt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        /* .card {
            width: 640px !important;
        } */
        span {
            font-size: 20px;
        }

        * {

            font-family: 'Prompt', sans-serif;
        }
    </style>
</head>

<body>
    <div class="row">
        <?php
        $file = file_get_contents("https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json");
        $json = json_decode($file);
        $tracks = $json->tracks;
        $items = $tracks->items;

        for ($i = 0; $i < sizeof($items); $i++) {
            echo "<div class='card'>";
            foreach ($items[$i]->album->images as $img) {
                if ($img->height == 640) {
                    echo "<img class'card-img-top' src='" . $img->url . "'>";
                }
            }
            echo "<div class='card-body'>";
            echo "<h4 class='card-title'>" . $items[$i]->album->name . "</h4>";
            echo "<span>Artist&nbsp;:&nbsp" . $items[$i]->artists[0]->name . "</span><br>";
            echo "<span>Release Date&nbsp;:&nbsp" . $items[$i]->album->release_date . "</span><br>";
            echo "<span>Availble&nbsp:&nbsp" . sizeof($items[$i]->available_markets) . " countries</span>";
            echo "</div></div>";
        }
        ?>
    </div>

</body>

</html>