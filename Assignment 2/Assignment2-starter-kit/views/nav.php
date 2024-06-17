<?php

use src\Repositories\UserRepository;

$image_dir_path = "../public/images/";

$currentImage = file_exists($image_dir_path . $_SESSION['user_id'] . ".jpg");

if ($currentImage) {
    $currentImage = $_SESSION['user_id'] . ".jpg";
} else {
    $currentImage = "default.jpg";
}

// TODO: get the authenticated user if there is one, and conditonally render the appropriate buttons.
// 
// If the user is authenticated: show the new article button and logout button
// If we have a guest user: show the login and registration buttons

?>

<div class="navbar bg-indigo-500 text-primary-content">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl" href="/">COMP 3015 News</a>
        <a href="/">All Articles</a>
        <?php if(isset($_SESSION['user_id'])): ?>
            <a href="/new_article">New Article</a>
        <?php endif; ?>
    </div>

    <li class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <!-- TODO create the conditionally rendered buttons here -->
            <?php if(isset($_SESSION['user_id'])): ?>
                <form action="/settings" method="POST">
                    <button type="submit">
                        <img src="<?php echo image($currentImage)?>" alt="" width="40" style="border-radius: 25px;">
                    </button>
                </form>
                
                <?php
                    $current_user = (new UserRepository())->getUserById($_SESSION['user_id']);
                    echo $current_user->name;
                ?>
                <form action="/logout" method="post">
                    <input type="submit" value="logout">
                </form>
            <?php else: ?>
                <?php
                echo '<a href="/login" style="padding-right: 10px;"><button>Sign In</button></a>';
                echo '<a href="/register"><button>Register</button></a>';
            ?>
            <?php endif; ?>
        </ul>
    </li>
</div>

<style>
    .clickable {
        cursor: pointer;
    }

    .cover {
        object-fit: cover;
    }
</style>