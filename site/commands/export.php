<?php

use Kirby\Data\Json;

return [
    'description' => 'Export content',
    'args' => [],
    'command' => static function($cli): void {

        // Get all pages including subpages
        $allPages = kirby()->site()->index();

        $data = [
            'pages' => [],
            'files' => []
        ];

        // Loop through the pages
        foreach ($allPages as $page) {
            /** @var \Kirby\Cms\Page $page */
            $cli->out('Exporting page: ' . $page->title());

            // Get custom fields
            $content = $page->toArray();

            // Bug? $content['template'] is output as an empty object, fix it
            $content['template'] = $page->template()->name();

            // Blocks fields are stored as a JSON string, decode them
            foreach (['bodycontent'] as $field) {
                if (isset($content['content'][$field])) {
                    $content['content'][$field] = Json::decode($content['content'][$field]);
                }
                if (isset($content['translations']['de']['content'][$field])) {
                    $content['translations']['de']['content'][$field] = Json::decode($content['translations']['de']['content'][$field]);
                }
                if (isset($content['translations']['en']['content'][$field])) {
                    $content['translations']['en']['content'][$field] = Json::decode($content['translations']['en']['content'][$field]);
                }
            }
            
            $data['pages'][] = $content;

            $files = $page->files();
            foreach ($files as $file) {
                /** @var \Kirby\Cms\File $file */

                $cli->out('   Exporting File: ' . $file->filename());
                $data['files'][] = $file->toArray();
            }
        }


        Json::write('./storage/export/data.json', $data);

        $cli->success('Done!');
    }
];
