<?php
session_start(); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php?action=login"); 
    exit();
}

if (!isset($machines)) {
    header("Location: http://localhost/labsger-app/public/index.php?action=machines");
    exit();
}

?>

<!doctype html>
<html lang="en" class="dark">
<head>
    <script src="/livereload.js?mindelay=10&amp;v=2&amp;port=1313&amp;path=livereload" data-no-instant defer></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Themesberg">
    <meta name="generator" content="Hugo 0.138.0">
    <title>Labsger - Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://localhost:1313//app.css">
    <link rel="manifest" href="http://localhost:1313/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">    
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>
    <link rel="icon" href="http://localhost/labsger-app/public/assets/img/cube.png" type="image/png"> 
</head>
<body class="bg-gray-50 dark:bg-gray-800">
    <?php include $_SERVER['DOCUMENT_ROOT'] . '/labsger-app/app/views/components/navbar.php'; ?>

    <h1 class="ml-4 mt-6  mb-8 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Laboratories <mark class="px-2 text-white bg-blue-600 rounded dark:bg-blue-500">Management</mark> Panel</h1>

    <div class="flex justify-center items-center bg-gray-50 dark:bg-gray-900">
    
        <div class="p-4 bg-white dark:bg-gray-800 rounded-lg">
            <div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
                <div class="w-full mb-1">
                    <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                        <div class="flex items-center mb-4 sm:mb-0">
                            <div class="mb-4 rounded-lg text-white relative overflow-hidden shadow-lg">

                            </div>

                        </div>
                        <button id="createProductButton" class="inline-flex items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" data-drawer-target="drawer-create-product-default" data-drawer-show="drawer-create-product-default" aria-controls="drawer-create-product-default" data-drawer-placement="right">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 4a1 1 0 011 1v6h6a1 1 0 110 2h-6v6a1 1 0 11-2 0v-6H5a1 1 0 110-2h6V5a1 1 0 011-1z"/>
                            </svg>
                            Add new machine
                        </button>
                    </div>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden shadow">
                            <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                                <thead class="bg-gray-100 dark:bg-gray-700">
                                    <tr>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">ID</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Name</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">OS</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Difficulty</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Platform</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Techniques</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Status</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Last update</th>
                                        <th scope="col" class="p-4 text-xs font-bold text-left text-black uppercase dark:text-gray-400">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    <?php if (!empty($machines)): ?>
                                        <?php foreach ($machines as $machine): ?>
                                            <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                                                <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    <div class="text-base font-semibold text-gray-900 dark:text-white"><?php echo htmlspecialchars($machine['id']); ?></div>
                                                </td>
                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($machine['name']); ?></td>

                                                <td class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400"><?php echo htmlspecialchars($machine['operating_system']); ?></td>

                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <?php 
                                                    $difficulty = htmlspecialchars($machine['difficulty']);
                                                    switch ($difficulty) {
                                                        case 'Easy':
                                                            $iconClass = 'text-green-600 dark:text-green-500';
                                                            break;
                                                        case 'Medium':
                                                            $iconClass = 'text-yellow-500 dark:text-yellow-400';
                                                            break;
                                                        case 'Hard':
                                                            $iconClass = 'text-red-600 dark:text-red-500';
                                                            break;
                                                        case 'Insane':
                                                            $iconClass = 'text-black dark:text-gray-200';
                                                            break;
                                                        default:
                                                            $iconClass = 'text-gray-900 dark:text-gray-400';
                                                    }
                                                    ?>
                                                    <span class="flex items-center">
                                                        <i class="fas fa-exclamation-circle <?php echo $iconClass; ?> mr-2"></i>
                                                        <span><?php echo $difficulty; ?></span>
                                                    </span>
                                                </td>




                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($machine['platform']); ?></td>

                                                <td class="techniques-cell max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 break-words xl:max-w-xs dark:text-gray-400">
                                                    <?php echo htmlspecialchars($machine['techniques']); ?>
                                                </td>

                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <?php 
                                                $status = htmlspecialchars($machine['status']);
                                                switch ($status) {
                                                    case 'To do':
                                                        $statusClass = 'text-orange-800 bg-orange-100 border border-orange-800 hover:bg-orange-800 hover:text-white focus:ring-4 focus:ring-orange-300';
                                                        $icon = '<svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                                    <path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm1 14h-2v-2h2zm0-4h-2V7h2z"/>
                                                                    </svg>';
                                                        break;
                                                    
                                                    case 'In progress':
                                                        $statusClass = 'text-teal-800 bg-teal-100 border border-teal-800 hover:bg-teal-800 hover:text-white focus:ring-4 focus:ring-teal-300';
                                                        $icon = '<svg class="w-4 h-4 mr-2 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v4a4 4 0 00-4 4H4z"></path>
                                                                    </svg>';
                                                        break;
                                                        
                                                    
                                                    case 'Completed':
                                                        $statusClass = 'text-indigo-800 bg-indigo-100 border border-indigo-800 hover:bg-indigo-800 hover:text-white focus:ring-4 focus:ring-indigo-300';
                                                        $icon = '<svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 10-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                                    </svg>';
                                                        break;
                                                        
                                                    case 'Error':
                                                        $statusClass = 'text-red-800 bg-red-100 border border-red-800 hover:bg-red-800 hover:text-white';
                                                        $icon = '<svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm1 14h-2v-2h2zm0-4h-2V7h2z"/></svg>';
                                                        break;
                                                    default:
                                                        $statusClass = 'text-gray-800 bg-gray-100 border border-gray-800 hover:bg-gray-800 hover:text-white';
                                                        $icon = '<svg class="w-4 h-4 mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm0 18a8 8 0 118-8 8 8 0 01-8 8z"/></svg>';
                                                }
                                                ?>
                                                <button type="button" class="flex items-center px-3 py-1.5 text-xs font-medium rounded-lg focus:outline-none focus:ring-4 focus:ring-opacity-50 <?php echo $statusClass; ?>">
                                                    <?php echo $icon; ?>
                                                    <?php echo $status; ?>
                                                </button>
                                            </td>


                                                <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white"><?php echo htmlspecialchars($machine['last_update']); ?></td>
                                                <td class="p-4 space-x-2 whitespace-nowrap">
                                                    
                                                    <button type="button" onclick="viewMachine('<?php echo $machine['name']; ?>', '<?php echo $machine['operating_system']; ?>', '<?php echo $machine['difficulty']; ?>', '<?php echo $machine['platform']; ?>', '<?php echo $machine['techniques']; ?>', '<?php echo $machine['status']; ?>')" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-black hover:bg-gray-800 rounded-lg">
                                                        <svg class="w-4 h-4 text-white mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" viewBox="0 0 24 24">
                                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14v3m4-6V7a3 3 0 1 1 6 0v4M5 11h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                                                        </svg>
                                                        View
                                                    </button>

                                                    <div id="machine-modal" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden transition-opacity duration-300 ease-in-out">
                                                        <div class="bg-white p-8 rounded-lg shadow-xl w-full max-w-3xl transform transition duration-300 ease-in-out scale-95 hover:scale-100">
                                                            <div class="flex justify-between items-center mb-4">
                                                                <div class="flex items-center">
                                                                    <img src="http://localhost/labsger-app/public/assets/img/cube.png" class="h-10" alt="labsger Logo" />
                                                                    <h2 class="text-2xl font-semibold text-gray-800">Machine Details</h2>
                                                                </div>
                                                                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl">&times;</button>
                                                            </div>
                                                            <div class="space-y-4">
                                                                <p><strong>Name:</strong> <span id="modal-name" class="text-gray-700"></span></p>
                                                                <p><strong>Operating system:</strong> <span id="modal-operating_system" class="text-gray-700"></span></p>
                                                                <p><strong>Difficulty:</strong> <span id="modal-difficulty" class="text-gray-700"></span></p>
                                                                <p><strong>Platform:</strong> <span id="modal-platform" class="text-gray-700"></span></p>
                                                                <p><strong>Techniques:</strong> <span id="modal-techniques" class="text-gray-700 break-words whitespace-normal"></span></p>
                                                                <p><strong>Status:</strong> <span id="modal-status" class="text-gray-700"></span></p>
                                                            </div>
                                                            <div class="mt-6 text-right">
                                                                <button onclick="closeModal()" class="px-6 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-300 ease-in-out">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <button type="button" id="updateProductButton" data-drawer-target="drawer-update-product-<?php echo $machine['id']; ?>" data-drawer-show="drawer-update-product-<?php echo $machine['id']; ?>" aria-controls="drawer-update-product-<?php echo $machine['id']; ?>" data-drawer-placement="right" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 hover:bg-blue-800 rounded-lg">
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                        Update
                                                    </button>
                                                    <form action="http://localhost/labsger-app/public/index.php?action=deleteMachine" method="post" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?php echo $machine['id']; ?>">
                                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this machine?');" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800">
                                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <div id="drawer-update-product-<?php echo $machine['id']; ?>" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                                                <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Update Machine</h5>
                                                <button type="button" data-drawer-dismiss="drawer-update-product-<?php echo $machine['id']; ?>" aria-controls="drawer-update-product-<?php echo $machine['id']; ?>" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <span class="sr-only">Close menu</span>
                                                </button>
                                                <form action="http://localhost/labsger-app/public/index.php?action=updateMachine" method="POST">
                                                    <div class="space-y-4">
                                                        <!-- Name -->
                                                        <div>
                                                            <label for="name-<?php echo $machine['id']; ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                            <input type="text" name="name" id="name-<?php echo $machine['id']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo htmlspecialchars($machine['name']); ?>" required>
                                                        </div>

                                                        <!-- Operating System -->
                                                        <div>
                                                            <label for="operating_system-<?php echo $machine['id']; ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating System</label>
                                                            <select name="operating_system" id="operating_system-<?php echo $machine['id']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="Linux" <?php echo $machine['operating_system'] === 'Linux' ? 'selected' : ''; ?>>Linux</option>
                                                                <option value="Windows" <?php echo $machine['operating_system'] === 'Windows' ? 'selected' : ''; ?>>Windows</option>
                                                                <option value="MacOS" <?php echo $machine['operating_system'] === 'MacOS' ? 'selected' : ''; ?>>MacOS</option>
                                                                <option value="Other Unix-Based" <?php echo $machine['operating_system'] === 'Other Unix-Based' ? 'selected' : ''; ?>>Other Unix</option>
                                                            </select>
                                                        </div>

                                                        <!-- Difficulty -->
                                                        <div>
                                                            <label for="difficulty-<?php echo $machine['id']; ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Difficulty</label>
                                                            <select name="difficulty" id="difficulty-<?php echo $machine['id']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="Easy" <?php echo $machine['difficulty'] === 'Easy' ? 'selected' : ''; ?>>Easy</option>
                                                                <option value="Medium" <?php echo $machine['difficulty'] === 'Medium' ? 'selected' : ''; ?>>Medium</option>
                                                                <option value="Hard" <?php echo $machine['difficulty'] === 'Hard' ? 'selected' : ''; ?>>Hard</option>
                                                                <option value="Insane" <?php echo $machine['difficulty'] === 'Insane' ? 'selected' : ''; ?>>Insane</option>
                                                            </select>
                                                        </div>

                                                        <!-- Platform -->
                                                        <div>
                                                            <label for="platform-<?php echo $machine['id']; ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Platform</label>
                                                            <select name="platform" id="platform-<?php echo $machine['id']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="HackTheBox" <?php echo $machine['platform'] === 'HackTheBox' ? 'selected' : ''; ?>>HackTheBox</option>
                                                                <option value="TryHackMe" <?php echo $machine['platform'] === 'TryHackMe' ? 'selected' : ''; ?>>TryHackMe</option>
                                                                <option value="Vulnhub" <?php echo $machine['platform'] === 'Vulnhub' ? 'selected' : ''; ?>>Vulnhub</option>
                                                                <option value="PortSwigger" <?php echo $machine['platform'] === 'PortSwigger' ? 'selected' : ''; ?>>PortSwigger</option>
                                                                <option value="Docker Labs" <?php echo $machine['platform'] === 'Docker Labs' ? 'selected' : ''; ?>>Docker Labs</option>
                                                            </select>
                                                        </div>

                                                        <!-- Techniques -->
                                                        <div>
                                                            <label for="techniques-<?php echo $machine['id']; ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Techniques</label>
                                                            <input type="text" name="techniques" id="techniques-<?php echo $machine['id']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="<?php echo htmlspecialchars($machine['techniques']); ?>" placeholder="Type involved techniques" required>
                                                        </div>

                                                        <!-- Status -->
                                                        <div>
                                                            <label for="status-<?php echo $machine['id']; ?>" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                                            <select name="status" id="status-<?php echo $machine['id']; ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="To do" <?php echo $machine['status'] === 'To do' ? 'selected' : ''; ?>>To do</option>
                                                                <option value="In progress" <?php echo $machine['status'] === 'In progress' ? 'selected' : ''; ?>>In progress</option>
                                                                <option value="Completed" <?php echo $machine['status'] === 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                                            </select>
                                                        </div>

                                                        <input type="hidden" name="id" value="<?php echo $machine['id']; ?>">
                                                    </div>

                                                    <div class="bottom-0 left-0 flex justify-center w-full pb-4 mt-4 space-x-4 sm:absolute sm:px-4 sm:mt-0">
                                                        <button type="submit" class="w-full justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                                            Update
                                                        </button>
                                                        <button type="button" class="w-full justify-center text-red-600 inline-flex items-center hover:text-white bg-transparent hover:bg-red-600 border border-red-600 hover:border-transparent focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-red-500 dark:hover:text-white dark:border-red-500 dark:hover:bg-red-600 dark:focus:ring-red-800" data-drawer-dismiss="drawer-update-product-<?php echo $machine['id']; ?>" aria-controls="drawer-update-product-<?php echo $machine['id']; ?>">
                                                        <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                        </svg>
                                                            Cancel
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            
            
            <!-- Delete - Machine -->
            <div id="drawer-delete-product-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">Delete item</h5>
                <button type="button" data-drawer-dismiss="drawer-delete-product-default" aria-controls="drawer-delete-product-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <svg class="w-10 h-10 mt-8 mb-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                <h3 class="mb-6 text-lg text-gray-500 dark:text-gray-400">Are you sure you want to delete this machine?</h3>
                <a href="#" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-3 py-2.5 text-center mr-2 dark:focus:ring-red-900">
                    Yes, I'm sure
                </a>
                <a href="#" class="text-gray-900 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-primary-300 border border-gray-200 font-medium inline-flex items-center rounded-lg text-sm px-3 py-2.5 text-center dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700" data-drawer-hide="drawer-delete-product-default">
                    No, cancel
                </a>
            </div>
            
            <!-- Create - Machine -->
            <div id="drawer-create-product-default" class="fixed top-0 right-0 z-40 w-full h-screen max-w-xs p-4 overflow-y-auto transition-transform translate-x-full bg-white dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-label" aria-hidden="true">
                <h5 id="drawer-label" class="inline-flex items-center mb-6 text-sm font-semibold text-gray-500 uppercase dark:text-gray-400">New machine</h5>
                <button type="button" data-drawer-dismiss="drawer-create-product-default" aria-controls="drawer-create-product-default" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close menu</span>
                </button>
                <form action="http://localhost/labsger-app/public/index.php?action=createMachine" method="POST">
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">

                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type the machine's name" required>
                        </div>

                        <div>
                            <label for="operating_system" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Operating System</label>
                            <select name="operating_system" id="operating_system" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="Linux">Linux</option>
                                <option value="Windows">Windows</option>
                                <option value="MacOS">MacOS</option>
                                <option value="Other Unix-Based">Other Unix</option>
                            </select>
                        </div>

                        <div>
                            <label for="difficulty" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Difficulty</label>
                            <select name="difficulty" id="difficulty" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="Easy">Easy</option>
                                <option value="Medium">Medium</option>
                                <option value="Hard">Hard</option>
                                <option value="Insane">Insane</option>
                            </select>
                        </div>

                        <div>
                            <label for="platform" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Platform</label>
                            <select name="platform" id="platform" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="HackTheBox">HackTheBox</option>
                                <option value="TryHackMe">TryHackMe</option>
                                <option value="Vulnhub">Vulnhub</option>
                                <option value="PortSwigger">PortSwigger</option>
                                <option value="Docker Labs">Docker Labs</option>
                            </select>
                        </div>

                        <div>
                            <label for="techniques" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Techniques</label>
                            <input type="text" name="techniques" id="techniques" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type involved techniques" required>
                        </div>

                        <div>
                            <label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                            <select name="status" id="status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option value="To do">To do</option>
                                <option value="Active">In progress</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>

                        <div class="bottom-0 left-0 flex justify-center w-full pb-4 space-x-4 md:px-4 md:absolute">
                            <button type="submit" class="text-white w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4a1 1 0 011 1v6h6a1 1 0 110 2h-6v6a1 1 0 11-2 0v-6H5a1 1 0 110-2h6V5a1 1 0 011-1z"/>
                                </svg>
                                Add
                            </button>

                            <button type="button" data-drawer-dismiss="drawer-create-product-default" aria-controls="drawer-create-product-default" class="inline-flex w-full justify-center text-gray-500 items-center bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-primary-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" onclick="closeDrawer()">
                                <svg aria-hidden="true" class="w-5 h-5 -ml-1 sm:mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>


                            <script>
                            function closeDrawer() {
                                var drawer = document.querySelector('[data-drawer-dismiss="drawer-create-product-default"]');
                                drawer.classList.remove('open'); 
                            }
                            </script>

                        </div>
                </form>
            </div>
            
            
                </main>
        </div>
    </div>

    <script>
        function viewMachine(name, operating_system, difficulty, platform, techniques, status) {
            document.getElementById('modal-name').textContent = name;
            document.getElementById('modal-operating_system').textContent = operating_system;
            document.getElementById('modal-difficulty').textContent = difficulty;
            document.getElementById('modal-platform').textContent = platform;
            document.getElementById('modal-techniques').textContent = techniques;
            document.getElementById('modal-status').textContent = status;

            document.getElementById('machine-modal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('machine-modal').classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const techniquesCells = document.querySelectorAll('.techniques-cell'); 

            techniquesCells.forEach(cell => {
                let techniquesText = cell.innerHTML;
    
                techniquesText = techniquesText.replace(/,/g, '<br>');
                cell.innerHTML = techniquesText;
            });
        });


    </script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="http://localhost/labsger-app/public/assets/app.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/datepicker.min.js"></script>
</body>
</html>

