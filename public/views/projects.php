<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./public/js/search.js" defer></script>
    <script type="text/javascript" src="/public/js/statistics.js" defer></script>
    <title>Projects</title>
</head>

<body>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
            <ul>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
                <li>
                    <i class="fas fa-project-diagram"></i>
                    <a href="#" class="button">projects</a>
                </li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="search-bar">
                    <input placeholder="search project">

                </div>
                <div class="add-project">
                    <i class="fas fa-plus"></i>
                    add project
                </div>
            </header>
            <section class="projects">
                <?php foreach ($projects as $project): ?>
                <div id="<?= $project->getId() ?>">
                    <img src="public/uploads/<?=$project->getImage(); ?>">
                    <div>
                        <h2><?=$project->getTitle() ?></h2>
                        <p><?=$project->getDescription() ?></p>
                        <div class="social-section">
                            <i class="fas fa-heart"><?=$project->getLike() ?></i>
                            <i class="fas fa-minus-square"><?=$project->getDislike() ?></i>
                        </div>
                    </div>
                </div>
                <?php endforeach;  ?>
            </section>
        </main>
    </div>
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