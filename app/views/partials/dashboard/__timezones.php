<?php
$regions = [
    'Africa'     => \DateTimeZone::AFRICA,
    'America'    => \DateTimeZone::AMERICA,
    'Antarctica' => \DateTimeZone::ANTARCTICA,
    'Aisa'       => \DateTimeZone::ASIA,
    'Atlantic'   => \DateTimeZone::ATLANTIC,
    'Europe'     => \DateTimeZone::EUROPE,
    'Indian'     => \DateTimeZone::INDIAN,
    'Pacific'    => \DateTimeZone::PACIFIC,
];
$timezones = [];

foreach ($regions as $name => $mask):
    $zones = \DateTimeZone::listIdentifiers($mask);
    foreach ($zones as $timezone):
        $timezones[$name][$timezone] = $timezone;
    endforeach;
endforeach;
?>

<?php foreach ($timezones as $region => $list): ?>
    <optgroup label="<?=$region?>">
	    <?php foreach ($list as $timezone => $name): ?>
	        <option name="<?=$timezone?>" <?php if ($current_timezone === $timezone): ?>selected="selected"<?php endif?>><?=$name?></option>
	    <?php endforeach?>
    <optgroup>
<?php endforeach?>
