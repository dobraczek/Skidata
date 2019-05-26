# <img src="http://webscript.cz/skidata.png" width="180" alt="SKIDATA mini API verze 1.0" />&nbsp; mini API verze 1.0

SKIDATA mini API - nástoj pro komunikaci se serverem SKIDATA. Jedná se o minimalizovanou verzi nepodporující nákup balíčku, apod. Pro napojení na server je nutné mě kontaktovat.

Ukázka výstupu API při otestování například validity čipu: https://webscript.cz/SkidataAPI/
POZOR: Ukázka funguje v případě, že SKIDATA mají povolenou testovací verzi serveru. Ukázka není napojena na ostrou databázi.

Ukázka vlastního testu čipové karty (vyměňte parametr chip v URL): https://webscript.cz/SkidataAPI/?chip=30161472562512341833850

### Čtení katalogu SKIDATA

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->Catalog();
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Otestování validity čipu

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->Chip('30-1614 7256 2512 3418 3385-0');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Detail kontrétního produktu

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->Product('ea299ac4-43b7-e6e5-90f4-f83889ba88e1');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Výpis objednávek

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->Orders();
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Detail konkrétní objednávky

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->Order('001bb8e0-209a-11e9-86fb-005056b1dfdb');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Vytvoření jednoduché objednávky

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->OrderNew(array(
  'FirstName'     => 'Jan',
  'LastName'      => 'Navak',
  'BirthDate'     => NULL,
  'Chip'          => '30-1614 7256 2512 3418 3385-0',
  'ContactId'     => NULL,

  'Amount'        => 1,
  'Unit'          => 'Day',

  'ProductId'     => '7cdc8c80-7c53-8aad-5527-d85ef26fe8c7',
  'ConsumerCategoryId'=> '181406bf-b845-d731-349b-d659fd449e66',
  'Price'         => '200',
	
  'ValidFrom'     => '2019-05-20',

  'CurrencyCode'  => 'CZK'
));
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Storno objednávky

```
require "Skidata.php";
$Skidata = new DTA\Skidata();
$json = $Skidata->Storno('f9c72dd0-6e50-11e9-bf3d-005056b1dfdb');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Příklad chybové hlášky

```
Array
(
    [Report] => Cancelation of any ticket item of order item "fa15c300-6e50-11e9-bf3d-005056b1dfdb" not allowed, because it is already cancelled.
)
```
