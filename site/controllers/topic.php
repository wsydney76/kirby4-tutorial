<?php
/**
 * Controllers allow you to separate the logic of your templates from your markup.
 * This is especially useful for complex logic, but also in general to keep your templates clean.
 *
 * In this example, we handle tag filtering and paginating notes in the controller,
 * before we pass the currently active tag and the notes to the template.
 *
 * More about controllers:
 * https://getkirby.com/docs/guide/templates/controllers
 */

use Illuminate\Support\Collection;

return function ($page, $pages) {

    // https://forum.getkirby.com/t/reverse-query-for-related-pages/12849/2

    $descendants = $page->index();

    $posts = collection('posts')->filter(function($post) use ($page, $descendants) {

        foreach ($descendants as $descendant) {
            if ($post->topics()->toPages()->has($descendant)) {
                return true;
            }
        }

        return $post->topics()->toPages()->has($page);
    });

    $latestPost = $posts->first();

    return [
        'posts' => Collection::make($posts->paginate(option('custom.cardsPerPage', 6))),
        'pagination' => $posts->pagination(),
        'latestPost' => $latestPost
    ];


};
