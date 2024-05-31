<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Site de Covoiturage CNAM</title>
        <!-- <link rel="stylesheet" href="AccueilVisu.css" /> -->
        <link rel="stylesheet" href="./dist/output.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" />
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

        <!-- MAIN TAILWIND -->
        <main class="mt-4 flex flex-wrap justify-center bg-slate-300 h-screen">
            <!-- MODIF -->
            <section class="rounded bg-slate-100 m-8 p-16">
                <h1
                    class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white"
                >
                    Mon compte
                </h1>
                <form class="max-w-md mx-auto">
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            type="text"
                            name="firstName"
                            id="firstName"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            value="John"
                            required
                        />
                        <label
                            for="firstName"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Prénom</label
                        >
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            type="text"
                            name="lastName"
                            id="lastName"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            value="Doe"
                            required
                        />
                        <label
                            for="lastName"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Nom de famille</label
                        >
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            type="text"
                            name="city"
                            id="city"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            value="Saint-Étienne"
                            required
                        />
                        <label
                            for="city"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Ville :
                        </label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input
                            type="email"
                            name="mail"
                            id="mail"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" "
                            value="john@mail.com"
                            required
                        />
                        <label
                            for="mail"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                            >Email :
                        </label>
                    </div>
                    <!-- *** -->
              
                        <div class="relative z-0 w-full mb-5 group">
                            <label for="vehicle" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Type de véhicule :
                            </label>
                            <select
                                id="vehicle"
                                name="vehicle"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required
                            >
                                <optgroup label="Toyota">
                                    <option value="toyota">Toyota</option>
                                    <option value="toyota-yaris">Toyota Yaris</option>
                                    <option value="toyota-aygo">Toyota Aygo</option>
                                </optgroup>
                                <optgroup label="Honda">
                                    <option value="honda">Honda</option>
                                    <option value="honda-civic">Honda Civic</option>
                                    <option value="honda-jazz">Honda Jazz</option>
                                </optgroup>
                                <optgroup label="Ford">
                                    <option value="ford">Ford</option>
                                    <option value="ford-fiesta">Ford Fiesta</option>
                                    <option value="ford-focus">Ford Focus</option>
                                </optgroup>
                                <optgroup label="Volkswagen">
                                    <option value="volkswagen">Volkswagen</option>
                                    <option value="volkswagen-polo">Volkswagen Polo</option>
                                    <option value="volkswagen-golf">Volkswagen Golf</option>
                                    <option value="volkswagen-up">Volkswagen Up!</option>
                                </optgroup>
                                <optgroup label="Peugeot">
                                    <option value="peugeot">Peugeot</option>
                                    <option value="peugeot-206">Peugeot 206</option>
                                    <option value="peugeot-207">Peugeot 207</option>
                                    <option value="peugeot-208">Peugeot 208</option>
                                </optgroup>
                                <optgroup label="Renault">
                                    <option value="renault">Renault</option>
                                    <option value="renault-clio">Renault Clio</option>
                                    <option value="renault-twingo">Renault Twingo</option>
                                    <option value="renault-megane">Renault Mégane</option>
                                </optgroup>
                                <optgroup label="Citroën">
                                    <option value="citroen">Citroën</option>
                                    <option value="citroen-c1">Citroën C1</option>
                                    <option value="citroen-c3">Citroën C3</option>
                                    <option value="citroen-c4">Citroën C4</option>
                                </optgroup>
                                <optgroup label="Fiat">
                                    <option value="fiat">Fiat</option>
                                    <option value="fiat-500">Fiat 500</option>
                                    <option value="fiat-panda">Fiat Panda</option>
                                    <option value="fiat-punto">Fiat Punto</option>
                                </optgroup>
                                <optgroup label="Hyundai">
                                    <option value="hyundai">Hyundai</option>
                                    <option value="hyundai-i10">Hyundai i10</option>
                                    <option value="hyundai-i20">Hyundai i20</option>
                                    <option value="hyundai-i30">Hyundai i30</option>
                                </optgroup>
                                <optgroup label="Kia">
                                    <option value="kia">Kia</option>
                                    <option value="kia-picanto">Kia Picanto</option>
                                    <option value="kia-rio">Kia Rio</option>
                                    <option value="kia-ceed">Kia Ceed</option>
                                </optgroup>
                                <optgroup label="Nissan">
                                    <option value="nissan">Nissan</option>
                                    <option value="nissan-micra">Nissan Micra</option>
                                    <option value="nissan-note">Nissan Note</option>
                                </optgroup>
                                <optgroup label="Mini">
                                    <option value="mini">Mini</option>
                                    <option value="mini-cooper">Mini Cooper</option>
                                    <option value="mini-one">Mini One</option>
                                </optgroup>
                                <optgroup label="SEAT">
                                    <option value="seat">SEAT</option>
                                    <option value="seat-ibiza">SEAT Ibiza</option>
                                    <option value="seat-leon">SEAT Leon</option>
                                </optgroup>
                                <optgroup label="Skoda">
                                    <option value="skoda">Skoda</option>
                                    <option value="skoda-fabia">Skoda Fabia</option>
                                    <option value="skoda-octavia">Skoda Octavia</option>
                                </optgroup>
                                <optgroup label="Opel">
                                    <option value="opel">Opel</option>
                                    <option value="opel-corsa">Opel Corsa</option>
                                    <option value="opel-astra">Opel Astra</option>
                                </optgroup>
                                <optgroup label="Mazda">
                                    <option value="mazda">Mazda</option>
                                    <option value="mazda2">Mazda 2</option>
                                    <option value="mazda3">Mazda 3</option>
                                </optgroup>
                                <optgroup label="Suzuki">
                                    <option value="suzuki">Suzuki</option>
                                    <option value="suzuki-swift">Suzuki Swift</option>
                                    <option value="suzuki-baleno">Suzuki Baleno</option>
                                </optgroup>
                                <optgroup label="Mitsubishi">
                                    <option value="mitsubishi">Mitsubishi</option>
                                    <option value="mitsubishi-mirage">Mitsubishi Mirage</option>
                                </optgroup>
                                <optgroup label="Smart">
                                    <option value="smart">Smart</option>
                                    <option value="smart-fortwo">Smart Fortwo</option>
                                    <option value="smart-forfour">Smart Forfour</option>
                                </optgroup>
                                <optgroup label="Dacia">
                                    <option value="dacia">Dacia</option>
                                    <option value="dacia-sandero">Dacia Sandero</option>
                                </optgroup>
                            </select>
                        </div>

                        <!-- ** -->
                        <div class="relative z-0 w-full mb-5 group">
                            <label for="study" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Études :
                            </label>
                            <select
                                id="study"
                                name="study"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required
                            >
                                <optgroup label="Informatique">
                                    <option value="reseau">Réseaux & Cyber</option>
                                    <option value="dev">Développeur</option>
                                </optgroup>
                                <optgroup label="Commerce">
                                    <option value="truc">Truc</option>
                                    <option value="much">Muche</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <button
                        type="submit"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    >
                        Modifier
                    </button>
                    <button
                    type="button"
                    class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                    onclick="cancelChange()"
                >
                    Annuler
                </button>
                </form>
            </section>
        </main>
        <!-- FOOTER TAILWIND -->
        <footer class="bg-slate-600 h-32 flex flex-col justify-center align-middle items-center">
            <div class="inline-flex rounded-md shadow-sm mt-4" role="group">
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                >
                    <a href="./Accueil.html" class="block p-0 m-0 text-sm text-gray-700 hover:bg-gray-100">Accueil</a>
                </button>
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                >
                    <a href="./Publication.html" class="block p-0 m-0 text-sm text-gray-700 hover:bg-gray-100"
                        >Publié un trajet</a
                    >
                </button>
                <button
                    type="button"
                    class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-800 dark:border-gray-700 dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-blue-500 dark:focus:text-white"
                >
                    <a href="./mesdiscussions.html" class="block p-0 m-0 text-sm text-gray-700 hover:bg-gray-100"
                        >Mes discussions</a
                    >
                </button>
            </div>
            <p class="m-6">&copy; 2024 ShareNgo. Tous droits réservés.</p>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    </body>
</html>
