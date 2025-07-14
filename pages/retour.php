<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <h1>Choix de Retour</h1>
    <table width="200px">
        <tr>
            <td>
                <form action="traitement/traitement-retour.php">
                    <input type="hidden" name="ok">
                    <button type="button" class="btn btn-primary">OK</button>
                </form>
            </td>
            <td>OU</td>
            <td>
                <form action="traitement/traitement-retour.php">
                    <input type="hidden" name="abbimer">
                    <button type="button" class="btn btn-danger">Abbimer</button>
                </form>
            </td>
        </tr>
    </table>
</body>
</html>