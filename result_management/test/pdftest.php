<?php
require('vendor/autoload.php');
$html='Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum, officia. Neque laudantium id velit molestias cupiditate amet officia voluptatibus tempore. Voluptatum, vel cumque. Minus, iusto sequi ullam iure fuga perspiciatis?
';
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'D');
//D
//I
//F
//S
?>
