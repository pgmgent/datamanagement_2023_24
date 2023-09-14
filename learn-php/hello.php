<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello world</title>
</head>
<body>
    <?php 
    $person = $_GET['person'] ?? 'you';
    echo "<h1>Hi, $person</h1>"; 
    ?>

    <form>
        <label for="person">Wie ben jij?</label>
        <input type="text" name="person">
        <button>Verstuur</button>
    </form>
</body>
</html>