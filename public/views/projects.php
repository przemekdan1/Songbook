<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Poppins:wght@200;400&family=Roboto+Condensed:wght@500&family=Roboto:wght@100;500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/statistics.js" defer></script>
    <title>Śpiewnik HK | Katalog piosenek</title>
</head>

<body>
    <div class="top-bar"></div>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <p>KATEGORIE </p>
                </li>
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="#" class="button"><?=$category->getCategoryName() ?></a>
                    </li>
                <?php endforeach;  ?>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input id="search-input" placeholder="Search">

                </div>
                <div class="add-project">
                    <img src="/public/img/plus.svg"/>
                    <a href="/addProjects">DODAJ PIOSENKE</a>
                </div>
            </header>
            <section class="projects">
                <?php foreach ($projects as $project): ?>
                <div id="<?= $project->getIdSong() ?>">
                    <div>
                        <h2><?=$project->getTitle() ?></h2>
                        <div>
                            <p>Wyk: <?=$project->getArtistName() ?></p>
                            <p>Kategoria: <?=$project->getCategoryName() ?></p>
                        </div>

                    </div>

                </div>
                <?php endforeach;  ?>
            </section>
        </main>
    </div>
    <div class="settings">
        <p>KONTO</p>
        <a href="/profile" class="button"><img src="public/img/profile_icon.svg">Profil</a>
        <a href="/index" class="button"><img src="public/img/logout_icon.svg">Wyloguj się</a>
    </div>
    <div class="bottom-bar"></div>
</body>

<template id="project-template">
    <div id="">
        <div>
            <h2>title<</h2>
            <p class="description">description</p>
            <p class="category">category</p>
        </div>
    </div>
</template>