<!-- views_api.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API</title>
</head>

<body>

    <?php if (!empty($apiData)) : ?>
        <pre>
            <?php print_r($apiData); ?>
        </pre>
    <?php else : ?>
        <p>No data</p>
    <?php endif; ?>

</body>

</html>