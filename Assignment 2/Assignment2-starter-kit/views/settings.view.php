<?php

use src\Repositories\UserRepository;

require_once 'header.php'; 

$image_dir_path = "../public/images/";

$currentUser = (new UserRepository())->getUserById($_SESSION['user_id']);
$currentImage = file_exists($image_dir_path . $_SESSION['user_id'] . ".jpg");

if ($currentImage) {
    $currentImage = $_SESSION['user_id'] . ".jpg";
} else {
    $currentImage = "default.jpg";
}
print_r("user id " . $_SESSION['user_id']);
print_r("current image: " . $currentImage);
print_r($image_dir_path . $_SESSION['user_id'] . ".jpg");
?>

<?php require_once 'nav.php' ?>
<div class="mx-auto max-w-4xl sm:px-6 lg:px-8 mt-10">
    <form class="space-y-8" action="/settings/save" method="POST" enctype="multipart/form-data">
        <!-- TODO add settings form inputs -->
         <!-- // back to week 3 this is where file upload example is ther eis a move uplaoded file call -->
        
        <label for="email" class="text-white"> Email address </label>
        <div class="mt-1">
            <input id="email" disabled name="email" type="email" value=<?= $currentUser->email ?> autocomplete="email" required class="input input-bordered w-full max-w-xs">
        </div>
        <label for="name" class="text-white"> Name </label>
        <div class="mt-1">
            <input id="name" name="name" type="text" value=<?= $currentUser->name ?> autocomplete="name" required class="input input-bordered w-full max-w-xs">
        </div>

        <label for="photo" class="text-white"> photo </label>
        <img src="<?php echo image($currentImage)?>" alt="" width="40" style="border-radius: 25px;"">

        <input type="file" name="profile_picture" accept=".jpg">

        <div class="mt-10">
            <input type="submit" value="Save" class="inline-flex items-center rounded border border-transparent bg-indigo-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        </div>
    </form>
</div>
