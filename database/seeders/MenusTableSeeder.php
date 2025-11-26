<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Category;

class MenusTableSeeder extends Seeder
{
    public function run()
    {
        // Mapping gambar ke menu items
        // Arabica: 60.000/100gr, Robusta: 15.000/100gr, Excelsa: 37.000/100gr
        // House Blend: 50:50 = 19.000/100gr, 70:30 = 21.000/100gr, 100% = 22.500/100gr
        $menuData = [
            // Arabica - 60.000/100gr
            ['category' => 'Arabica', 'name' => 'Kawi Natural', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica kawi natural.jpg'],
            ['category' => 'Arabica', 'name' => 'Kawi Anaerob', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica kawi anaerob.jpg'],
            ['category' => 'Arabica', 'name' => 'Kawi Mossto', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica kawi mossto.jpg'],
            ['category' => 'Arabica', 'name' => 'Kawi Lactic', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica kawi lactic.jpg'],
            ['category' => 'Arabica', 'name' => 'Kawi Wine', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica kawi wine.jpg'],
            ['category' => 'Arabica', 'name' => 'Ijen Fullwash', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica ijen fullwash.jpg'],
            ['category' => 'Arabica', 'name' => 'Argopuro Danci', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica argopuro danci.jpg'],
            ['category' => 'Arabica', 'name' => 'Argopuro Sumberkembang Natural', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica superkembang natural.jpg'],
            ['category' => 'Arabica', 'name' => 'Gayo Fullwash', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica gayo fullwash.jpg'],
            ['category' => 'Arabica', 'name' => 'Arjuna Yellow Caturra', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica arjuna yellow catura.jpg'],
            ['category' => 'Arabica', 'name' => 'Arjuna Natural', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica arjuna natural.jpg'],
            ['category' => 'Arabica', 'name' => 'Arjuna Anaerob', 'price' => 60000, 'price_per' => '100gr', 'image' => 'arabica arjuna anaerob.jpg'],
            
            // Robusta - 15.000/100gr
            ['category' => 'Robusta', 'name' => 'Kawi Natural', 'price' => 15000, 'price_per' => '100gr', 'image' => 'robusta kawi natural.jpg'],
            ['category' => 'Robusta', 'name' => 'Bondowoso', 'price' => 15000, 'price_per' => '100gr', 'image' => 'robusta bondowoso.jpg'],
            
            // Excelsa - 37.000/100gr
            ['category' => 'Excelsa', 'name' => 'Sumber Putih Anaerob', 'price' => 37000, 'price_per' => '100gr', 'image' => 'excelsa sumber putih anaerob.jpg'],
            ['category' => 'Excelsa', 'name' => 'Sumber Putih Natural', 'price' => 37000, 'price_per' => '100gr', 'image' => 'excelsa sumber putih natural.jpg'],
            
            // House Blend - 3 menu (19.000, 21.000, 22.500 per 100gr)
            ['category' => 'House Blend', 'name' => '50:50', 'price' => 19000, 'price_per' => '100gr', 'image' => 'house blend 50.50.jpg'],
            ['category' => 'House Blend', 'name' => '70:30', 'price' => 21000, 'price_per' => '100gr', 'image' => 'house blend 70.30.jpg'],
            ['category' => 'House Blend', 'name' => '100% Arabica Blend', 'price' => 22500, 'price_per' => '100gr', 'image' => 'house blend 100.png'],
        ];

        foreach ($menuData as $data) {
            $category = Category::where('name', $data['category'])->first();
            
            if ($category) {
                Menu::updateOrCreate(
                    ['name' => $data['name'], 'category_id' => $category->id],
                    [
                        'price' => $data['price'],
                        'price_per' => $data['price_per'],
                        'image' => $data['image'],
                        'description' => 'Premium coffee from ' . $data['category'] . ' beans'
                    ]
                );
            }
        }

        // Fix existing records that may have slightly different names (case/wording)
        // Ensure any menu with 'sumberkembang' or 'superkembang' in the name is set to Arabica price
        Menu::where('name', 'like', '%sumberkembang%')
            ->orWhere('name', 'like', '%superkembang%')
            ->update([
                'price' => 60000,
                'price_per' => '100gr'
            ]);

        // Ensure any 'Arjuna Yellow Caturra' (or similar) entries use the correct Arabica price
        Menu::where('name', 'like', '%arjuna%')
            ->where('price', '<', 60000)
            ->update([
                'price' => 60000,
                'price_per' => '100gr'
            ]);
    }
}
