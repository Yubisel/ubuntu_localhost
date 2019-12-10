<?php require("server.config.php"); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>localhost</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link id="favicon" rel="shortcut icon" href="/images/favicon.ico" type="image/ico" />

    <link rel="stylesheet" href="bootstrap.4.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="fa.4.7/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top">

        <a class="navbar-brand" href="#">
            <img src="/images/ubuntu-logo-2.png" width="30" height="30" alt="">
            localhost
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
            </ul>
            <form class="form-inline">
                <input class="form-control form-control-sm mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-sm btn-success my-2 my-sm-0" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    <div class="container main" role="main">
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="server-tab" data-toggle="tab" href="#server" role="tab" aria-controls="server" aria-selected="false">
                            <i class="fa fa-gears"></i> Configuraci&oacute;n del servidor
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="vhosts-tab" data-toggle="tab" href="#vhosts" role="tab" aria-controls="vhosts" aria-selected="true">
                        <i class="fa fa-globe"></i> Hosts virtuales
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="mods-tab" data-toggle="tab" href="#mods" role="tab" aria-controls="mods" aria-selected="false">
                        <i class="fa fa-puzzle-piece"></i> M&oacute;dulos
                        </a>
                    </li>
                    <!--<li class="nav-item">
                        <a class="nav-link" id="phpinfo-tab" data-toggle="tab" href="#phpinfo" role="tab" aria-controls="phpinfo" aria-selected="false">
                            php Info
                        </a>
                    </li>-->
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade pt-3" id="server" role="tabpanel" aria-labelledby="server-tab">

                        <div class="row">
                            <div class="col-12">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <td class="text-right">Nombre del host:</td>
                                            <td><?= gethostname() ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Apache:</td>
                                            <td><?= apache_get_version() ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">Motor Zend:</td>
                                            <td><?= zend_version() ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">PHP:</td>
                                            <td><?= phpversion() ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-right">MySQL:</td>
                                            <td><?= $mysqlVersion ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show active pt-3" id="vhosts" role="tabpanel" aria-labelledby="vhosts-tab">
                        <div class="row">
                            <div class="col-3">
                                <h6 class="text-center">Gesti&oacute;n</h6>
                                <div class="list-group gestion">
                                    <?php 
                                    $cant = 0;
                                    foreach ($vHostsGestion as $site) :
                                        $cant++;
                                        $enabled = in_array($site, $vhostEnabled); ?>
                                        <a target="_blank" href="<?= ($enabled ? 'http://' . $site : 'disabled') ?>" class="list-group-item list-group-item-action <?= ($enabled ? '' : 'disabled') ?>" <?= ($enabled ? '' : 'aria-disabled="true"') ?>>
                                            <i class="fa fa-globe"></i> <?= $site ?>
                                        </a>
                                    <?php endforeach;
                                    if ($cant < $rowQtty):
                                        for ($i = 0; $i < $rowQtty-$cant; $i++):
                                    ?>
                                        <a href="#" class="list-group-item list-group-item-action disabled">
                                            <i class="fa fa-globe"></i> - 
                                        </a>
                                        <?php endfor;
                                        endif; ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <h6 class="text-center">Proyectos personales</h6>
                                <div class="list-group own">
                                    <?php 
                                    $cant = 0;
                                    foreach ($vHostsOwn as $site) :
                                        $cant++;
                                        $enabled = in_array($site, $vhostEnabled); ?>
                                        <a target="_blank" href="<?= ($enabled ? 'http://' . $site : 'disabled') ?>" class="list-group-item list-group-item-action <?= ($enabled ? '' : 'disabled') ?>" <?= ($enabled ? '' : 'aria-disabled="true"') ?>>
                                            <i class="fa fa-globe"></i> <?= $site ?>
                                        </a>
                                    
                                        <?php endforeach;
                                    if ($cant < $rowQtty):
                                        for ($i = 0; $i < $rowQtty-$cant; $i++):
                                    ?>
                                        <a href="#" class="list-group-item list-group-item-action disabled">
                                            <i class="fa fa-globe"></i> - 
                                        </a>
                                        <?php endfor;
                                        endif; ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <h6 class="text-center">Wordpress</h6>
                                <div class="list-group wordpress">
                                    <?php 
                                    $cant = 0;
                                    foreach ($vHostsWordpress as $site) :
                                        $cant++;
                                        $enabled = in_array($site, $vhostEnabled); ?>
                                        <a target="_blank" href="<?= ($enabled ? 'http://' . $site : 'disabled') ?>" class="list-group-item list-group-item-action <?= ($enabled ? '' : 'disabled') ?>" <?= ($enabled ? '' : 'aria-disabled="true"') ?>>
                                            <i class="fa fa-globe"></i> <?= $site ?>
                                        </a>
                                    
                                        <?php endforeach;
                                    if ($cant < $rowQtty):
                                        for ($i = 0; $i < $rowQtty-$cant; $i++):
                                    ?>
                                        <a href="#" class="list-group-item list-group-item-action disabled">
                                            <i class="fa fa-globe"></i> - 
                                        </a>
                                        <?php endfor;
                                        endif; ?>
                                </div>
                            </div>
                            <div class="col-3">
                                <h6 class="text-center">Cultura deportiva</h6>
                                <div class="list-group cultdep">
                                    <?php 
                                    $cant = 0;
                                    foreach ($vHostsCultdep as $site) :
                                        $cant++;
                                        $enabled = in_array($site, $vhostEnabled); ?>
                                        <a target="_blank" href="<?= ($enabled ? 'http://' . $site : 'disabled') ?>" class="list-group-item list-group-item-action <?= ($enabled ? '' : 'disabled') ?>" <?= ($enabled ? '' : 'aria-disabled="true"') ?>>
                                            <i class="fa fa-globe"></i> <?= $site ?>
                                        </a>
                                    
                                        <?php endforeach;
                                    if ($cant < $rowQtty):
                                        for ($i = 0; $i < $rowQtty-$cant; $i++):
                                    ?>
                                        <a href="#" class="list-group-item list-group-item-action disabled">
                                            <i class="fa fa-globe"></i> - 
                                        </a>
                                        <?php endfor;
                                        endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade pt-3" id="mods" role="tabpanel" aria-labelledby="mods-tab">

                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked id="mod-active-switch">
                                    <label class="custom-control-label" for="mod-active-switch">Activos (<?= count($modsEnabled) ?>)</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" checked id="mod-inactive-switch">
                                    <label class="custom-control-label" for="mod-inactive-switch">Inactivos (<?= count($modsArray) - count($modsEnabled) ?>)</label>
                                </div>
                            </div>
                        </div>

                        <div class="row mods_section">
                            <?php foreach ($modsArray as $item) :
                                $enabled = in_array($item, $modsEnabled);
                                ?>
                                <div class="col-3 pt-1 mod-container">
                                    <div class="mod <?= ($enabled ? 'mod-enabled' : 'mod-disabled') ?> px-2 py-1">
                                        <i class="fa fa-puzzle-piece"></i> <?= $item ?>
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>
                    <!--<div class="tab-pane fade" id="phpinfo" role="tabpanel" aria-labelledby="phpinfo-tab"></div>-->
                </div>
            </div>
        </div>
    </div>

    <footer class="footer mt-auto py-3">
        <div class="container text-center">
            <span class="text-muted">@utor: Ing. Yubisel Vega Alvarez</span>
        </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="bootstrap.4.3/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>