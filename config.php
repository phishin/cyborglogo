<?php

use Illuminate\Support\Str;

return [


    'baseUrl' => 'http://localhost',

    'siteUrl' => 'http://localhost',

    'production' => false,

    'siteName' => 'Cyborg Logo',

    'siteDescription' => 'The official site of Cyborg Logo LLC.',

    'siteJsonLd' => '',

    'siteAnalytics' => '',

    'customPages' => [

    ],

    'pages' => [
        'home' => [],
        'createMyLogo' => [],
    ],

    'global' => [

    ],

    'collections' => [

        'posts' => [

            'author' => 'Website',

            'sort' => '-date',

            'extends' => '_layouts.post',

            'path' => '/news_and_stuff/{filename}',

            'items' => [


            ]

        ],

        'categories' => [

            'path' => '/news_and_stuff/categories/{filename}',

            'extends' => '_layouts.category',

            'items' => [

                [
                    'title' => 'CMS',
                    'filename' => 'cms',
                ],
                [
                    'title' => 'First',
                    'filename' => 'first',
                ],
                [
                    'title' => 'Second Post',
                    'filename' => 'second-post',
                ],
                [
                    'title' => 'Third Post',
                    'filename' => 'third-post',
                ],
                [
                    'title' => 'test',
                    'filename' => 'test',
                ],
                [
                    'title' => 'Another Test With A SPace',
                    'filename' => 'another-test-with-a-space',
                ],


            ],

            'posts' => function ($page, $allPosts) {

                return $allPosts->filter(function ($post) use ($page) {

                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },

        ],

    ],

    'getDate' => function ($page) {

        return Datetime::createFromFormat('U', strtotime($page->date));
    },

    'getExcerpt' => function ($page, $length = 255) {

        $content = $page->excerpt ?? $page->getContent();

        $content = html_entity_decode($content);

        $cleaned = strip_tags(

            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),

            '<code>'

        );



        $truncated = substr($cleaned, 0, $length);



        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {

            $truncated .= '</code>';
        }



        return strlen($cleaned) > $length

            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'

            : $cleaned;
    },

    'isActive' => function ($page, $path) {

        return Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },

];
