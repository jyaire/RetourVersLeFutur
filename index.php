<?php
require_once 'TimeTravel.php';

// on instancie les dates du voyage
$start = new DateTime("1985-12-31");
$end = new DateTime("1954-04-23");
echo "Date 1 (start) = " . $start->format('d-m-Y') . '<br>';
echo "Date 2 (end) = " . $end->format('d-m-Y') . '<br>';

// on instancie le voyage
$voyage = new TimeTravel($start, $end);
echo $voyage->getTravelInfo();

// on instancie un intervalle pour trouver la date de départ
echo'<br><br>';
$interval = new DateInterval('PT1000000000S');
echo "La date d'arrivée est le " . $voyage->findDate($interval);
echo '<br><br>';

// on crée le 2e intervalle pour recharger le carburant
echo 'Départ : ';
echo $voyage->findDate($interval) . '<br>';
$step = new DateInterval('P1M1D');
$steps = $voyage->backToFutureStepByStep($step);
foreach ($steps as $step) {
        echo "Doc, arrête-toi : ";
        echo $step;
        echo '<br>';
    } ?>








