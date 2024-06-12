<?php require_once 'header.php'; ?>

<?php require_once 'nav.php' ?>
<div class="mx-auto max-w-4xl sm:px-6 lg:px-8 mt-10">
    <form class="space-y-8" action="/settings" method="post" enctype="multipart/form-data">
        <!-- TODO add settings form inputs -->
         <!-- // back to week 3 this is where file upload example is ther eis a move uplaoded file call -->
        <input type="file" name="profile_picture">
        <div class="mt-10">
            <input type="submit" value="Upload Picture" class="inline-flex items-center rounded border border-transparent bg-indigo-600 px-2.5 py-1.5 text-xs font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
        </div>
    </form>

</div>
