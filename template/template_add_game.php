<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title><?= $title ?></title>
</head>
<body>
    <?php include 'component/navbar.php'?>
    <main>
        <form action="" method="post">
            <input type="text" name="title" placeholder="Saisir le titre">
            <input type="text" name="type" placeholder="Saisir le type">
            <input type="date" name="publish_at" placeholder="Date de publication">
            <select name="id_console">
                <option>
                    Veuillez sélectionner sur quelle console est jouable le jeu :
                </option>
                <?php foreach($data['console'] as $console): ?>
                    <option value="<?= $console["id"] ?>"><?= $console["name"] ?></option>
                <?php endforeach ?>
            </select>
            <input type="submit" name="submit">
        </form>
    </main>    
</body>
</html>