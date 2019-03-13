<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

        <?php if (isset( $title )): ?>
            <title>Teatro - <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
        	<title>Teatro</title>
        <?php endif ?>
        
        <link rel="stylesheet" type="text/css" href="">

        <style type="text/css">
            .alert {
                border-radius: 0;
                color: #fff;
                border: none;
                font-size: 14px;
            }
            .alert-danger {
                background-color: #f63d4d;
            }
            .alert-success {
                background-color: #2AD8A2;
            }
            .alert-warning {
                background-color: #E5CC36;
            }
        </style>
    </head>
    <body>

        <div class="container">