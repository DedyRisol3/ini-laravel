<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            MenuSeeder::class,
        ]);
        
        Menu::create([
            'user_id' => 1,
            'nama' => 'Chicken Katsu Curry',
            'deskripsi' => 'Ayam goreng tepung renyah disajikan dengan kuah kari khas Jepang.',
            'kategori' => 'makanan',
            'harga' => 35000,
            'gambar' => 'chicken_katsu_curry.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Beef Teriyaki Rice Bowl',
            'deskripsi' => 'Irisan daging sapi dengan saus teriyaki, disajikan dengan nasi.',
            'kategori' => 'makanan',
            'harga' => 40000,
            'gambar' => 'beef_teriyaki.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Spaghetti Aglio e Olio',
            'deskripsi' => 'Spaghetti dengan minyak zaitun, bawang putih, dan cabai.',
            'kategori' => 'makanan',
            'harga' => 40000,
            'gambar' => 'spaghetti_aglio_olio.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Creamy Carbonara Pasta',
            'deskripsi' => 'Pasta creamy dengan daging asap dan taburan keju.',
            'kategori' => 'makanan',
            'harga' => 38000,
            'gambar' => 'carbonara_pasta.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Mozzarella Chicken Wings',
            'deskripsi' => 'Sayap ayam renyah dengan topping keju mozzarella leleh.',
            'kategori' => 'makanan',
            'harga' => 42000,
            'gambar' => 'mozzarella_chicken_wings.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Korean Spicy Chicken',
            'deskripsi' => 'Ayam goreng dengan saus pedas manis khas Korea.',
            'kategori' => 'makanan',
            'harga' => 39000,
            'gambar' => 'korean_spicy_chicken.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'BBQ Chicken Pizza',
            'deskripsi' => 'Pizza tipis dengan topping ayam BBQ dan keju melimpah.',
            'kategori' => 'makanan',
            'harga' => 60000,
            'gambar' => 'bbq_chicken_pizza.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Ramen Miso Spicy',
            'deskripsi' => 'Ramen dengan kuah miso pedas dan topping telur rebus.',
            'kategori' => 'makanan',
            'harga' => 45000,
            'gambar' => 'ramen_miso_spicy.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Chicken Quesadilla',
            'deskripsi' => 'Tortilla isi ayam dan keju meleleh, dipotong segitiga.',
            'kategori' => 'makanan',
            'harga' => 39000,
            'gambar' => 'chicken_quesadilla.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Egg Sandwich Toast',
            'deskripsi' => 'Roti panggang isi telur lembut dan saus mayo spesial.',
            'kategori' => 'makanan',
            'harga' => 25000,
            'gambar' => 'egg_sandwich_toast.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Donburi Chicken Katsu',
            'deskripsi' => 'Chicken katsu disajikan di atas nasi hangat dengan telur.',
            'kategori' => 'makanan',
            'harga' => 40000,
            'gambar' => 'donburi_chicken_katsu.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Tteokbokki Korean Rice Cake',
            'deskripsi' => 'Kue beras Korea dengan saus gochujang pedas manis.',
            'kategori' => 'makanan',
            'harga' => 28000,
            'gambar' => 'tteokbokki.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Jus Jeruk Segar',
            'deskripsi' => 'Jus jeruk segar tanpa tambahan gula, sangat menyegarkan.',
            'kategori' => 'minuman',
            'harga' => 15000,
            'gambar' => 'jus_jeruk.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Brown Sugar Boba Milk',
            'deskripsi' => 'Minuman susu segar dengan gula aren dan boba kenyal.',
            'kategori' => 'minuman',
            'harga' => 25000,
            'gambar' => 'brown_sugar_boba.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Matcha Latte',
            'deskripsi' => 'Minuman teh hijau Jepang dengan susu segar.',
            'kategori' => 'minuman',
            'harga' => 27000,
            'gambar' => 'matcha_latte.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Mojito Lemon Mint',
            'deskripsi' => 'Minuman soda lemon dengan daun mint segar.',
            'kategori' => 'minuman',
            'harga' => 20000,
            'gambar' => 'mojito_lemon_mint.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Strawberry Smoothie',
            'deskripsi' => 'Smoothie stroberi segar dengan susu dan es krim.',
            'kategori' => 'minuman',
            'harga' => 26000,
            'gambar' => 'strawberry_smoothie.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Es Coklat Belgian',
            'deskripsi' => 'Coklat Belgia kental disajikan dengan es dan susu.',
            'kategori' => 'minuman',
            'harga' => 20000,
            'gambar' => 'es_coklat_belgian.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Avocado Coffee Float',
            'deskripsi' => 'Jus alpukat dengan es krim vanila dan kopi.',
            'kategori' => 'minuman',
            'harga' => 30000,
            'gambar' => 'avocado_coffee_float.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Lychee Yakult',
            'deskripsi' => 'Campuran yakult segar dan sirup leci, sangat menyegarkan.',
            'kategori' => 'minuman',
            'harga' => 20000,
            'gambar' => 'lychee_yakult.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Taro Milk Tea',
            'deskripsi' => 'Teh susu rasa taro ungu dengan topping boba.',
            'kategori' => 'minuman',
            'harga' => 25000,
            'gambar' => 'taro_milk_tea.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Thai Tea',
            'deskripsi' => 'Teh khas Thailand dengan susu kental manis.',
            'kategori' => 'minuman',
            'harga' => 18000,
            'gambar' => 'thai_tea.jpg'
        ]);

        Menu::create([
            'user_id' => 1,
            'nama' => 'Puding Coklat',
            'deskripsi' => 'Puding lembut dengan rasa coklat yang lezat.',
            'kategori' => 'dessert',
            'harga' => 12000,
            'gambar' => 'puding_coklat.jpg'
        ]);
    }
}
