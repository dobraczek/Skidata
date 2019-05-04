# <img src="http://webscript.cz/skidata.png" width="180" alt="SKIDATA mini API verze 1.0" />&nbsp; mini API verze 1.0

SKIDATA mini API - nástoj pro komunikaci se serverem SKIDATA. Jedná se o minimalizovanou verzi nepodporující nákup balíčku, apod. Pro napojení na server je nutné mě kontaktovat.

Ukázka výstupu API při otestování například validity čipu: http://webscript.cz/SkidataAPI/

### Čtení katalogu SKIDATA

```
$json = $Skidata->Catalog();
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Otestování validity čipu

```
$json = $Skidata->Chip('30-1614 7256 2512 3418 3385-0');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Detail kontrétního produktu

```
$json = $Skidata->Product('ea299ac4-43b7-e6e5-90f4-f83889ba88e1');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Výpis objednávek

```
$json = $Skidata->Orders();
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Detail konkrétní objednávky

```
$json = $Skidata->Order('001bb8e0-209a-11e9-86fb-005056b1dfdb');
echo '<pre>'.print_r(json_decode($json, 1), 1).'</pre>';
```

### Vytvoření jednoduché objednávky

```
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
