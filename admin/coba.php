<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="coba.php" method="post">
                Input Angka <input type="text" name="angka1">
                Input Angka <input type="text" name="angka2">
                <input type="submit">
            </form>
            <?php  
            if (isset($_POST["angka1"])) {
                $angka1 = $_POST["angka1"];
                $angka2 = $_POST["angka2"];
                $hasil = $angka1 + $angka2;
                echo $hasil;                            
            }          
            ?>
</body>
</html>