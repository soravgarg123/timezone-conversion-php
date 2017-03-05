# Timezone Coverstion [PHP](http://php.net/)

PHP class to convert date-time into particular timezone.

## Use

To use this class first you have to require this class then you have to create object of this class, after that you can convert date-time into particular timezone using class methods.

```
	/* Require Timezone Class */
	require 'Timezone.php';
```

```
	/* Create object of Timezone class */
	$timezoneObj = new Timezone();
```

#### Get All Timizones

Will get all timezones name with idetifires.

```
	$timezoneObj->timezones();
```

#### Get Identifire 

Will get identifire of particular timezone, need to pass timezone name as argument in function.

```
	$timezoneObj->get_timezone_identifire($timezone);
```

#### Convert Datetime 

Will use to convert date-time into particular timezone.

```
	$timezoneObj->convert_timezone($timezone,$utctime);
```