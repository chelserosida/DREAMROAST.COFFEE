<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bean;

class BeansTableSeeder extends Seeder
{
    public function run()
    {
        $list = [
            ['name'=>'Robusta','type'=>'Robusta','price_per'=>'150000/kg','notes'=>'kawi natural - Bondowoso'],
            ['name'=>'Arabica - Kawi natural','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Kawi natural'],
            ['name'=>'Arabica - Kawi anaerob','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Kawi anaerob'],
            ['name'=>'Arabica - Kawi mossto','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Kawi mossto'],
            ['name'=>'Arabica - Kawi lactic','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Kawi lactic'],
            ['name'=>'Arabica - Kawi wine','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Kawi wine'],
            ['name'=>'Arabica - Ijen fullwash','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Ijen fullwash'],
            ['name'=>'Arabica - Argopuro danci','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Argopuro danci'],
            ['name'=>'Arabica - Argopuro sumberkembang natural','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Argopuro sumberkembang natural'],
            ['name'=>'Arabica - Gayo fullwash','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Gayo fullwash'],
            ['name'=>'Arabica - Arjuna yellow caturra','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Arjuna yellow caturra'],
            ['name'=>'Arabica - Arjuna natural','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Arjuna natural'],
            ['name'=>'Arabica - Arjuna anaerob','type'=>'Arabica','price_per'=>'60.000/100gr','notes'=>'Arjuna anaerob'],
            ['name'=>'Excelsa - sumber putih anaerob','type'=>'Excelsa','price_per'=>'37.000/100gr','notes'=>'sumber putih anaerob'],
            ['name'=>'Excelsa - Sumber putih natural','type'=>'Excelsa','price_per'=>'37.000/100gr','notes'=>'Sumber putih natural'],
            ['name'=>'House Blend 50:50','type'=>'House Blend','price_per'=>'190000/kg','notes'=>'50:50'],
            ['name'=>'House Blend 70:30','type'=>'House Blend','price_per'=>'210000/kg','notes'=>'70:30'],
            ['name'=>'House Blend 100% arabica','type'=>'House Blend','price_per'=>'225000/kg','notes'=>'100% arabica blend'],
        ];

        foreach ($list as $b) {
            Bean::firstOrCreate(['name'=>$b['name']], $b);
        }
    }
}
