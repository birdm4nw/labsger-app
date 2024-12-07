<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Labsger - Sign In</title>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.setAttribute('fill', '#000'); 
            } else {
                passwordInput.type = 'password';
                eyeIcon.setAttribute('fill', '#bbb'); 
            }
        }
    </script>
    <link rel="icon" href="http://localhost/labsger-app/public/assets/img/cube.png" type="image/png">    
</head>

<body>
    <div class="font-[sans-serif] bg-white">
        <div class="grid lg:grid-cols-4 md:grid-cols-3 items-center">
            <form method="POST" action="" class="lg:col-span-3 md:col-span-2 max-w-lg w-full p-6 mx-auto">
                <?php if (isset($welcome_message)): ?>
                    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Info</span>
                        <div>
                            <span class="font-medium"> <?php echo $welcome_message; ?> </span>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (isset($error_login)): ?>
                    <div class="flex items-center p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
                        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                        </svg>
                        <span class="sr-only">Error</span>
                        <div>
                            <span class="font-medium"> <?php echo $error_login; ?> </span>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="mb-12 flex items-center">
                    <img src="http://localhost/labsger-app/public/assets/img/cube.png" alt="Icono" class="w-16 h-16 mr-4" />
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                        <span class="underline underline-offset-3 decoration-8 decoration-blue-400 dark:decoration-blue-600">Labsger</span>
                    </h1>
                </div>

                <div class="mb-12">
                    <h3 class="text-gray-800 text-4xl font-extrabold">Sign In</h3>
                    <p class="text-gray-800 text-sm mt-6 leading-relaxed">Welcome to Labsger! A minimalism web application to manage your CTF laboratories.</p>
                </div>

                <div class="relative flex items-center">
                    <label class="text-gray-800 text-[13px] bg-white absolute px-2 top-[-9px] left-[18px] font-semibold">Username</label>
                    <input type="text" name="username" placeholder="Enter username"
                    class="px-4 py-3.5 bg-white w-full text-sm border-2 border-gray-200 focus:border-blue-600 rounded-md outline-none" required/>
                </div>

                <div class="relative flex items-center mt-8">
                    <label class="text-gray-800 text-[13px] bg-white absolute px-2 top-[-9px] left-[18px] font-semibold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password"
                    class="px-4 py-3.5 bg-white w-full text-sm border-2 border-gray-200 focus:border-blue-600 rounded-md outline-none" required/>
                    <svg id="eye-icon" onclick="togglePasswordVisibility()" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4 cursor-pointer" viewBox="0 0 128 128">
                        <path d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z" data-original="#000000"></path>
                    </svg>
                </div>

                <div class="mt-12">
                    <button type="submit" class="w-full shadow-xl py-2.5 px-4 text-sm tracking-wider font-semibold rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none">Sign in</button>
                </div>

                <p class="text-sm text-gray-800 mt-8 text-center">Don't have an account? <a href="?action=register" class="text-blue-600 font-semibold hover:underline ml-1 whitespace-nowrap">Register here</a></p>
            </form>

            <div class="flex flex-col justify-center space-y-16 md:h-screen max-md:mt-16 min-h-full bg-gradient-to-r from-blue-500 to-blue-700 lg:px-8 px-4 py-4">
    <div>
        <h4 class="text-white text-lg font-semibold">MVC-Based PHP Application</h4>
        <p class="text-[13px] text-white mt-2">Built on the Model-View-Controller (MVC) architecture, ensuring a streamlined and organized workflow for better maintainability and scalability.</p>
    </div>
    <div>
        <h4 class="text-white text-lg font-semibold">User-Friendly Interface</h4>
        <p class="text-[13px] text-white mt-2">Designed for seamless interaction with all functionalities, providing an intuitive and efficient user experience.</p>
    </div>
    <div>
        <h4 class="text-white text-lg font-semibold">Upcoming Features</h4>
        <p class="text-[13px] text-white mt-2">Future enhancements will include the ability to export machine data in multiple formats, including .xlsx.</p>
    </div>
    <div class="mt-8 text-center text-white">
        <p class="text-sm">Developed by <a href="https://github.com/birdm4nw" class="text-blue-200 hover:underline">David G.</a></p>
    </div>
</div>

        </div>
    </div>
</body>
</html>