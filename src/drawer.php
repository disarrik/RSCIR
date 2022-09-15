<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drawer</title>
</head>
<body>
    <?php 

        include 'drawer_helper.php';

        $num = $_GET['num'];
        $num = (int)$num & 0b111111111111;

        $shape_tag = $shape_tags[$num & 0b000000001111];
        $color_style = $color_styles[($num & 0b000011110000) >> 4];
        $canvas_dimension = $canvas_dimensions[($num & 0b111100000000) >> 8];
    ?>

    <svg width="<?=$canvas_dimension?>" height="<?=$canvas_dimension?>">
        <?php
            switch ($shape_tag) {
                case 'rect':
                    echo "<rect width=\"$canvas_dimension\" height=\"$canvas_dimension\" style=\"fill: $color_style\"/>";
                    break;
                case 'circle':
                    echo "<circle cx=\"" . $canvas_dimension/2 . "\" cy=\"" . 
                    $canvas_dimension/2 ."\" r=\"" . $canvas_dimension/2 . "\" style=\"fill: $color_style\"/>";
                    break;
            }
        ?>
    </svg>
</body>
</html>