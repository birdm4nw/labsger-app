<?php
$current_page = basename($_SERVER['REQUEST_URI']);  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="">
    <nav class="bg-black border-gray-200">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-2">
        <a href="" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="http://localhost/labsger-app/public/assets/img/cube.png" class="h-12" alt="labsger Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap text-white">Labsger</span>
        </a>

            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <?php if (isset($_SESSION['username'])): ?>
                <div class="flex items-center mr-6">
                    <div class="flex-shrink-0">
                        <img class="w-12 h-12 rounded-full" src="http://localhost/labsger-app/public/assets/img/user-icon.png" alt="User">
                    </div>
                    <div class="flex-1 min-w-0 ms-4 mr-4">
                        <p class="text-sm font-medium text-white truncate">
                            <?= htmlspecialchars($_SESSION['username']) ?>
                        </p>
                        <p class="text-sm text-gray-400 truncate">
                            whoami
                        </p>
                    </div>
                </div>
            <?php endif; ?>

            <div class="mt-4 mb-4">
                <form action="/labsger-app/public" method="POST"> 
                    <button type="submit" name="action" value="logout" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="rtl:rotate-180 w-5 h-5 mr-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
                        </svg>
                        Log Out
                    </button>
                </form>
            </div>

        </div>
        
    </nav>
</div>

    
</body>
</html>


