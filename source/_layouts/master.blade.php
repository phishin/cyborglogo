<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">

        <link rel="icon" type="image/png" href="/assets/img/favicon/favicon-96x96.png" sizes="96x96" />
        <link rel="icon" type="image/svg+xml" href="/assets/img/favicon/favicon.svg" />
        <link rel="shortcut icon" href="/assets/img/favicon/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/assets/img/favicon/apple-touch-icon.png" />
        <link rel="manifest" href="/assets/img/favicon/site.webmanifest" />


        @stack('meta')

        <meta property="og:title" content="{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->siteDescription }}" />
        <meta property="Permissions-policy" content="interest-cohort=()">
        
        <script type="application/ld+json">
            {!! stripslashes($page->siteJsonLd) !!}
        </script>
        
        @if ($page->production)
            {!! $page->siteAnalytics !!}
        @else
            <meta name="robots" content="noindex">
        @endif

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">


        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
        
        <x-structured-data />

        {{--<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>--}}
    </head>

    <body>
        <div id="app">
            <main-site-wrapper-screen :show-password-screen="true">
                <div id="site-overlay" class="site-overlay pointer-events-none absolute w-full h-full inset-0 bg-black opacity-0"></div>
                    <header-section></header-section>
                    <main role="main">
                            @yield('body')
                            <signup-modal></signup-modal>
                            <login-modal></login-modal>
                    </main>
                <footer-section></footer-section>
            </main-site-wrapper-screen>
        </div>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>

        @stack('scripts')

        <!-- leave snippet below to enable prefetching -->
        <!-- basically don't remove it unless you know it is breaking something :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/quicklink/2.0.0/quicklink.umd.js"></script>
        <script>
            window.addEventListener('load', () => {
                quicklink.listen();
            });
        </script>
    </body>
</html>
