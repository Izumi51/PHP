## Variáveis em php são declaradas com $

```php
<?php
	$numero = 1;	//case sensitive, ou seja, interpreta diferente letras maiusculas ou minusculas
	$Numero = 2;	//entao essas sao 3 variaveis diferentes
	$NUMERO = 3;	
?>
```

## Operações Matemáticas

```php
<?php
	$a = 2;
	$b = 3;

	$soma = $a + $b;
	$sub = $a - $b;
	%multi = $a * $b;
	$div = $a / $b;
	$expo = $a ** $b;
	
	print $soma;
	print $sub;
	print %multi; 
	print $div;
	print $expo;
?>
```

## Condicional

```php
<?php
	$a = 2;
	$b = 3;
	
	if (($a % 2) == 0)
	{
		echo "par";
	}
	else 
	{
		echo "impar";
	}

	if (($b % 2) == 0)
	{
		echo "par";
	}
	else 
	{
		echo "impar";
	}
?>
```

## laços de Repetição
```php
<?php
	//while
	$i = 0;
	
	while ($i < 10)
	{
		echo $i;
		$i++;
	} 
	
	//do...while
	$j = 0;
	
	do
	{
		echo $j;
		$j++;
	} while ($j < 10);

	//for
	for ($k = 0; $k < 10; $k++)
	{
		echo $k;
	}

	//foreach
	$l = [0,1,2,3,4]
	
	foreach ($l as $numero)
	{
		echo $numero; //cada numero sera imprimido
	}
	
	//com indice
	foreach ($l as $index => $numero)
	{
		echo "numero {$numero} no indice {$index}";
	}	
?>
```