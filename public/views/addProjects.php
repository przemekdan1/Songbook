<!DOCTYPE html>
<head>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <link rel="stylesheet" type="text/css" href="public/css/projects.css">

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
                <h1>Upload</h1>
                <form action="addProjects" method="POST" ENCTYPE="multipart/form-data">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                    <input name="title" type="text" placeholder="title">
                    <textarea name="description" rows="5" placeholder="description"></textarea>

                    <input type="file" name="file">
                    <button type="submit">send</button>

                </form>
            </section>
        </main>
    </div>
    <div class="settings">
        <p>KONTO</p>

        <a href="#" class="button"><img src="public/img/Vector.svg">Profil</a>
    </div>
    <div class="bottom-bar"></div>
</body>