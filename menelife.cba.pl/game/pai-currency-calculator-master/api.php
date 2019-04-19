<?php

  define("EUR", 4.32);
  define("USD", 3.21);
  define("CHF", 3.98);

  if( isset($_GET['value']) ) {
    $value = floatval($_GET['value']);

    $values = array(
      "eur" => number_format($value * EUR, 2, '.', '');
      "usd" => number_format($value * USD, 2, '.', '');
      "chf" => number_format($value * CHF, 2, '.', '');
    );

    echo json_encode($values);
  } else {
    echo 0;
  }

?>
