<?php

require_once __DIR__ . "/Mesin.php";

// Menu
require_once __DIR__ . "/Menus/SotoMenu.php";
require_once __DIR__ . "/Menus/RawonMenu.php";
require_once __DIR__ . "/Menus/NasiCampurMenu.php";

require_once __DIR__ . "/SoftTopping.php";
require_once __DIR__ . "/MediumTopping.php";

$menus = [
    SotoMenu::class,
    RawonMenu::class,
    NasiCampurMenu::class,
];

$softToppings = [
    KrupukSoftTopping::class,
    SeladaSoftTopping::class,
    GaramSoftTopping::class,
    GulaSoftTopping::class,
];

$mediumToppings = [
    AyamSuirMediumTopping::class,
    DagingPotongKecilMediumTopping::class,
];

$mesin = new Mesin();

/**
 * Memilih menu
 */
foreach ($menus as $key => $menu) {
    echo ($key + 1) . ". " . str_pad($menu::getName(), 20) . " Rp " . (new $menu(0))->getPrice() . PHP_EOL;
}
echo "Pilih menu :" . PHP_EOL;
$inputMenu = trim(fgets(STDIN));
$selectedMenu = $menus[$inputMenu - 1]; // soto
$mesin->setMenu($selectedMenu);


/**
 * Memilih topping ringan
 */
while (true) {
    echo PHP_EOL;

    echo "Apakah Anda ingin menambahkan topping ringan? [y/n] : ";
    $repeat = trim(fgets(STDIN));

    echo PHP_EOL;

    if ($repeat === "n") {
        break;
    }

    foreach ($softToppings as $key => $softTopping) {
        echo ($key + 1) . ". " . str_pad($softTopping::getName(), 20) . " Rp " . (new $softTopping(0))->getPrice() . PHP_EOL;
    }

    echo "Pilih toping ringan : ";
    $inputSoftTopping = trim(fgets(STDIN));

    echo "Masukkan jumlah : ";
    $amount = trim(fgets(STDIN));

    $selectedSoftTopping = $softToppings[$inputSoftTopping - 1];
    $mesin->addSoftTopping([$selectedSoftTopping, $amount]);
}

/**
 * Memilih topping sedang
 */
while (true) {
    echo PHP_EOL;

    echo "Apakah Anda ingin menambahkan topping sedang? [y/n] : ";
    $repeat = trim(fgets(STDIN));

    echo PHP_EOL;

    if ($repeat === "n") {
        break;
    }

    foreach ($mediumToppings as $key => $mediumTopping) {
        echo ($key + 1) . ". " . str_pad($mediumTopping::getName(), 20) . " Rp " . (new $mediumTopping(0))->getPrice() . PHP_EOL;
    }

    echo "Pilih toping sedang : ";
    $inputMediumTopping = trim(fgets(STDIN));

    echo "Masukkan jumlah : ";
    $amount = trim(fgets(STDIN));

    $selectedMediumTopping = $mediumToppings[$inputMediumTopping - 1];
    $mesin->addMediumTopping([$selectedMediumTopping, $amount]);
}

$mesin->calculate();

echo "Harga total : " . $mesin->getTotalCost() . PHP_EOL;
