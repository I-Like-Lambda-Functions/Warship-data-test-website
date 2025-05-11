<?php
    $sql = "SELECT o.id_okretu, o.nazwa, o.typ, o.rok_zwodowania, k.klasa, k.kraj
            FROM okrety o
            JOIN klasy_okretow k ON o.typ = k.typ
            ORDER BY o.id_okretu";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<h1>Lista Okrętów Wojennych</h1>";
        echo "<table>";
        echo "<tr><th>ID</th><th>Nazwa okrętu</th><th>Typ</th><th>Rok zwodowania</th><th>Klasa</th><th>Kraj</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" .
                htmlspecialchars($row["id_okretu"]) . "</td><td>" .
                htmlspecialchars($row["nazwa"]) . "</td><td>" .
                htmlspecialchars($row["typ"]) . "</td><td>" .
                htmlspecialchars($row["rok_zwodowania"]) . "</td><td>" .
                htmlspecialchars($row["klasa"]) . "</td><td>" .
                htmlspecialchars($row["kraj"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1 class=\"flex justify-center text-white text-center font-bold\">PHP nie zadziałał poprawnie :/</h1>";
    }
?>