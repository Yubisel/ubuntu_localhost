<?php
$vhostAvailableDir = '../../etc/apache2/sites-available/';
$vhostEnabledDir = '../../etc/apache2/sites-enabled/';
$modAvailableDir = '../../etc/apache2/mods-available/';
$modEnabledDir = '../../etc/apache2/mods-enabled/';

$vhostEnabled = array();

$vHostsCultdep = array();
$vHostsGestion = array();
$vHostsWordpress = array();
$vHostsOwn = array();

$modsArray = array();
$modsEnabled = array();

if (is_dir($vhostEnabledDir)) {
    $handleHostsE = opendir($vhostEnabledDir);
    while (($file = readdir($handleHostsE)) !== false) {
        if (is_file($vhostEnabledDir . $file) && strstr($file, '.conf')) {
            if (!(($file == 'default-ssl.conf' || $file == '000-default.conf'))) {
                array_push($vhostEnabled, str_replace('.conf', '', $file));
            }
        }
    }
    closedir($handleHostsE);
}


if (is_dir($vhostAvailableDir)) {
    $handleHosts = opendir($vhostAvailableDir);
    while (($file = readdir($handleHosts)) !== false) {
        if (is_file($vhostAvailableDir . $file) && strstr($file, '.conf')) {
            if (!(($file == 'default-ssl.conf' || $file == '000-default.conf'))) {
                $vhName = str_replace('.conf', '', $file);
                
                if (substr_count($vhName, 'cultdep.lol')) {
                    array_push($vHostsCultdep, $vhName);
                } else if (substr_count($file, 'own')) {
                    array_push($vHostsOwn, $vhName);
                } else if (substr_count($file, 'wordpress.lol')) {
                    array_push($vHostsWordpress, $vhName);
                } else {
                    array_push($vHostsGestion, $vhName);
                }
            }
        }
    }
    closedir($handleHosts);
}

sort($vHostsGestion);
sort($vHostsWordpress);
sort($vHostsOwn);
sort($vHostsCultdep);


$rowQtty = max(count($vHostsGestion), count($vHostsWordpress), count($vHostsOwn), count($vHostsCultdep));


if (is_dir($modAvailableDir)) {
    $handleModsA = opendir($modAvailableDir);
    while (($file = readdir($handleModsA)) !== false) {
        if (is_file($modAvailableDir . $file) && strstr($file, '.load')) {
            array_push($modsArray, str_replace('.load', '', $file));
        }
    }
    closedir($handleModsA);
}
sort($modsArray);


if (is_dir($modEnabledDir)) {
    $handleModsE = opendir($modEnabledDir);
    while (($file = readdir($handleModsE)) !== false) {
        if (is_file($modEnabledDir . $file) && strstr($file, '.load')) {
            array_push($modsEnabled, str_replace('.load', '', $file));
        }
    }
    closedir($handleModsE);
}


//referente a mysql
$mysqlVersion = '';
$mysql = mysqli_connect('localhost', 'root', '');

/* Test the MySQL connection */
if (mysqli_connect_errno()) {
    $mysqlVersion = mysqli_connect_error();
    exit();
} else {
    /* Print the MySQL server version */
    $mysqlVersion = mysqli_get_server_info($mysql);

    /* Close the MySQL connection */
    mysqli_close($mysql);
}
