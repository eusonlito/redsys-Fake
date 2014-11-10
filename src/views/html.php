<!doctype html>

<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title><?= _('Redsys TPV Faker'); ?></title>

        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=yes">

        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>

        <meta http-equiv="X-UA-Compatible" content="IE=10; IE=9; IE=8; IE=7; IE=EDGE" />

        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootswatch/3.2.0/united/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    </head>

    <body>
        <div class="page-header">
            <div class="container">
                <img src="images/redsys.png" alt="RedSys" class="pull-left" />
                <h1 class="pull-right">Redsys Fake Server</h1>
            </div>
        </div>

        <div class="container">
            <?php require __DIR__.'/response.php'; ?>
        </div>

        <footer>
            <div class="container">
                <div class="well text-center">
                    <a href="https://github.com/eusonlito/redsys-Fake" class="text-muted" target="_blank">
                        <i class="fa fa-github"></i>
                        <?= _('Check redsys-Fake updates on Github'); ?>
                    </a>
                </div>
            </div>
        </footer>

        <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </body>
</html>
