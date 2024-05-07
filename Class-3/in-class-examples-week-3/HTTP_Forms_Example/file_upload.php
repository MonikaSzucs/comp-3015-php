<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$file = $_FILES['profile_picture']; // can access file through super global $_FILE
	$temporaryPath = $file['tmp_name'];
	$originalFileName = $file['name'];
	move_uploaded_file($temporaryPath, __DIR__ . "/images/$originalFileName"); // DIR will put in current directory server is runnign from and save it with original file name
	// Note that in an application that's not an example, we'll want to save the filename somewhere too,
    // so that we can access it on the filesystem later.
}
?>
<!doctype html>
<html lang="en">
<?php require_once 'layout/header.php'?>
<body>
<?php require_once 'layout/navigation.php'?>

<div class="container mx-auto mt-20">
    <h1 class="font-bold">Pick an image!</h1>
    <!-- mini uploads you must have this -->
    <form 
        action="file_upload.php" 
        method="post" 
        enctype="multipart/form-data" 
        id="file-upload-form">
        <input type="file" name="profile_picture">
        <div class="mt-10">
            <input type="submit" value="Upload Picture" class="inline-flex items-center rounded border border-transparent bg-indigo-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        </div>
    </form>
	<?php if (isset($originalFileName) && file_exists("images/$originalFileName")): ?>
        <img class="mt-10" src="<?= "images/$originalFileName" ?>" alt="Uploaded image">
	<?php endif; ?>
</div>

</body>
</html>

<style>
    #file-upload-form input[type='submit'] {
        cursor: pointer;
    }
</style>