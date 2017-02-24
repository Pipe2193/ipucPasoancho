<?php
/**
 * Databases connection to the system
 *
 * @author PMI development <bpo@pmilimited.com>
 * @package ONAF
 * @subpackage connect
 * @version 1.0.0
 */
////////////////////////////// enviroment switch //////////////////////////////////
$enviroment = 'testing';
if ($enviroment == 'production') {
    $hostServer = "customers.pmilimited.com";
    $userServer = "PMIWeb";
    $passServer = "PMI.Web46";
    $dbname = "onaf_v3";
    $dbDealer = "dealers";
} elseif ($enviroment == 'testing') {
    $hostServer = "customers.pmilimited.com";
    $userServer = "PMIWeb";
    $passServer = "PMI.Web46";
    $dbname = "onaf_v3_development";
    $dbDealer = "dealers";
} elseif ($enviroment == 'local') {
    $hostServer = "190.85.78.155";
    $userServer = "root";
    $passServer = "1q2w3e\$R%T";
    $dbname = "onaf3";
    $dbDealer = "dealers";
} else {
    
}
////////////////////////////// end enviroment switch ////////////////////////////

////////////////////////////// Databases Connections instances /////////////////

/**
 * ONAF database instance 
 */
try {
    $GLOBALS['instance'] = new \PDO("mysql:host=" . $hostServer . ";dbname=" . $dbname, $userServer, $passServer);
    $GLOBALS['instance']->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     header("Location: index.php?p=error_dbconnection?error=". $e->getMessage());
}

/**
 * Dealers database instance 
 */
try {
    $GLOBALS['instanceDealer'] = new \PDO("mysql:host=" . $hostServer . ";dbname=" . $dbDealer, $userServer, $passServer);
    $GLOBALS['instanceDealer']->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
} catch (\PDOException $e) {
     header("Location: index.php?p=error_dbconnection?error=". $e->getMessage());
}
////////////////////////End Databases Connections instances ////////////////////