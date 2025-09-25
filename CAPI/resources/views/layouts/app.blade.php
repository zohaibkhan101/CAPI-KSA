<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>CAPI Admin</title>
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}"/>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
        <!-- Chatbot widget containers (admin layout) -->
        <div id="chatbot-fab" aria-label="Open chat" title="Chat with us" style="display:none">🤖<span class="sr-only">Open chat</span></div>
        <div id="chatbot-panel" role="dialog" aria-modal="true" aria-labelledby="chatbot-title" style="display:none">
            <div class="chatbot-header">
                <div class="chatbot-title" id="chatbot-title">CAPI Assistant</div>
                <button type="button" class="chatbot-close" aria-label="Close chat">×</button>
            </div>
            <div class="chatbot-messages" id="chatbot-messages" aria-live="polite"></div>
            <form class="chatbot-input" id="chatbot-form">
                <input type="text" id="chatbot-text" placeholder="Type your question..." autocomplete="off" aria-label="Message" />
                <button type="submit" class="chatbot-send" aria-label="Send">Send</button>
            </form>
            <div class="chatbot-footer">Powered by a lightweight on-site FAQ bot</div>
        </div>
    </body>
</html>
