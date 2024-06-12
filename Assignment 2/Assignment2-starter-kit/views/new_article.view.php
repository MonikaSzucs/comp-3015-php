<?php require_once 'header.php'; ?>

<body>

    <?php require_once 'nav.php'; ?>

    <div class="grid grid-cols-12 mt-20">

        <form class="space-y-6 col-start-4 col-span-6" action="/articles/store" method="POST">
            <!-- TODO: add inputs for article creation -->

            <div class="pt-5">
					<span class="error"><?= isset($_GET['title_error']) ? htmlspecialchars($_GET['title_error']) : '' ?></span>
					<div class="text-xl font-bold">
						<label class="text-xl font-bold text-secondary mb-4" for="title">Title</label>
					</div>
					<div>
						<input id="title" type="text" name="title" placeholder="Title" class="bg-white text-black border-2 p-2">
					</div>
				</div>
				<div class="pt-5">
					<span class="error"><?= isset($_GET['link_error']) ? htmlspecialchars($_GET['link_error']) : '' ?></span>
					<div class="text-xl font-bold">
						<label class="text-xl font-bold text-secondary mb-4" for="link">Link</label>
					</div>
					<div>
						<input id="link" type="text" name="link" placeholder="Link" class="bg-white text-black border-2 p-2">
					</div>
				</div>
				<div class="mt-2">
					<button type="submit" class="btn bg-white hover:bg-priamry">
						Submit
					</button>
				</div>
        </form>

    </div>

</body>