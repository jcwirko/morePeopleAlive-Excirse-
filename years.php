<?php

class YearCounter
{

    private $count = [];
    private $years = [];

    /*
     * THE ARRAY IS LOADED WITH THE DATA TO CALCULATE
     */
    public function __construct($years)
    {
        $this->years = $years;
    }

    /**
     * GENERATES THE RANGE OF YEARS
     */
    function ranges()
    {
        foreach ($this->years as $range) {
            $this->counter(range($range->birthYear, $range->deathYear));
        }

    }

    /*
     *
COUNT ON THE TIMES THAT APPEAR EVERY YEAR
     */
    function counter($range)
    {
        foreach ($range as $r) {
            array_key_exists($r, $this->count)
                ? $this->count[$r]++
                : $this->count[$r] = 1;
        }
    }

    /*
     *        PRINT SCREEN RESULTS
     */
    function result()
    {
        echo '<p>The years with more people alive were: </p>';

        echo '<pre>';
        foreach (array_keys($this->count, max($this->count)) as $d) {
            echo "$d <br>";
        }
        echo '</pre>';

        echo "<p>with a quantity of: <strong>" .  max($this->count) . "</strong> people </p>";
    }
}

$year = new YearCounter(json_decode(file_get_contents("data.json")));
$year->ranges();
$year->result();

//AL EJECUTAR EL CÓDIGO SE MOSTRARÁ

/*************************************

Los años con más personas vivas fueron:

1948
1949

con un cantidad de: 2586 personas

***************************************/