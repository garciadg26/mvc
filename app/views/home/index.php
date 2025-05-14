<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $data['title']; ?></title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/style.css">
</head>
<body>
    <h1><?php echo $data['title']; ?></h1>
    
    <ul>
    <?php foreach($data['users'] as $user) : ?>
        <li><?php echo $user->name_user; ?></li>
    <?php endforeach; ?>
    </ul>
    
    <script src="<?php echo BASE_URL; ?>assets/js/main.js"></script>
</body>
</html>