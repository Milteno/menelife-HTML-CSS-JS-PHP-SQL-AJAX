<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Kalkulator walut</title>
    <style>
      body {
        font-family: monospace;
      }
      header{
        text-align: center;
        font-size: 2em;
        font-weight: bold;
        margin: 32px 0;
        text-transform: uppercase;
      }
      footer {
        border-top: 1px solid black;
        text-align: center;
        padding: 16px 0;
        margin-top: 16px;
      }
      input {
        outline: 0;
        font-size: 1.4em;
        border: 0;
        border-bottom: 2px solid black;
        padding: 6px 2px;
        margin-bottom: 12px;
      }
    </style>
  </head>
  <body>
    <header>
      Kalkulator walut
    </header>

    <input id="input" type="number" min="0" placeholder="Wpisz wartość" oninput="calculate(this.value)" />
    <div>Wartość w euro: <span id="pln_to_eur"></span></div>
    <div>Wartość w dolarach: <span id="pln_to_usd"></span></div>
    <div>Wartość w frankach: <span id="pln_to_chf"></span></div>

    <footer>
      <?php
  			$nazwisko = "Żochowski";
  			$imie = "Mateusz";
  			$szkola = "Zespół Szkół Nr 2 w Ostrowi Mazowieckiej";
  			echo "$nazwisko $imie<br>$szkola";
  		?>
    </footer>

    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script>
      function calculate() {
        jQuery.ajax({
          type: 'GET',
          url: 'api.php',
          data: "value=" + parseFloat(document.getElementById("input").value),
          dataType: 'json',
          success: function(result) {
            console.log(result);
            document.getElementById("pln_to_eur").innerHTML = result.eur;
            document.getElementById("pln_to_usd").innerHTML = result.usd;
            document.getElementById("pln_to_chf").innerHTML = result.chf;
          }
        });
      }
    </script>


  </body>
</html>
