<?php
// Lab 1, part 2
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 1, Part 2</title>
</head>

<body>
    <?php for($i = $start; $i < 100; $i++): 
    // write your FizzBuzz program here
    // want to use alternative syntax - write it like this format below with these brackets
    ?>
        <div>
            <?php if ($i % 3 === 0 && $i % 5 === 0):?>
                <?php echo "FizzBuzz" ?>
            <?php elseif ($i % 3 === 0):?>
                <?php echo "Fizz" ?>
            <?php elseif ($i % 5 === 0):?>
                <?php echo "Buzz" ?>
            <?php else:?>
                <?php echo $i ?>
            <?php endif; ?>
        </div>
    <?php endfor; ?>
</body>

</html>