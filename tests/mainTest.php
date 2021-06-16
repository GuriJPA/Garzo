<?php

use PHPUnit\Framework\TestCase;
use Symfony\Component\DomCrawler\Crawler;
require_once 'config/config.php';

class mainTest extends TestCase
{

    public function test_display_home_page(){
        $html = file_get_contents("http://localhost/Garzo/");
        // echo $html;
        // Busca la cadena 'Bienvenidos' en el contenido de la variable
        $posicion = strpos($html, "Bienvenidos");
        $this->assertGreaterThan(0, $posicion);
    }
}
?> 
