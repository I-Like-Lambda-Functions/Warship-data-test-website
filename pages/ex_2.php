<?php
    $sql = "SELECT k.typ, k.kraj,
            COUNT(o.id_okretu) AS liczba_okretow
            FROM klasy_okretow k
            INNER JOIN okrety o ON k.typ = o.typ
            GROUP BY k.typ, k.kraj
            ORDER BY liczba_okretow DESC";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<h1>Lista Okrętów Wojennych</h1>";
        echo "<table>";
        echo "<tr><th>Typ</th><th>Kraj</th><th>Liczba okrętów</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" .
                htmlspecialchars($row["typ"]) . "</td><td>" .
                htmlspecialchars($row["kraj"]) . "</td><td>" .
                htmlspecialchars($row["liczba_okretow"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1 class=\"flex justify-center text-white text-center font-bold\">PHP nie zadziałał poprawnie :/</h1>";
    }
?>