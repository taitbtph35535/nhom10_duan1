<?php
function giaiPhuongTrinhBac2($a, $b, $c) {
    $delta = $b * $b - 4 * $a * $c;

    if ($delta > 0) {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        echo "Phương trình có hai nghiệm phân biệt:<br>";
        echo "x1 = $x1<br>";
        echo "x2 = $x2<br>";
    } elseif ($delta == 0) {
        $x = -$b / (2 * $a);
        echo "Phương trình có nghiệm kép:<br>";
        echo "x = $x<br>";
    } else {
        echo "Phương trình vô nghiệm";
    }
}
$a = 1;
$b = -5;
$c = 6;

giaiPhuongTrinhBac2($a, $b, $c);
?>