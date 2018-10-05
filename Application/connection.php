<?php
include 'basic.defines.php';
/***
SOME GOLBAL VARIABLE DEFINES, AND COONECTION CLASS CREATE.
**///
/*define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_DSN', 'mysql:host=localhost;dbname=sanjayev_deepsandhya;charset=utf8');
//define('IMG_URL', 'http://localhost/Product/admin/Product/');*/
Class mPDO extends PDO
{
    public function __construct()
    {
        //$this->db = new PDO('mysql:host=localhost;dbname=mProduct;charset=utf8', 'mirzarnd', 'rnd');
        parent::__construct(DB_DSN, DB_USER, DB_PASS);
    }
}
?>
