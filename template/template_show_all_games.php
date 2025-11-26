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
    <main class="container">
        <section class="grid">
            <p>Essai !</p>
            <?php foreach ($data["games"] as $game): ?>
                <article>
                    <h2><?= $game["title"] ?></h2>
                    <p><?= $game["type"] ?></p>
                    <p><?= $game["publish_at"] ?></p>
                    <p><?= $game["name"] ?></p>
                </article>
            <?php endforeach ?>
        </section>
    </main>
</body>
</html>