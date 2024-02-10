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
                <li>
                    <a href="#" class="button">Kategorie</a>
                </li>


            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="search project">

                </div>
                <div class="add-project">
                    <a href="/addProjects">DODAJ PIOSENKE</a>
                    <h1>(dostepne)</h1>
                </div>
            </header>
            <section class="projects">
                <?php foreach ($projects as $project): ?>
                <div id="<?= $project->getId() ?>">
                    <div>
                        <h2><?=$project->getTitle() ?></h2>
                        <div>
                            <p>Wyk: <?=$project->getDescription() ?></p>
                            <p>Kategoria: </p>
                        </div>

                    </div>
                    <div class="social-section">
                        <i class="fas fa-heart">Like: <?=$project->getLike() ?></i>
                        <i class="fas fa-minus-square">Dislike: <?=$project->getDislike() ?></i>
                    </div>
                </div>
                <?php endforeach;  ?>
            </section>
        </main>
    </div>
    <div class="settings">
        <p>KONTO</p>
        <a href="/profile" class="button"><img src="public/img/profile_icon.svg">Profil</a>
    </div>
    <div class="bottom-bar"></div>
</body>

<template id="project-template">
    <div id="">
        <img src="">
        <div>
            <h2>title<</h2>
            <p>description</p>
            <div class="social-section">
                <i class="like"> 0</i>
                <i class="dislike"> 0</i>
            </div>
        </div>
    </div>
</template>