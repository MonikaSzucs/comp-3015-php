<?php

use src\Repositories\UserRepository;

// TODO: get the authenticated user if there is one, and conditonally render the appropriate buttons.
// 
// If the user is authenticated: show the new article button and logout button
// If we have a guest user: show the login and registration buttons

?>

<div class="navbar bg-indigo-500 text-primary-content">
    <div class="flex-1">
        <a class="btn btn-ghost normal-case text-xl" href="/">COMP 3015 News</a>
    </div>
    <li class="flex-none">
        <ul class="menu menu-horizontal px-1">
            <!-- TODO create the conditionally rendered buttons here -->
        </ul>
</div>

<style>
    .clickable {
        cursor: pointer;
    }

    .cover {
        object-fit: cover;
    }
</style>