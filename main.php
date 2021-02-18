<?php
require __DIR__ . '/tests/tests.php';

define("BIGSPACE", PHP_EOL . PHP_EOL);

try {

    $tests = new RunTests();

    if (!$tests->hasPassed()) {

        $input = trim(readline("The calculator isnt running as expected. Do you want to proceed? (Y/N): "));

        should_exist($input);
    }
} catch (Exception $e) {

    exit($e->getMessage());
}


while (true) {
    try {

        $calc = new DateCalculator();

        echo "Dates must be DD/MM/YYYY" . BIGSPACE;

        $input = trim(readline("Beginning date: "));

        echo PHP_EOL;

        $calc->setBegda($input);

        $input = trim(readline("End date: "));

        echo PHP_EOL;

        $calc->setEndda($input);

        echo $calc->getBegda() . ' - ' . $calc->getEndda() . ': ' . $calc->diff() . ' days' . BIGSPACE;

        $input = trim(readline("Again? (Y/N): "));

        should_exist($input);
    } catch (Exception $e) {

        echo $e->getMessage() . BIGSPACE;

        continue; //restart if error
    }
}

function should_exist($input)
{
    if ($input === 'Y' || $input === 'y') {

        echo BIGSPACE;
    } else if ($input === 'N' || $input === 'n') {

        exit(BIGSPACE . "Goodbye!" . BIGSPACE);
    } else {

        echo "Input not valid" . BIGSPACE;
    }
}
