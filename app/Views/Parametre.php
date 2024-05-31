<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paramètres</title>
    <link rel="stylesheet" href="./dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                    <img src="./../../public/images/logo.png" class="h-8" alt="Logo" />
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <!-- Bouton pour ouvrir le menu principal -->
                <button data-collapse-toggle="navbar-search" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>
        </div>

                    <!-- Dropdown Avatar -->
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <button
                            type="button"
                            class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 relative"
                            id="user-menu-button"
                            aria-expanded="false"
                            data-dropdown-toggle="user-dropdown"
                            data-dropdown-placement="bottom"
                        >
                            <!-- <span class="sr-only">Open user menu</span> -->
                            <img class="w-8 h-8 rounded-full" src="/../../public/images/chat.jpeg" alt="user photo" />
                            <span
                                class="top-0 left-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-white dark:border-gray-800 rounded-full"
                            ></span>
                        </button>

                        <!-- Dropdown menu -->
                        <!-- IL faut ajouter les lien correct !! -->
                        <div
                            class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="user-dropdown"
                        >
                            <div class="px-4 py-3">
                                <!-- <span class="block text-sm text-gray-900 dark:text-white">Name User </span> -->
                                <span class="block text-sm text-gray-500 truncate dark:text-gray-400"></span>
                            </div>
                            <ul class="py-2" aria-labelledby="user-menu-button">
                                <li>
                                    <a
                                        href="./Parametre.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Parametre</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./MyPublications.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Mes publications</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./mesdiscussions.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Mes conversations</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./Profile.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Profil</a
                                    >
                                </li>
                                <li>
                                    <a
                                        href="./Account/logout-process.php"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                                        >Déconnexion</a
                                    >
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- end -->
       
    </nav>
</header>
    <main class="mt-4 flex flex-wrap justify-center bg-slate-300 h-screen">
        <!-- MODIF -->
        <section class="rounded bg-slate-100 mt-4 p-16 mb-4">
            <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Changer le mot de passe
            </h1>
            <form id="password-form" class="">
                <div class="mb-6">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ancien mot de passe</label>
                    <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                </div>
                <div class="mb-6">
                    <label for="confirm_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nouveau mot de passe</label>
                    <input type="password" id="confirm_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                </div>

                <div class="button-container">
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="changePassword()">
                        Modifier
                    </button>
                    <button type="button" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" onclick="cancelChange()">
                        Annuler
                    </button>
                </div>
            </form>
            <div class="mt-8">
                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center" onclick="window.location.href='cgu.html'">CGU</a>

                <a href="#" class="bg-blue-100 hover:bg-blue-200 text-blue-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-blue-400 inline-flex items-center justify-center" onclick="window.location.href='aide.html'">Aide</a>
            </div>

            <button type="button" class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-16" onclick="deleteAccount()">
                Supprimer le compte
            </button>
        </section>
        <!-- END MODIF  -->
    </main>
    <!-- FOOTER TAILWIND -->
    <footer class="bg-slate-600 h-32 flex flex-col justify-center align-middle items-center">
        <div class="inline-flex rounded-md shadow-sm mt-4" role="group">
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <a href="./Accueil.html" class="block p-0 m-0 text-sm text-gray-700 hover:bg-gray-100">Accueil</a>
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <a href="./Publication.html" class="block p-0 m-0 text-sm text-gray-700 hover:bg-gray-100">Publié un trajet</a>
            </button>
            <button type="button" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white">
                <a href="./mesdiscussions.html" class="block p-0 m-0 text-sm text-gray-700 hover:bg-gray-100">Mes discussions</a>
            </button>
        </div>
        <p class="m-6">&copy; 2024 ShareNgo. Tous droits réservés.</p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script>
        function toggleDropdown() {
            var dropdown = document.querySelector('.profile-dropdown');
            dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
        }

        function changePassword() {
            // Fonction pour changer le mot de passe
        }

        function cancelChange() {
            // Fonction pour annuler le changement de mot de passe
        }

        function deleteAccount() {
            // Fonction pour supprimer le compte
        }
    </script>
</body>
</html>
