<?php
require_once 'header.php'
?>

<body>

    <?php require_once 'nav.php' ?>

    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

        <h1 class="text-xl text-center font-semibold text-indigo-500 mt-10 mb-10 title">Articles</h1>

        <h6 class="text-center"><?= count($articles) === 0 ? "No articles yet :(" : ""; ?></span>

            <div class="sm:rounded-md">
                <ul role="list" class="mb-20">
                    <!-- TODO: display each article -->
                </ul>
            </div>

    </div>

</body>