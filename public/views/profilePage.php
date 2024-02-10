<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Poppins:wght@200;400&family=Roboto+Condensed:wght@500&family=Roboto:wght@100;500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/statistics.js" defer></script>
    <title>Śpiewnik HK | Profil</title>
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
    <main class="profile">
        <div class="user-profile">
            <img src="public/img/profile_icon.svg">
            <div class="user-informations">
                <h1>Name</h1>
                <h2>Surname</h2>
                <h3>User role</h3>
            </div>
        </div>
        <div class="favourite-songs">
            <p>Ulubione piosenki</p>
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
        </div>
    </main>
</div>
<div class="settings">
    <p>NAWIGACJA</p>
    <a href="/profileSettings" class="button"><img src="public/img/settings_icon.svg">Ustawienia konta</a>
    <a href="/projects" class="button"><img src="public/img/homepage_icon.svg">Strona główna</a>
</div>
<div class="bottom-bar"></div>
</body>

