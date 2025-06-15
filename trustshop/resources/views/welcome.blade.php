<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HOME</title>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    
    <body class="antialiased">
        @if(session('login_success'))
            <div class='alert alert-success'>
                {{ session('login_success') }}    
            </div>
        @endif

        <p>ご利用ありがとうございます。 {{ Auth::user()->name }}様</p>



        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ユーザ情報 / ログアウト</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                    
                </div>
                
            @endif
            
         <div class="max-w-6xl mx-auto sm:px-6 lg:px-8" >

            <div class="text-gray-600 flex items-center">
             mizusima-shoten 
            </div> 
            <div class="flex items-center text-gray-600 flex items-center">
                <h1 >ショップリスト</h1>
                    <svg width="55px" height="55px" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <path d="M877.5 378.7v97.2c0 15.3-12.6 27.8-27.8 27.8H610V350.9h239.7c15.2 0 27.8 12.4 27.8 27.8z" fill="#BCE1DB" />
                        <path d="M825.6 514.8c6.8 6.7 10.9 15.9 10.9 26.1s-4.1 19.6-10.9 26.2v-52.3zM799.3 503.7c10.2 0 19.6 4.2 26.2 11.1H773c6.8-6.9 16.1-11.1 26.3-11.1z" fill="#D66474" />
                        <path d="M579.4 820.8V567.2c6.7 6.7 16 10.9 26.2 10.9 20.4 0 37.1-16.7 37.1-37.1 0-10.2-4.2-19.4-10.8-26.1h141c-6.7 6.7-10.8 15.9-10.8 26.1 0 20.4 16.7 37.1 37.1 37.1 10.2 0 19.4-4.2 26.2-10.9v256.3c-6.8-8.2-17-13.4-28.4-13.4-20.4 0-37.1 16.8-37.1 37.2 0 10.1 4 19.3 10.7 26H632c6.7-6.7 10.7-15.9 10.7-26 0-20.4-16.7-37.2-37.1-37.2-10.2-0.1-19.4 4-26.2 10.7z m148.9-133.4c0-20.4-16.7-37.1-37.1-37.1-20.4 0-37.1 16.7-37.1 37.1 0 20.4 16.7 37.2 37.1 37.2 20.5 0 37.1-16.8 37.1-37.2z" fill="#BCE1DB" />
                        <path d="M825.6 514.8v52.3c-6.8 6.7-16 10.9-26.2 10.9-20.4 0-37.1-16.7-37.1-37.1 0-10.2 4.1-19.4 10.8-26.1h52.5zM825.6 845.4c0 15.3-12.4 27.8-27.8 27.8h-27.1c-6.7-6.7-10.7-15.9-10.7-26 0-20.4 16.7-37.2 37.1-37.2 11.4 0 21.7 5.2 28.4 13.4v22z" fill="#DCFFF8" /><path d="M834.2 847.2c0-9-3.2-17.3-8.7-23.8V567.2c6.8-6.7 10.9-16 10.9-26.2h0.2v304.5c0 20.4-15.8 37.2-35.8 38.7 18.8-2 33.4-17.9 33.4-37z" fill="#D66474" />path d="M800.9 884.1c-1 0.2-2.1 0.2-3.1 0.2 1.1 0 2.1-0.1 3.1-0.2z" fill="#D66474" /><path d="M834.2 847.2c0 19.1-14.7 35-33.3 36.9-1 0.1-2 0.2-3.1 0.2h-0.7c-10.3 0-19.7-4.2-26.4-11.1h27.1c15.3 0 27.8-12.4 27.8-27.8v-22c5.4 6.5 8.6 14.8 8.6 23.8z" fill="#D66474" /><path d="M797.1 884.3H605.5c10.3 0 19.7-4.2 26.4-11.1h138.7c6.9 6.9 16.2 11.1 26.5 11.1z" fill="#D66474" /><path d="M684.7 192.9c40.5 0 73.5 33 73.5 73.5 0 40.6-33 73.5-73.5 73.5H533.5l49.7-75.2c36.1-49.7 59.2-71.8 101.5-71.8z" fill="#F2C2B9" /><path d="M691.2 650.3c20.4 0 37.1 16.7 37.1 37.1 0 20.4-16.7 37.2-37.1 37.2-20.4 0-37.1-16.8-37.1-37.2 0-20.5 16.7-37.1 37.1-37.1zM632 514.8c6.6 6.7 10.8 15.9 10.8 26.1 0 20.4-16.7 37.1-37.1 37.1-10.2 0-19.6-4.2-26.2-10.9v-52.3H632zM605.5 810c20.4 0 37.1 16.8 37.1 37.2 0 10.1-4 19.3-10.7 26h-52.6v-52.5c6.9-6.6 16.1-10.7 26.2-10.7z" fill="#DCFFF8" /><path d="M632 514.8h-52.6c5.1-5.3 11.9-9.1 19.6-10.4 2.1-0.4 4.3-0.7 6.7-0.7 1.4 0 2.9 0.1 4.3 0.3 8.5 0.9 16.2 4.9 22 10.8zM632 873.2c-6.8 6.9-16.1 11.1-26.4 11.1-10.2 0-19.6-4.2-26.3-10.9l0.2-0.2H632z" fill="#D66474" /><path d="M610 503.7h189.4c-10.2 0-19.6 4.2-26.3 11.1H632c-5.8-5.9-13.4-9.9-22-10.8v-0.3z" fill="#D66474" /><path d="M598.9 350.9v152.8H444.3V350.9h77.8l0.1 0.1v-0.1h11.3zM576.8 143.6c21 36.5 17.7 73.2-10.9 122.9l-43.7 64.7-74.5-110.4c-9.7-16.7-12-37.7-6.4-57.6s18.3-36.8 35.1-46.5c11.3-6.6 23.9-9.9 36.7-9.9 6.3 0 12.8 0.8 19.1 2.4 18.9 5.3 34.8 17.5 44.6 34.4z" fill="#F2C2B9" /><path d="M579.4 567.2v253.6c-6.8 6.8-11.1 16.1-11.1 26.4V540.9h0.1c0 10.3 4.2 19.6 11 26.3z" fill="#D66474" /><path d="M579.4 873.2l-0.2 0.2c-6.7-6.7-10.9-16-10.9-26.2 0-10.3 4.3-19.7 11.1-26.4v52.4zM579.4 514.8v52.3c-6.8-6.7-11-16-11-26.2s4.1-19.4 11-26.1z" fill="#D66474" /><path d="M568.3 847.2v26h-94.5V514.8h94.5v26.1zM463 264.4l49.9 75.3H361.7c-40.5 0-73.5-32.9-73.5-73.5 0-40.5 33-73.5 73.5-73.5 42.2 0.2 65.4 22.3 101.3 71.7z" fill="#F2C2B9" /><path d="M605.5 884.3H436.7c10.2 0 19.6-4.2 26.2-10.9 6.7-6.7 10.9-16 10.9-26.2v26h94.5v-26c0 10.2 4.2 19.6 10.9 26.2 6.8 6.7 16.1 10.9 26.3 10.9z" fill="#D66474" /><path d="M473.8 540.9v306.3c0-10.3-4.2-19.7-11.1-26.4V567.4c6.9-6.8 11.1-16.1 11.1-26.5z" fill="#D66474" /><path d="M473.8 847.2c0 10.2-4.2 19.6-10.9 26.2l-0.2-0.2v-52.5c6.9 6.8 11.1 16.2 11.1 26.5zM462.8 514.6c6.8 6.7 11 16.1 11 26.3 0 10.3-4.2 19.7-11.1 26.4v-52.6l0.1-0.1z" fill="#D66474" /><path d="M447.7 503.7h151.1l0.1 0.7c-7.7 1.3-14.4 5.1-19.6 10.4-6.9 6.7-11 15.9-11 26.1h-0.1v-26.1h-94.5v26.1c0-10.2-4.2-19.7-11-26.3-4.1-4.2-9.3-7.3-15.1-9.2v-1.7zM462.7 873.2l0.2 0.2c-6.7 6.7-16 10.9-26.2 10.9-10.3 0-19.7-4.2-26.4-11.1h52.4z" fill="#D66474" /><path d="M462.8 514.6l-0.1 0.2h-52.3c5.9-6 13.8-10 22.6-10.9 1.2-0.1 2.4-0.2 3.8-0.2 3.8 0 7.6 0.6 11 1.7 5.7 1.9 10.9 5 15 9.2z" fill="#D66474" /><path d="M462.7 820.8v52.5h-52.5c-6.6-6.7-10.7-15.9-10.7-26 0-20.4 16.7-37.2 37.1-37.2 10.2-0.1 19.5 4 26.1 10.7zM462.7 514.8v52.6c-6.7 6.6-15.9 10.7-26 10.7-20.4 0-37.1-16.7-37.1-37.1 0-10.2 4.2-19.4 10.8-26.1h52.3z" fill="#DCFFF8" /><path d="M433.2 350.9v152.8H196.7c-15.2 0-27.8-12.4-27.8-27.8v-97.2c0-15.3 12.6-27.8 27.8-27.8h236.5z" fill="#BCE1DB" /><path d="M247.5 503.7H433v0.2c-8.8 0.9-16.7 4.9-22.6 10.9H273.8c-6.8-6.9-16.1-11.1-26.3-11.1z" fill="#D66474" /><path d="M330.8 650.3c20.4 0 37.1 16.7 37.1 37.1 0 20.4-16.7 37.2-37.1 37.2s-37.2-16.8-37.2-37.2c0-20.5 16.8-37.1 37.2-37.1zM273.8 514.8c6.7 6.7 10.8 15.9 10.8 26.1 0 20.4-16.7 37.1-37.1 37.1-10.3 0-19.8-4.3-26.7-11.2V515l0.2-0.2h52.8zM247.5 801.6c20.4 0 37.1 16.8 37.1 37.2 0 15.4-9.6 28.8-23 34.3h-13c-15.3 0-27.8-12.4-27.8-27.8v-32.6c6.9-6.7 16.3-11.1 26.7-11.1z" fill="#DCFFF8" /><path d="M273.8 514.8H221c6.8-6.9 16.2-11.1 26.4-11.1s19.6 4.2 26.4 11.1z" fill="#D66474" /><path d="M220.8 812.9v-246c6.9 6.9 16.3 11.2 26.7 11.2 20.4 0 37.1-16.7 37.1-37.1 0-10.2-4.1-19.4-10.8-26.1h136.6c-6.6 6.7-10.8 15.9-10.8 26.1 0 20.4 16.7 37.1 37.1 37.1 10.1 0 19.3-4.1 26-10.7v253.4c-6.7-6.7-15.9-10.8-26-10.8-20.4 0-37.1 16.8-37.1 37.2 0 10.1 4.1 19.3 10.7 26H261.6c13.4-5.6 23-18.9 23-34.3 0-20.4-16.7-37.2-37.1-37.2-10.4-0.1-19.8 4.3-26.7 11.2z m147.1-125.5c0-20.4-16.7-37.1-37.1-37.1s-37.2 16.7-37.2 37.1c0 20.4 16.8 37.2 37.2 37.2s37.1-16.8 37.1-37.2z" fill="#BCE1DB" /><path d="M220.8 845.4c0 15.3 12.4 27.8 27.8 27.8h13c-4.3 1.8-9.1 2.8-14.1 2.8-20.4 0-37.2-16.7-37.2-37.1 0-10.1 4.1-19.2 10.6-26v32.5z" fill="#D66474" /><path d="M220.8 566.8v246c-6.4 6.8-10.6 15.9-10.6 26h-0.6V540.9h0.6c0 10.1 4.2 19.3 10.6 25.9z" fill="#D66474" /><path d="M220.8 515v51.8c-6.4-6.7-10.6-15.8-10.6-25.9 0-10.1 4.2-19.2 10.6-25.9zM247.5 876c5 0 9.8-1 14.1-2.8h148.7c6.8 6.9 16.1 11.1 26.4 11.1H248.6c-21.4 0-38.9-17.4-38.9-38.9v-6.6h0.6c-0.1 20.5 16.7 37.2 37.2 37.2z" fill="#D66474" />
                        <path d="M583.2 264.5l-49.7 75.2h151.1c40.5 0 73.5-32.9 73.5-73.5 0-40.5-33-73.5-73.5-73.5-42.2 0.2-65.3 22.3-101.4 71.8z m-17.3 2c28.6-49.7 31.9-86.5 10.9-122.9-9.8-16.9-25.7-29.1-44.6-34.2-6.3-1.7-12.8-2.4-19.1-2.4-12.8 0-25.3 3.3-36.7 9.9-16.8 9.7-29.6 26.6-35.1 46.5s-3.2 40.9 6.4 57.6l74.5 110.4 43.7-64.9z m-204.2 73.3h151.1L463 264.4c-35.9-49.5-59-71.6-101.2-71.6-40.5 0-73.5 33-73.5 73.5 0 40.6 33 73.5 73.4 73.5zM247.5 503.7c-10.2 0-19.7 4.2-26.4 11.1h-0.2v0.2c-6.4 6.7-10.6 15.8-10.6 25.9h-0.6v-26.1h-13c-21.3 0-38.9-17.4-38.9-38.9v-97.2c0-21.4 17.6-38.9 38.9-38.9h123.2c-25.4-14.6-42.8-42-42.8-73.5 0-46.6 37.9-84.6 84.6-84.6 28.4 0 48.9 8.8 69.1 27.2-4.6-15.4-4.8-32.3-0.2-48.7 6.2-22.6 21-42 40.2-53.1 19.6-11.3 42.5-14.3 64.2-8.4 21.8 5.8 40 19.8 51.3 39.3 16.9 29.2 19.4 59.3 7.4 94.2 28.4-34.7 52.2-50.6 90.8-50.6 46.7 0 84.6 38 84.6 84.6 0 31.4-17.3 58.9-42.8 73.5h123.2c21.3 0 38.9 17.4 38.9 38.9v97.2c0 21.4-17.6 38.9-38.9 38.9h-13v26.1h-0.2c0-10.2-4.1-19.4-10.9-26.1-6.7-6.9-16-11.1-26.2-11.1h50.3c15.2 0 27.8-12.4 27.8-27.8v-97.2c0-15.3-12.6-27.8-27.8-27.8H610V503.9c-1.4-0.2-2.9-0.3-4.3-0.3-2.3 0-4.6 0.2-6.7 0.7l-0.1-0.7V350.9h-76.6v0.1l-0.1-0.1h-77.8v152.8h3.4v1.7c-3.4-1.1-7.2-1.7-11-1.7-1.3 0-2.6 0.1-3.8 0.2v-0.2h0.2V350.9H196.7c-15.2 0-27.8 12.4-27.8 27.8v97.2c0 15.3 12.6 27.8 27.8 27.8h50.8z" fill="#D66474" />
                    </svg>   
            </div> 
            
            <div class="text-gray-600 text-sm">
             ---ほしい！が見つかるお買い物総合サイト--- 
            </div> 
<<<<<<< HEAD
            
=======
            <!-- <div class="flex justify-center pt-8 sm:justify-start sm:pt-0"> -->
                <!-- <form action="index.php" method="post">
                <h1>Login Form</h1>
                    <label>USER ID</label>
                    <input type="text" name="name">

                    <label>PASS</label>
                    <input type="number" name="age">

                    <input type="submit" value="go">
                </form>
            </div> 
            
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                <h1>▼新規登録はこちら▼</h1>
                <div class="pull-right"> -->
            <!-- </div>
            </div> -->

>>>>>>> master
            <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">

<<<<<<< HEAD
=======
                    <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- <div class="text-left">
                                    <h2 style="font-size:1rem;">当サイトに登録されているショップ一覧 ※最新の登録ショップから表示</h2>
                                </div> -->
                                
                                <div class="text-right">
                                    <a class="btn btn-success" href="{{ route('shops.create') }}">■新規ショップ登録はこちら■</a>
                                <!-- 新規登録を押すとshops.create⇒ShopsControllerのcreateメゾットになる。 -->
                                </div>
                            </div>
                        </div>
                    </div>
>>>>>>> master
                    <div>
                        <h1>Shop List</h1> 
                            <ul> @foreach ($shops as $shop) 
                                <li> 
                                    <a href="{{ route('shop.sale', ['id' => $shop->id]) }}"> {{ $shop->name }} </a> 
                                </li> @endforeach 
                            </ul>
                    </div>
<<<<<<< HEAD

                    <div>
                    <a href="{{ url('/user/'.Auth::user()->id)}}">ユーザページ</a>
                    
=======
                    

                        <!-- <table class="table table-bordered">
                            <tr>
                                <th>ID</th>
                                <th>No</th>
                                <th>name</th>
                                <th>shousai</th>
                                <th>bunrui</th>
                            </tr>
                            @foreach ($shops as $shop)
                            <tr>
                                <td style="text-align:right">{{ $shop->id }}</td>
                                <td>{{ $shop->user_id }}</td>
                                <td style="text-align:right">{{ $shop->name }}</td>
                                <td style="text-align:right">{{ $shop->description }}</td>
                                <td style="text-align:right">{{ $shop->bunrui }}</td>
                                <td style="text-align:center">
                                    <a class="btn btn-primary" href="{{ route('shops.edit','$shop->id') }}">変更</a>
                                    このボタンを押すと'shops.edit'に飛んで$shopのidテータを渡す
                                </td>
                            <tr>
                            @endforeach
                            
                        </table> -->
>>>>>>> master
                    </div>
            </div>
    </body>
</html>
