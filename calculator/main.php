<?php
require('./calculator.php');

$bigSpace = PHP_EOL . PHP_EOL;

while (true) {
    try {

        $calc = new DateCalculator();

        echo "Dates must be DD/MM/YYYY" . $bigSpace;

        $input = trim(readline("Beginning date: "));

        echo PHP_EOL;

        $calc->setBegda($input);

        $input = trim(readline("End date: "));

        echo PHP_EOL;

        $calc->setEndda($input);

        echo $calc->getBegda() . ' - ' . $calc->getEndda() . ': ' . $calc->diff() .' days'. $bigSpace;

        $input = trim(readline("Again? (Y/N): "));

        if ($input === 'Y' || $input === 'y') {

            echo $bigSpace;

            continue; //restart if yes

        } else if ($input === 'N' || $input === 'n') {

            exit($bigSpace . "Goodbye!" . $bigSpace);

        } else {

            echo "Input not valid" . $bigSpace;
        }
    } catch (Exception $e) {

        echo $e->getMessage() . $bigSpace;

        continue; //restart if error
    }
}
