<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?=$this->e($template['headline'])?></title>
        <meta name="description" content="">
        <link rel="shortcut icon" href="about:blank">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/status.min.css">
        <?=$this->insert('partials/styles/_styles', ['template' => $template])?>
        <?='<style type="text/css">' . $template['custom_css'] . '</style>'?>
    </head>
    <body>

        <script src="/js/status.min.js"></script>

<?=$this->section('content')?>

        <script type="text/javascript">
            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
                $('body').linkify({ tagName: 'a', target: '_blank', newLine: '\n', linkClass: null, linkAttributes: null });
            });
        </script>

        <?='<script type="text/javascript">' . $template['custom_js'] . '</script>'?>
    </body>
</html>