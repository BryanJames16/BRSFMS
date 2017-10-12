<?php

    $pdf = App::make('dompdf.wrapper');
    $pdf->loadHTML('<h1>Hiiii!<<h1>');
    return $pdf->stream();

?>