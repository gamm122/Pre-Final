<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-Final 2</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style>
        .card {
            width: 640px;
        }
        * {

            font-family: 'Prompt', sans-serif;
        }

    </style>
</head>

<body>
    <div class="row">
        <div class="col-md-10 m-auto">
            <form action="pre-final2.php" method="post">
                <input type="text" id="finding" name="finding" placeholder="ระบุคำค้นหา" style="width: 70%; padding: 5px 15px; margin-top: 2%; margin-right: 1%">
                <input type="submit" class="btn btn-info" id="submit" value="SEARCH" style="width: 20%;">
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <?php
        $file = file_get_contents("https://dd-wtlab2020.netlify.app/pre-final/ezquiz.json");
        $json = json_decode($file);
        $tracks = $json->tracks;
        $items = $tracks->items;

        if (isset($_POST['finding'])) {
            $count = 0;
            $finding = $_POST['finding'];
            for ($i = 0; $i < sizeof($items); $i++) {
                if (strtolower($items[$i]->album->name) == strtolower($finding) or strtolower($items[$i]->artists[0]->name) == strtolower($finding)) {
                    $count++;
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
            }
            if ($count < 1) {
                echo "<div class='col-md-8 text-center'><span style='font-size: 120px'>NOT FOUND</span></div>";
            }
        } else {
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
        }
        ?>
    </div>

</body>

</html>