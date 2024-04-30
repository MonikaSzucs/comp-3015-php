<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FizzBuzz in PHP!</title>
</head>

<body>
    <?php for ($i = 1; $i <= 100; $i++) : ?>
        <?php if ($i % 3 === 0 && $i % 5 === 0) : ?>
            <strong>FizzBuzz</strong>
        <?php elseif ($i % 3 === 0) : ?>
            <strong>Fizz</strong>
        <?php elseif ($i % 5 === 0) : ?>
            <strong>Buzz</strong>
        <?php else : ?>
            <?= $i ?>
        <?php endif ?>
        <br />
    <?php endfor ?>
</body>

</html>