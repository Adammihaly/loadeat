<?php
// Aktuális dátum lekérése
$today = new DateTime();

// Jövőbeli 30 nap kiszámítása
$next30Days = new DatePeriod($today, new DateInterval('P1D'), 29);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
    <title>Következő 30 nap</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Dátum</th>
                <th>Kiválasztás</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($next30Days as $day): ?>
                <tr>
                    <td><?php echo $day->format('Y-m-d'); ?></td>
                    <td>
                        <form action="your_action_page.php" method="post"> <!-- Cseréld le az "your_action_page.php"-t a valódi feldolgozó oldaladra -->
                            <button type="submit" name="selected_date" value="<?php echo $day->format('Y-m-d'); ?>">Kiválasztás</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
