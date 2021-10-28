<?php
// Load autoloader (using Composer)
include "functions.php";
require __DIR__ . '/vendor/autoload.php';
$pdf = new TCPDF();                 // create TCPDF object with default constructor args
$pdf->AddPage();                    // pretty self-explanatory
$id= $_GET['id'];
$article = new Article($id);
$html = '<div class="col-10 mb-4">
            <div class="card" style="width: 650px;">
            <a href="article.php?id='.$article->getId().'"><img class="card-img-top" src="images/'.$article->getFirstImage()->file.'" alt="'.$article->name.'"></a>
                <div class="card-body">
                    <h2 class="card-title">'.$article->title.'</h2>
                    <p>Written by <strong>'.$article->getUserName()->username.'</strong>,
                        Posted in <strong>'.$article->getCategory()->getName().'</strong>
                    </p>
                    <p class="card-text">'.$article->text.'</p>
                </div>
            </div>
        </div>';

$pdf->writeHTML($html, true, false, true, false, '');

$pdf->Output('hello_world.pdf');    // send the file inline to the browser (default).

