<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Status Dashboard</title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="about:blank">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/status.css">
        <?=$this->insert('partials/styles/_styles', ['template' => $template])?>
    </head>
    <body style="background-color: #f0f0f0;">
        <?php if (DEMO): ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                        <div class="alert alert-danger">
                            Currently in DEMO mode. No changes will be saved.
                        </div>
                    </div>
                </div>
            </div>
        <?php endif?>

        <script src="/js/dash.min.js"></script>

<?=$this->section('content')?>

        <script type="text/javascript">
            $(document).on('click', '.bootbox', function(event) {
                var target = event.target;
                while (target !== this) {
                    target = target.parentNode;
                    if (target.className.indexOf('modal-dialog') !== -1) {
                      return;
                    }
                }
                bootbox.hideAll();
            });
        </script>
    </body>
</html>