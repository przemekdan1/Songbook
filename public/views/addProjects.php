<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Poppins:wght@200;400&family=Roboto+Condensed:wght@500&family=Roboto:wght@100;500&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Śpiewnik HK | Dodawnanie piosenek</title>
</head>

<body>
    <div class="top-bar"></div>
    <div class="base-container">
        <nav>
            <img src="public/img/logo.svg">
        </nav>
        <main>
            <section class="project-form">
                <h1>Wgraj swoją piosenkę</h1>
                <form action="addProjects" method="POST" ENCTYPE="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="title" type="text" placeholder="Tytuł">
                    <input name="artist" type="text" placeholder="Wykonawca">
                    <textarea name="description" rows="5" placeholder="Tekst piosenki"></textarea>
                    <button type="submit">Send</button>

                </form>
            </section>
        </main>
    </div>
    <div class="settings">
        <p>NAWIGACJA</p>
        <a href="/projects" class="button"><img src="public/img/homepage_icon.svg">Strona główna</a>
    </div>
    <div class="bottom-bar"></div>
</body>