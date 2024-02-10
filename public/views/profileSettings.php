<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/profile.css">

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
    </nav>
    <main class="profile">
        <div class="user-info">
            <h1>Wypełnij dane o sobie</h1>
            <section class="user-info-form">
                <form action="addUserInformation" method="POST" ENCTYPE="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="Name" type="text" placeholder="Imie">
                    <input name="Surname" type="text" placeholder="Nazwisko">
                    <textarea name="description" rows="5" placeholder="Krótki opis o sobie"></textarea>
                    <h2>Zdjęcie profilowe</h2>
                    <input type="file" name="file" placeholder="Zdjęcie profilowe">
                    <button type="submit">send</button>

                </form>
            </section>
        </div>
    </main>
</div>
<div class="settings">
    <p>NAWIGACJA</p>
    <a href="/profile" class="button"><img src="public/img/profile_icon.svg">Profil</a>
    <a href="/projects" class="button"><img src="public/img/homepage_icon.svg">Strona główna</a>
</div>
<div class="bottom-bar"></div>
</body>

