<?php
// PHP 8.0 feature

// $user?->getPassword(); <- null-safe method access

// $user?->password; <- null-safe property access. Note: password is private though. 

require_once 'UserRepository.php';

$userRepository = new UserRepository;
$user = $userRepository->getUser('christian_fenn@bcit.ca');
// if(isset($user)) {
//     // we know calling methods is safe
// }
echo ($user?->getAge() ?? 'Unknown.') . PHP_EOL;
