<html>
<head>
    <title>Add songs to Album</title>
</head>
<body>
    <?php
    $name = $_POST['name'];
    echo "<h1>$name</h1>"; 
    ?>
    <h2>Song Details</h2>
    <form action="createAlbum_Form.php" method="post">
        <?php
        echo "<input type='hidden' name='albumName' value='$_POST[name]'>";
        echo "<input type='hidden' name='albumGenre' value='$_POST[genre]'>";
        echo "<input type='hidden' name='albumArtwork' value='$_POST[artwork]'>";
        echo "<input type='hidden' name='albumNumSongs' value='$_POST[numSongs]'>";
        for($i = 0; $i < $_POST['numSongs']; $i++) {
            echo "Title: <input type='text' name='songName[]' size='30' required>";
            echo "Length: <input type='text' name='songLength[]' size='30' required><br><br>";
        }
        ?>    
        <input type="submit" name="submit" value="Finish">
    </form>
</body>
</html>