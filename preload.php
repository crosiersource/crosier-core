<?php

$prod = '/var/cache/prod/App_KernelProdContainer.preload.php';
$prodDebug = '/var/cache/prod/App_KernelProdDebugContainer.preload.php';

$dev = '/var/cache/prod/App_KernelDevContainer.preload.php';
$devDebug = '/var/cache/dev/App_KernelDevDebugContainer.preload.php';


if (file_exists(dirname(__DIR__) . $prod)) {
    require dirname(__DIR__) . $prod;
} elseif (file_exists(dirname(__DIR__) . $prodDebug)) {
    require dirname(__DIR__) . $prodDebug;
} elseif (file_exists(dirname(__DIR__) . $dev)) {
    require dirname(__DIR__) . $dev;
} elseif (file_exists(dirname(__DIR__) . $devDebug)) {
    require dirname(__DIR__) . $devDebug;
} 

