<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=JetBrains%20Mono' rel='stylesheet'>
    <link href="style.css" rel="stylesheet">
    <title>Okręty wojenne</title>
</head>
<body>
    <header class="flex justify-center text-white p-4 text-center text-2xl font-bold">Okręty Wojenne</header>
    <div class="layout">
    <nav>
        <aside class="left">
            <ul>
                <li><a href="?page=home">Strona Główna</a></li>
                <li><a href="?page=warship_list">Lista okrętów</a></li>
                <li><a href="?page=ex_1">Zadanie 1</a></li>
                <li><a href="?page=ex_2">Zadanie 2</a></li>
            </ul>
        </aside>
    </nav>
    <main>
        <section class="right">
            <?php
            include "config.php";
            
            $conn = new mysqli($host, $user, $password, $dbname);
            
            if ($conn->connect_error) {
                error_log("Database connection error: " . $conn->connect_error);
                die("Błąd połączenia: Proszę spróbować ponownie później.");
            }

            $allowed_pages = ["home", "warship_list", "ex_1", "ex_2"];
            $page = isset($_GET['page']) ? $_GET['page'] : 'home';

            if (in_array($page, $allowed_pages)) {
                include "pages/$page.php";
            } else {
                echo "<h1>Nie znaleziono strony :/</h1>";
            }

            $conn->close();
            ?>
        </section>
    </main>
    </div>
    <footer>
        Copyright &copy; 2025 Gall Anonim.
    </footer>
</body>
</html>