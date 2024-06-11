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
            <span>
                <?= isset($user) && isset($user->username) ? '<a href="/logout"><button>Logout</button></a>' : '<a href="/login"><button>Sign In</button></a> <a href="/register"><button>Register</button></a>' ?>                <!-- <?php
                    // print_r($_SESSION);
                    print_r(userIsAunthenticated());
                    if (userIsAunthenticated()) {
                        $userRepository = new UserRepository();
		                $user = $userRepository->getUserById($_SESSION['user_id']);
                        print_r($user->email);
                        echo '<a href="/logout"><button>Logout</button></a>';
                        // Show the Logout button
                    } else {
                        // show login and register buttons
                        echo '<a href="/login"><button>Sign In</button></a>';
                        echo '<a href="/register"><button>Register</button></a>';
                    }
                    ?> -->
            </span>
            
            
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