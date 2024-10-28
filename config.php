<?php

use Illuminate\Support\Str;

return [


    'baseUrl' => 'http://localhost',

    'siteUrl' => 'http://localhost',

    'production' => false,

    'siteName' => 'Primitive CMS',

    'siteDescription' => 'This is just a demo of the new CMS tool.',

    'siteJsonLd' => '',

    'siteAnalytics' => '',

    'customPages' => [

        'anotherExamplePage' => [
            'title' => 'Another Example Page',
            'description' => '',
            'is_custom' => '1',
            'url' => 'another-example-page',
            'show_in_nav' => '1',
            'template' => 'Example',
        ],
        'customPageExample' => [
            'title' => 'Custom Page Example',
            'description' => '',
            'is_custom' => '1',
            'url' => 'custom-page-example',
            'show_in_nav' => '1',
            'template' => 'Example',
        ],


    ],

    'pages' => ['home' => ['hero' => ['hero_title' => 'Primitive CMS', 'hero_subtitle' => 'This is just a test to see if this actually works.', 'hero_button_text' => 'Learn More', 'hero_image' => 'https://primitive-cms-bucket.s3.us-east-2.amazonaws.com/uploads/SUeX7eGKCk438lIFBqAZepDpgyRntlq0JjDAh339.png',], 'intro' => ['title' => 'Featured Products', 'first_title' => 'Product #1', 'first_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'first_image' => 'https://primitive-cms-bucket.s3.us-east-2.amazonaws.com/uploads/SWIWiej0YWTyleQItb7A39fGiRbCO8WBj7uZhWoV.png', 'second_title' => 'Second Product', 'second_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'second_image' => 'https://primitive-cms-bucket.s3.us-east-2.amazonaws.com/uploads/68vUXEBOfW6Tj3qnLmLC26nbND2LFRNx2HQNarY7.png',], 'cta' => ['title' => 'Don&#039;t Miss Something', 'description' => 'This is where a really good CTA line goes.', 'button_text' => 'Click Here',],], 'aboutUs' => ['hero' => ['title' => 'About Us', 'sub_title' => 'Some subtitle that is really good.',], 'intro' => ['title' => 'Meet Our Team', 'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',], 'team' => [['photo' => 'https://primitive-cms-bucket.s3.us-east-2.amazonaws.com/uploads/pdI0pGcFz7oj49CobdSGRbzSjU3HuwQX9fcNkIRJ.png', 'name' => 'Jessica Hicks', 'title' => 'Client Services',], ['photo' => 'https://primitive-cms-bucket.s3.us-east-2.amazonaws.com/uploads/yihTFWT5Sw2xe76esUvhsipeKdV2jTcbkPi1ARub.png', 'name' => 'Trey Woodward', 'title' => 'Product Team',], ['photo' => 'https://primitive-cms-bucket.s3.us-east-2.amazonaws.com/uploads/iwaptyIBNPI8tBeAwo6qnzSwax6hXQVePQxEvSGR.jpeg', 'name' => 'Max', 'title' => 'Bossman',],],],],

    'global' => [

        'navLinks' => [
            [
                'title' => 'Contact',
                'page_url' => '/contact',
            ],
            [
                'title' => 'Home',
                'page_url' => '/',
            ],
            [
                'title' => 'News',
                'page_url' => '/news',
            ],
        ],


    ],

    'collections' => [

        'posts' => [

            'author' => 'Website',

            'sort' => '-date',

            'extends' => '_layouts.post',

            'path' => '/news_and_stuff/{filename}',

            'items' => [

                [
                    'title' => 'Again',
                    'author' => '',
                    'content' => '&lt;p&gt;test&lt;/p&gt;',
                    'date' => '2020-07-29',
                    'description' => '',
                    'cover_image' => '',
                    'filename' => 'again',
                    'featured' => false,
                    'categories' => [],
                    'postExtras' => [
                        'sub_title' => '',
                    ],
                    'gallery' => [],
                ],
                [
                    'title' => 'Test-1',
                    'author' => '',
                    'content' => '&lt;p&gt;test&lt;/p&gt;',
                    'date' => '2020-07-29',
                    'description' => '',
                    'cover_image' => '',
                    'filename' => 'test-1',
                    'featured' => false,
                    'categories' => [],
                    'postExtras' => [
                        'sub_title' => 'Testing Update',
                    ],
                    'gallery' => [],
                ],
                [
                    'title' => 'Scheduled Test',
                    'author' => 'Jerred',
                    'content' => '&lt;p&gt;test&lt;/p&gt;',
                    'date' => '2020-07-03',
                    'description' => '',
                    'cover_image' => '',
                    'filename' => 'scheduled_test',
                    'featured' => false,
                    'categories' => [],
                    'postExtras' => [
                        'sub_title' => '',
                    ],
                    'gallery' => [],
                ],
                [
                    'title' => 'Testing Post',
                    'author' => '',
                    'content' => '&lt;p&gt;Test content for &lt;strong&gt;&lt;em&gt;&lt;u&gt;post&lt;/u&gt;&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;',
                    'date' => '2020-06-26',
                    'description' => '',
                    'cover_image' => '',
                    'filename' => 'testing_post',
                    'featured' => false,
                    'categories' => [],
                    'postExtras' => [
                        'sub_title' => '',
                    ],
                    'gallery' => [],
                ],
                [
                    'title' => 'Test',
                    'author' => '',
                    'content' => '&lt;p&gt;This is a test post&lt;/p&gt;',
                    'date' => '2020-05-19',
                    'description' => '',
                    'cover_image' => 'https://files.myprimitive.cloud/uploads/629f24947f8414c0b200dc18c15759c94930eb3b.jpg',
                    'filename' => 'test',
                    'featured' => false,
                    'categories' => ['another-test-with-a-space',],
                    'postExtras' => [
                        'sub_title' => '',
                    ],
                    'gallery' => [],
                ],
                [
                    'title' => 'This is a test post',
                    'author' => '',
                    'content' => '&lt;p&gt;This content is dummy content&lt;/p&gt;',
                    'date' => '2020-05-19',
                    'description' => '',
                    'cover_image' => '',
                    'filename' => 'this_is_a_test_post',
                    'featured' => true,
                    'categories' => [],
                    'postExtras' => [
                        'sub_title' => '',
                    ],
                    'gallery' => [],
                ],
                [
                    'title' => 'Test Post with ` @ # $ &amp; * ( ) - / Special',
                    'author' => 'Jerred',
                    'content' => '&lt;p&gt; asfd sadf dsaf asdf sadf sdaf asdf dsaf dasf &lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;',
                    'date' => '2020-03-14',
                    'description' => '',
                    'cover_image' => '',
                    'filename' => 'test_post_with-_special',
                    'featured' => true,
                    'categories' => ['test',],
                    'postExtras' => [
                        'sub_title' => '',
                    ],
                    'gallery' => [
                        [
                            'test' => 'https://files.myprimitive.cloud/uploads/b9bdeed56811cc29a7a21250da043f47de066db9.jpg',
                        ],
                        [
                            'test' => 'https://files.myprimitive.cloud/uploads/948eb485a320c4ad4b2077e5419514226dc2502b.png',
                        ],
                    ],
                ],


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
