<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Focused Journey</title>
    <!-- Bulma CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <style>
        #font{
            font-family: "EB Garamond", serif;
            font-optical-sizing: auto;
            font-weight: 600;
            font-style: normal;
        }
        .line-container {
            width: 70%;
            margin: 0 auto; /* Center horizontally */
        }
        .line {
            border-bottom: 1px solid gray;
        }
        .custom-margin-top {
            margin-top: 7rem;
        }
    </style>
</head>
<body class="antialiased">
    <x-app-layout>
        <div class="container custom-margin-top p-6 bg-white" style="height: 60vh">
            <div class="columns">
                <!-- Left Column (2/3 width) -->
                <div class="column is-two-thirds">
                    <div>
                        <h1 class="font-bold mb-2" style="font-size: 2.5rem; font-weight: bold">Welcome to Focused Journey</h1>
                        <p class="text-gray-600 mb-6" style="font-size: 1.4rem;">Boost your productivity and focus with our app.</p>
                    </div>

                    <!-- Display any success messages -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Form to start a focus session -->
                    <form action="{{ route('focus-sessions.store') }}" method="post">
                        @csrf
                        <div class="field mb-4">
                            <label for="duration" class="label">Focus Duration (minutes)</label>
                            @auth
                                <div class="control">
                                    <input type="number" name="duration" id="duration" class="input border border-b-2 border-black" style="max-width: 200px;" required>
                                </div>
                            @endauth

                            @guest
                                <p class="mb-1">Please log in or register to use a focus session.</p>
                                <div class="control">
                                    <input type="number" name="duration" id="duration" class="input border border-b-2 border-black" style="max-width: 200px;" required disabled>
                                </div>
                            @endguest
                        </div>
                        <div class="field">
                            <div class="control">
                                <button type="submit" class="border-none p-3 rounded-md text-white" style="background-color: #ff7f6e">Start Focus Session</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="column">
                    <svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 300 225" viewBox="0 0 300 225" id="business-target"><g><path fill="none" stroke="#000" stroke-miterlimit="10" stroke-width=".316" d="M25.6,102.52c5.08-31.88,26.97-60.6,56.37-73.95c4.15-1.89,9.91-3.1,12.57,0.6c1.12,1.55,1.3,3.57,1.35,5.48
    c0.16,6.99-5.97,13.87-3.75,20.5c1.27,3.79,7.92,1.62,11.5-0.16c3.58-1.78,6.43-4.73,9.11-7.7c7.55-8.38,22.67-20.61,32.94-28.6
    c4.31-3.35,10.62-0.83,11.47,4.56c0.59,3.77,1.58,7.36,3.22,9.08c1.92,2.01,4.76,2.83,7.49,3.32c15.32,2.74,30.81-2.3,46.18-4.77
    c15.37-2.47,33.19-1.5,43.56,10.11c9.29,10.41,9.44,26.64,3.87,39.43c-5.57,12.79-15.86,22.86-26.19,32.24
    c-28.14,25.53-59.76,49.13-96.71,57.99c-20.16,4.84-41.13,5.08-61.84,4.27c-2.51-0.1-5.03-0.21-7.49-0.72
    c-4.21-0.87-8.11-2.88-11.74-5.18c-21.75-13.83-33.94-40.09-32.06-65.8"></path><g><path d="M266.71,95.38c4.44,0,8.03,10.46,8.03,23.37c0,12.9-3.6,23.37-8.03,23.37h-1.2V95.38H266.71z"></path><ellipse cx="265.51" cy="118.75" rx="8.03" ry="23.37"></ellipse><path fill="#fff" d="M258.87,118.75c0,11,2.98,19.92,6.67,19.92c3.68,0,6.67-8.92,6.67-19.92c0-11-2.98-19.92-6.67-19.92
    C261.86,98.82,258.87,107.74,258.87,118.75z M260.14,118.75c0-8.86,2.42-16.04,5.4-16.04c2.98,0,5.4,7.18,5.4,16.04
    c0,8.86-2.42,16.04-5.4,16.04C262.56,134.79,260.14,127.61,260.14,118.75z"></path><path fill="#fff" d="M262.16,118.75c0,5.98,1.51,10.83,3.38,10.83c1.86,0,3.38-4.85,3.38-10.83c0-5.98-1.51-10.83-3.38-10.83
    C263.68,107.91,262.16,112.76,262.16,118.75z M263.17,118.75c0-4.17,1.06-7.55,2.37-7.55c1.31,0,2.37,3.38,2.37,7.55
    c0,4.17-1.06,7.55-2.37,7.55C264.23,126.3,263.17,122.92,263.17,118.75z"></path></g><g><g><rect width="2.53" height="55.19" x="185.78" y="26.85" transform="rotate(-23.537 187.061 54.453)"></rect></g><path d="M256.42,119.09c-35.33-5.21-121.44-0.35-96.14,11.58c24.65,11.62-40.09,10.37-57.34,13.9
    c-76.45,15.64,17.04,85.23,65.11,56.28c14.09-8.49,30.26-18.08,54.09-36.8c30.36-23.86-9.67-29.74-11.47-30.48
    C198.37,128.51,256.42,119.09,256.42,119.09"></path><path fill="#fff" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".316" d="M81.3 90.19l-.95 1.38c-.41.91-1.43 1.38-2.39 1.1h0c-1.14-.33-1.76-1.57-1.32-2.68l.23-.54c0 0-1.31 1.14-2.68-.5 0 0-.92-.79-.24-2.33 0 0-1.53.73-2.43-.62-.9-1.35-.26-2.38-.26-2.38s-1.93.26-1.78-2.02c0 0-.02-1.16 2.01-2.88 0 0 3.59-4.44 4.61-6.17s5.31-4.49 5.31-4.49l0 0c.98-1.19 2.6-1.64 4.06-1.13l2.99 1.05c1.92.67 2.92 2.77 2.25 4.69l-.93 2.67c0 0-3.45 7.58-3.63 10.95-.1 1.87-.83 3.04-1.46 3.71-.47.5-1.16.7-1.83.55L81.3 90.19zM183.65 46.53l2.54-1.73c.82-.74 2.07-.76 2.92-.06v0c1.02.84 1.09 2.38.15 3.31l-.03 0c0 0 1.84-.58 2.5 1.69 0 0 .58 1.21-.79 2.48 0 0 1.88-.06 2.2 1.71s-.8 2.54-.8 2.54 2.08.6.92 2.84c0 0-.5 1.18-3.31 2.04 0 0-5.62 2.92-7.42 4.23-1.8 1.3-7.39 2.2-7.39 2.2l0 0c-1.53.77-3.37.51-4.63-.65l-2.58-2.4c-1.65-1.53-1.74-4.12-.21-5.77l2.13-2.3c0 0 5.46-4.98 7.14-8.33.93-1.86 2.19-2.72 3.13-3.12.7-.3 1.5-.2 2.1.25L183.65 46.53z"></path><line x1="189.23" x2="186.52" y1="48.06" y2="49.24" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".316"></line><path fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".316" d="M182,51.9c0,0,1.72,3.45-0.77,6.28"></path><polygon fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width=".316" points="127.6 50.82 129.4 41.55 137.6 43.97 137.22 46.19 136.36 51.83 132.68 52.99"></polygon><path fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width=".316" d="M127.98 38.09c.81 5.04 5.64 9.2 8.84 8.21 4.59-1.43 4.45-4.98 4.53-10.08.11-7.05-4.15-8.69-7.46-8.16S127.18 33.06 127.98 38.09zM50.62 118.07l3.78-16.84 30.02 6.73c4.65 1.04 7.57 5.66 6.53 10.31l0 0c-1.04 4.65-5.66 7.57-10.31 6.53L50.62 118.07zM152.88 180.65l-17.5 3.39-6.04-31.19c-.94-4.83 2.22-9.51 7.05-10.44h0c4.83-.94 9.51 2.22 10.44 7.05L152.88 180.65z"></path><g><path fill="#ff7f6e" d="M133.34,192.39l39.51-6.26v0c-0.34-2.16-1.82-3.97-3.87-4.74c-5.39-2.01-15.46-5.73-15.73-5.81
        c-0.37-0.11-0.79,0.23-1.06,0.64c0,0-1.13,1.75-2.36,2.55c0,0,0,0,0,0c-0.33,0.21-0.72,0.43-1.17,0.64
        c-1.64,0.77-4.1,1.52-7.51,2.02c-3.82,0.57-6.56,0.1-6.91,0.13c-0.34,0.04-0.87,0.78-0.89,1.28c0,0.11,0,0.64-0.01,1.4
        C133.33,186.92,133.34,192.39,133.34,192.39z"></path><g><path d="M148.65,179.41l12.52,6.05c0.1,0.05,0.22,0.06,0.32,0.05c0.17-0.03,0.32-0.13,0.4-0.3c0.13-0.27,0.02-0.59-0.25-0.72
            l-11.83-5.72C149.49,178.99,149.1,179.2,148.65,179.41z"></path></g><rect width="40.01" height="4.44" x="133.44" y="189.23" fill="#fff" transform="rotate(171.004 153.443 191.45)"></rect></g><g><path fill="#ff7f6e" d="M50.88,94.86l-14.84,37.15h0c2.03,0.81,4.35,0.47,6.06-0.9c4.49-3.6,12.83-10.35,13.04-10.54
        c0.29-0.26,0.2-0.8-0.01-1.24c0,0-0.93-1.87-0.98-3.33c0,0,0,0,0-0.01c-0.01-0.39,0-0.83,0.05-1.33c0.17-1.8,0.8-4.3,2.11-7.49
        c1.47-3.58,3.28-5.69,3.42-6.01c0.14-0.31-0.23-1.14-0.65-1.42c-0.09-0.06-0.55-0.33-1.2-0.73
        C55.58,97.65,50.88,94.86,50.88,94.86z"></path><g><path d="M54.19,114.65l-11.61,7.66c-0.1,0.06-0.17,0.15-0.2,0.25c-0.06,0.16-0.05,0.35,0.05,0.5c0.16,0.25,0.5,0.32,0.75,0.15
            l10.96-7.24C54.13,115.59,54.14,115.15,54.19,114.65z"></path></g><rect width="40.01" height="4.9" x="21.18" y="110.07" transform="rotate(-68.222 41.179 112.523)"></rect></g><g><path fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width=".316" d="M66.61,98.75l-6.05,26.81c5.35,0.69,29.26,7.54,46.68,5.57c13.19-1.49,21.81-10.44,21.81-10.44l-10.37-25.87
        c0,0-10.51,7.94-23.65,8.3C94.46,103.13,67.18,98.75,66.61,98.75z"></path></g><g><path fill="#fff" stroke="#000" stroke-miterlimit="10" stroke-width=".316" d="M154.25,170.07l-24.52,4.22c0,0-14.22-40.57-17.59-51.24c-4.87-15.41-9.77-27.38-4.95-38.51
        c3.68-8.51,29.09,7.49,29.09,7.49S152.31,141.17,154.25,170.07z"></path></g><polygon points="145.82 54.3 141.91 78.22 138.5 97.63 102.53 89.2 116.8 46.79 128.15 46.48 133.42 51.8 137.13 48.46"></polygon><path fill="#fff" d="M135.03,52.84c-1.27-1.69-3.46-0.91-3.46-0.91s-0.95,2.81-0.79,3.28c0.16,0.47,1.62,2.56,1.62,2.56
    s2.44-1.39,2.64-1.96C135.33,54.95,135.03,52.84,135.03,52.84z"></path><path fill="#ff7f6e" d="M139.5,102.47l-6.53-0.86c0,0,4.8-26.86,4.3-36.96c-0.55-11.06-0.14-16.19-0.14-16.19s7.47,2.4,10.74,4.43
    l-4.73,29.16L139.5,102.47z"></path><path fill="#ff7f6e" d="M171.61,53.7c-12.13,5.03-20.49,1.22-23.76-0.81l-6.88,25.56c0,0,15.18,3.48,23.47-0.26
    c8.29-3.74,12.47-9.89,12.47-9.89L171.61,53.7z"></path><g><path fill="#ff7f6e" d="M128.15,46.48c0,0-0.04,0.26-0.11,0.74c-0.72,4.98-4.91,33.91-6.93,46.34c-0.56,3.43-0.95,5.6-1.06,5.67
        c-0.53,0.35-9.91-1.47-13.73-2.96c-3.83-1.49-5.81-3.18-6.01-3.35c-0.11-0.1,4.42-16.76,8.34-31.07
        c1.56-5.71,3.03-11.05,4.06-14.82c0.22-0.78,0.41-1.5,0.59-2.13C122.66,44.61,128.15,46.48,128.15,46.48z"></path></g><path fill="#ff7f6e" d="M105.88,45.85c-20.97,3.66-28.9,24.5-28.9,24.5l12.16,8.45c0,0,3.72-5.53,9.91-8.87
    c6.19-3.35,9.88-0.48,9.88-0.48l4.37-24.55C113.31,44.9,112.32,44.72,105.88,45.85z"></path><path fill="#fff" d="M133.58,56.83l-1.77-0.29l-2.42,11.88c0.41,3.14,2.43,6.72,2.43,6.72s1.72-2.08,2.16-3.11L133.58,56.83z"></path><path d="M125.07,46.94l5.63,6.31l2.73-1.44l-4.75-5.2C128.67,46.6,127.44,46.17,125.07,46.94z"></path><polygon points="139.45 49.2 135.27 53.65 133.42 51.8 136.72 48.33"></polygon><path d="M129.07,35.75c5.83-6.3,11.78-2.85,11.78-2.85s2.76,1.15,4.77,1.19c-0.11-1.61-0.9-3.62-1.55-4.27c0,0,1.46-0.8,2.03-1.76
    c-1.49-2.26-4.98-4.1-6.87-4.38c0,0,0.98-0.9,1.24-1.76c-1.99-0.69-7.54-0.23-9.2,1.26c0,0,0.16-1.05,0-2
    c-3.62,1.29-5.31,4.57-5.36,6.41c0,0-2.5,1.62-2.74,4.9c-0.24,3.27,0.72,5.1,0.72,5.1l2.93,5.97l1.65,2.72l1.7-7.29L129.07,35.75z
    "></path><polygon points="132.11 31.67 132.28 40.63 128.43 33.54"></polygon><g><ellipse cx="128.83" cy="38.41" fill="#fff" rx="3.32" ry="2.65" transform="rotate(-87.943 128.829 38.408)"></ellipse><g><path d="M127.75,40.02c0.1,0.01,0.2-0.04,0.24-0.14c0.12-0.29,0.29-0.46,0.51-0.54c0.44-0.15,0.95,0.14,0.95,0.14
            c0.07,0.04,0.15,0.04,0.22,0c0.07-0.04,0.12-0.11,0.12-0.18c0.18-1.89-1.24-2.64-1.3-2.68c-0.11-0.06-0.25-0.01-0.31,0.1
            c-0.06,0.11-0.01,0.25,0.1,0.31l0,0c0.05,0.02,1.04,0.56,1.06,1.89c-0.26-0.09-0.63-0.16-0.99-0.04
            c-0.35,0.12-0.62,0.38-0.8,0.79c-0.05,0.12,0,0.25,0.12,0.31C127.71,40.01,127.73,40.01,127.75,40.02z"></path></g></g><path fill="#fff" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".316" d="M190.94 52.22l-3.59 1.53c-1.12.49-2.42-.1-2.91-1.22v0c-.49-1.12.03-2.42 1.15-2.91l3.75-1.62M192.34 56.47l-3.48 1.47c-1.12.49-2.42-.03-2.91-1.15v0c-.49-1.12.03-2.42 1.15-2.91l3.75-1.62M192.36 56.5l-3.75 1.62c-1.12.49-1.64 1.79-1.15 2.91v0c0 0 0 .01.01.01.3.69 1.14.97 1.83.65l2.74-1.25"></path><path fill="#fff" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width=".316" d="M183.65,46.53l3.47,3.26c0.5,0.47,0.35,1.29-0.27,1.56c-1.33,0.59-3.65,1.18-6.36,0.06"></path><polygon points="172.9 21.43 168.53 34.95 185.29 28.37"></polygon></g></g></svg>
                </div>
            </div>
        </div>

        <div class="line-container">
            <div class="line"></div>
        </div>
    </x-app-layout>
    @include('components.footer')
</body>
