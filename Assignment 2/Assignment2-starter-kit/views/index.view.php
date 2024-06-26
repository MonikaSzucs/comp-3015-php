<?php
use src\Repositories\ArticleRepository;
require_once 'header.php';
require_once '../src/Repositories/ArticleRepository.php';

$articleRepository = new ArticleRepository();
$articles = $articleRepository->getAllArticles();
?>

<body>

    <?php require_once 'nav.php' ?>

    <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">

        <h1 class="text-xl text-center font-semibold text-indigo-500 mt-10 mb-10 title">Articles</h1>

        <h6 class="text-center"><?= count($articles) === 0 ? "No articles yet :(" : "Take a look at all the articles:"; ?></h6>
                        
            <div class="sm:rounded-md">
                <ul role="list" class="divide-y divide-gray-200">
                    <?php foreach ($articles as $article): ?>
                        <li class="bg-blue-50">
                            <div class="inline-block">
                                <span class="block hover:bg-gray-50 p-0.5 rounded inline-block">
                                    <div class="flex items-center px-4 py-4 sm:px-6">
                                        <div class=" flex-1 sm:flex sm:items-center sm:justify-between">
                                            <div class="truncate">
                                                <div class="flex text-sm">
                                                    <p class="truncate font-medium text-indigo-600"><h2><?= htmlspecialchars($article->title) ?></h2></p>
                                                    <p class="px-4"><?= htmlspecialchars($article->url) ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </span>
                            </div>
                            <?php if(authenticateForEdit($article)): ?>
                                <div class="inline-block float-right mt-4 mr-4">
                                
                                    <div class="flex space-x-2"> 
                                        <form action="/update" method="POST">
                                            <input type="hidden" id="update_article_id" name="update_article_id" value=<?= $article->id ?>>
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="black" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </button>
                                        </form>

                                        
                                        <form action="/delete" method="POST">
                                            <input type="hidden" id="delete_article" name="delete_article" value=<?= $article->id ?>>

                                            <button>
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="red" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>                                            
                                        </form>
                                    </div>

                                </div>
                            <?php endif ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

    </div>

</body>