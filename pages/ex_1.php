<?php
    $sql = "SELECT typ,
            MIN(rok_zwodowania) AS rok_zwodowania
            FROM okrety
            WHERE rok_zwodowania > 1920
            GROUP BY typ";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        echo "<h1>Lista Okrętów Wojennych</h1>";
        echo "<table>";
        echo "<tr><th>Typ</th><th>Rok pierwszego zwodowania</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" .
                htmlspecialchars($row["typ"]) . "</td><td>" .
                htmlspecialchars($row["rok_zwodowania"]) . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1 class=\"flex justify-center text-white text-center font-bold\">PHP nie zadziałał poprawnie :/</h1>";
    }
?>