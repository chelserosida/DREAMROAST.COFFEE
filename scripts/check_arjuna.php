<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\Menu;

$results = Menu::where('name','like','%Arjuna%')->get();

$output = $results->map(function($m){
    return [
        'id' => $m->id,
        'name' => $m->name,
        'price' => $m->price,
        'price_per' => $m->price_per,
    ];
})->toArray();

print_r($output);
