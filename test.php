<?php

$bla = [1,2,3,4,5,6];

var_dump(rx_count($bla));

var_dump(rx_max($bla));

var_dump(rx_min($bla));

var_dump(rx_first($bla));

var_dump(rx_last($bla));

var_dump(rx_contains($bla,2));

var_dump(rx_contains($bla,9));

var_dump(rx_median($bla));

var_dump(rx_avg($bla));

var_dump(rx_mode($bla));