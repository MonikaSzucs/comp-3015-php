<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>COMP 3015</title>
    </head>
    <body>
        <?php if (isset($_GET['username'])) : ?>
            <!-- htmlspecialchars will not allow cross site scripting for add script tag to be added to url ->
            <?= htmlspecialchars($_GET['username']) ?> ! Welcome to the site! 
        <?php endif ?>
    </body>
</html>