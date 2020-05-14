<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" type="image/png" href="../favicon.ico" />
        <title>Di Mauro :: <?= $this->renderSection('Titulo') ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../public/estilos/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/material-design-iconic-font.min.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/animate.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/util.css">
        <link rel="stylesheet" type="text/css" href="../public/estilos/main.css">
        <?= $this->renderSection('Estilos') ?>
    </head>
    <body>
        <main role="Conteudo" class="container-fluid">
        <?= $this->renderSection('Conteudo') ?>
        </main>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha384-vk5WoKIaW/vJyUAd9n/wmopsmNhiy+L2Z+SBxGYnUkunIxVxAv/UtMOhba/xskxh" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="../public/javascripts/main.js"></script>
	<?= $this->renderSection('Scripts') ?>
    </body>
</html>