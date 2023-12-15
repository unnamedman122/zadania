<?php
$c = mysqli_connect("localhost", "root", "", "zad29");
if (mysqli_connect_error()) {
    echo "Bląd numer " . mysqli_connect_errno();
}else{


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dane o zwierzętach</title>
    <link rel="stylesheet" href="styl3.css">
</head>

<body>
    <header>
        <h1>„ATLAS ZWIERZĄT</h1>
    </header>
    <div class="form">
        <h2>Gromady:</h2>
        <ol>
            <li>ryby</li>
            <li>plazy</li>
            <li>ssaki</li>
            <li>ptaki</li>
            <li>gady</li>
        </ol>
        <form action="./index.php" method="post">
            <label for="gromada">Wybierz gromadę: </label>
            <input type="number" name="gromada" id="gromada">
            <button type="submit">Wyświetl</button>
        </form>
    </div>
    <main>
        <div class="left">
            <img src="zwierzeta.jpg" alt="dzikie zwierzęta">
        </div>
        <div class="bet">
            <h2>
            <?php
            if ($_SERVER["REQUEST_METHOD"]=="POST" && !is_null($_POST)) {
                $g = $_POST["gromada"];
            switch ($g) {
                case '1':
                    echo "RYBY";
                    break;
                case '2':
                    echo "PLAZY";
                    break;
                case '3':
                    echo "GADY";
                    break;
                case '4':
                    echo "PTAKI";
                    break;
                case '5':
                    echo "SSAKI";
                    break;
                default:
                    echo "XHI ZI PIN";
                    break;
            }

            ?>
            </h2>
            <p>
            <?php
            $q="SELECT `gatunek`,`wystepowanie` FROM `zwierzeta` WHERE `Gromady_id`=$g; ";
            $r=mysqli_query($c,$q);
            if ($r) {
                while ($row=mysqli_fetch_assoc($r)) {
                    echo"</br> {$row['gatunek']}, {$row['wystepowanie']}";
                }
            }
        }
            ?>
            </p>
        </div>
        <div class="right">
            <h2>Wszystkie zwierzęta w bazie</h2>
            <?php
            $q2="SELECT zwierzeta.id,zwierzeta.gatunek,gromady.nazwa from zwierzeta INNER JOIN gromady ON gromady.id = `Gromady_id`; ";
            $r2=mysqli_query($c,$q2);
            if ($r2) {
                while ($row=mysqli_fetch_row($r2)) {
                    echo"</br> {$row['0']}, {$row['1']},{$row['2']}";
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <a href="http://atlas-zwierzat.pl">Poznaj inne strony o zwierzętach</a>
        <p>autor Atlasu zwierząt:Markiian Zhylchenko</p>
    </footer>
</body>

</html>

<?php
}
mysqli_close($c);
?>