--TEST--
Test Collection::distinct().
--FILE--
<?php
$array = [];
for ($i = 0; $i < 400; ++$i) {
    $array[] = random_int(1, 400);
}
$collection = Collection::init($array)->distinct();
if ($collection->toArray() != array_values(array_unique($array))) {
    echo 'Collection::distinct() failed.', PHP_EOL;
}

$array = [];
for ($i = 0; $i < 100; ++$i) {
    $array[random_bytes(4)] = random_int(1, 10);
}
$collection = Collection::init($array)->distinct();
if (array_diff($collection->toArray(), array_unique($array))) {
    echo 'Collection::distinct() failed.', PHP_EOL;
}
?>
--EXPECT--