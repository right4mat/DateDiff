<?php
require('./calculator.php');


while (true) {
    try {
        $calc = new DateCalculator();
        $input = trim(readline("Beginning date: "));
        $calc->setBegda($input);
        $input = trim(readline("End date: "));
        $calc->setEndda($input);
        echo $calc->getBegda() . ' - ' . $calc->getEndda() . ': ' . $calc->diff() . PHP_EOL . PHP_EOL . PHP_EOL;
        $input = trim(readline("Again? (Y/N): "));
        if ($input === 'Y' || $input === 'y') {
            echo PHP_EOL . PHP_EOL . PHP_EOL;
            continue;
        } else if ($input === 'N' || $input === 'n') {
            exit("Goodbye!" . PHP_EOL);
        } else {
            echo "Input not valid" . PHP_EOL;
        }
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
        continue;
    }
}
