<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use App\Models\Category;
use App\Models\ContactMessage;
use App\Models\MenuItem;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedBusinessProfile();
        $this->seedCategoriesAndMenus();
        $this->seedTestimonials();
        $this->seedContactMessages();
    }

    private function seedBusinessProfile(): void
    {
        BusinessProfile::create([
            'name' => 'Teras Hilda',
            'tagline' => 'Rasanya Beda, Harganya Bersahabat',
            'description' => 'Teras Hilda adalah destinasi kuliner yang menyajikan berbagai macam makanan lezat dengan harga bersahabat. Dari Mie Jebew Mentai yang viral hingga kwetiaw, burger, dan pangsit goreng renyah — semua dibuat fresh setiap hari dengan bahan berkualitas.',
            'story' => 'Berawal dari dapur kecil dan kecintaan pada kuliner, Teras Hilda hadir untuk memberikan pengalaman makan yang tak terlupakan. Kami percaya makanan enak tidak harus mahal. Setiap racikan bumbu dan saus kami buat sendiri dengan resep yang sudah diwariskan dan dikembangkan dari generasi ke generasi.',
            'address' => 'Jl. Pendidikan No. 45, Kompleks Kampus, Yogyakarta',
            'phone' => '0274-123456',
            'whatsapp' => '6281234567890',
            'email' => 'halo@terashilda.id',
            'instagram' => '@terashilda',
            'tiktok' => '@terashilda',
            'facebook' => 'Teras Hilda',
            'opening_hours' => [
                'Senin - Jumat' => '09:00 - 21:00',
                'Sabtu - Minggu' => '10:00 - 22:00',
            ],
            'is_active' => true,
        ]);
    }

    private function seedCategoriesAndMenus(): void
    {
        $categories = [
            [
                'name' => 'Mie Jebew',
                'slug' => 'mie-jebew',
                'description' => 'Mie Jebew signature dengan berbagai topping premium',
                'icon' => '🍜',
                'menus' => [
                    ['name' => 'Mie Jebew Mentai', 'price' => 28000, 'discount_price' => 25000, 'description' => 'Mie dengan saus mentai creamy yang kental, taburan nori dan wijen', 'is_featured' => true],
                    ['name' => 'Mie Jebew Salted Egg', 'price' => 30000, 'discount_price' => null, 'description' => 'Mie dengan saus telur asin yang gurih dan creamy', 'is_featured' => true],
                    ['name' => 'Mie Jebew Blackpepper', 'price' => 26000, 'discount_price' => null, 'description' => 'Mie dengan saus lada hitam yang pedas dan aromatik', 'is_featured' => false],
                    ['name' => 'Mie Jebew Cheese', 'price' => 27000, 'discount_price' => null, 'description' => 'Mie dengan lelehan keju mozzarella yang creamy', 'is_featured' => false],
                    ['name' => 'Mie Jebew Spicy', 'price' => 28000, 'discount_price' => null, 'description' => 'Mie dengan saus pedas level yang bisa dipilih', 'is_featured' => false],
                ],
            ],
            [
                'name' => 'Kwetiaw',
                'slug' => 'kwetiaw',
                'description' => 'Kwetiaw goreng dan kuah dengan cita rasa autentik',
                'icon' => '🍝',
                'menus' => [
                    ['name' => 'Kwetiaw Goreng Spesial', 'price' => 22000, 'discount_price' => 19000, 'description' => 'Kwetiaw goreng dengan telur, sayuran, dan pilihan topping', 'is_featured' => true],
                    ['name' => 'Kwetiaw Kuah', 'price' => 22000, 'discount_price' => null, 'description' => 'Kwetiaw kuah dengan kaldu ayam yang gurih', 'is_featured' => false],
                    ['name' => 'Kwetiaw Goreng Seafood', 'price' => 28000, 'discount_price' => null, 'description' => 'Kwetiaw goreng dengan udang, cumi, dan ikan', 'is_featured' => false],
                    ['name' => 'Kwetiaw Goreng Ayam', 'price' => 24000, 'discount_price' => null, 'description' => 'Kwetiaw goreng dengan topping ayam suwir', 'is_featured' => false],
                ],
            ],
            [
                'name' => 'Burger',
                'slug' => 'burger',
                'description' => 'Burger juicy dengan roti lembut dan saus spesial',
                'icon' => '🍔',
                'menus' => [
                    ['name' => 'Beef Burger Classic', 'price' => 25000, 'discount_price' => 22000, 'description' => 'Patty sapi premium dengan keju, selada, dan saus spesial', 'is_featured' => true],
                    ['name' => 'Chicken Burger', 'price' => 22000, 'discount_price' => null, 'description' => 'Patty ayam crispy dengan saus thousand island', 'is_featured' => false],
                    ['name' => 'Double Cheese Burger', 'price' => 35000, 'discount_price' => null, 'description' => 'Double patty sapi dengan double keju', 'is_featured' => true],
                    ['name' => 'Spicy Burger', 'price' => 27000, 'discount_price' => null, 'description' => 'Burger dengan saus pedas yang nikmat', 'is_featured' => false],
                ],
            ],
            [
                'name' => 'Pangsit',
                'slug' => 'pangsit',
                'description' => 'Pangsit goreng renyah dan pangsit kuah hangat',
                'icon' => '🥟',
                'menus' => [
                    ['name' => 'Pangsit Goreng', 'price' => 15000, 'discount_price' => 12000, 'description' => 'Pangsit goreng renyah dengan isian ayam dan udang', 'is_featured' => true],
                    ['name' => 'Pangsit Kuah', 'price' => 18000, 'discount_price' => null, 'description' => 'Pangsit kuah hangat dengan kaldu ayam', 'is_featured' => false],
                    ['name' => 'Pangsit Goreng Pedas', 'price' => 17000, 'discount_price' => null, 'description' => 'Pangsit goreng dengan saus pedas', 'is_featured' => false],
                ],
            ],
            [
                'name' => 'Minuman',
                'slug' => 'minuman',
                'description' => 'Berbagai minuman segar untuk menemani makananmu',
                'icon' => '🥤',
                'menus' => [
                    ['name' => 'Es Teh Manis', 'price' => 5000, 'discount_price' => null, 'description' => 'Es teh manis segar', 'is_featured' => false],
                    ['name' => 'Es Jeruk', 'price' => 8000, 'discount_price' => null, 'description' => 'Es jeruk segar dengan jeruk asli', 'is_featured' => false],
                    ['name' => 'Es Kopi Susu', 'price' => 12000, 'discount_price' => 10000, 'description' => 'Kopi susu dengan gula aren', 'is_featured' => true],
                    ['name' => 'Teh Tarik', 'price' => 10000, 'discount_price' => null, 'description' => 'Teh tarik creamy yang lembut', 'is_featured' => false],
                    ['name' => 'Lemon Tea', 'price' => 10000, 'discount_price' => null, 'description' => 'Teh lemon segar', 'is_featured' => false],
                ],
            ],
            [
                'name' => 'Snack & Tambahan',
                'slug' => 'snack',
                'description' => 'Snack dan tambahan untuk melengkapi hidanganmu',
                'icon' => '🍟',
                'menus' => [
                    ['name' => 'Kentang Goreng', 'price' => 12000, 'discount_price' => null, 'description' => 'Kentang goreng crispy dengan saus pilihan', 'is_featured' => false],
                    ['name' => 'Chicken Nugget', 'price' => 15000, 'discount_price' => null, 'description' => 'Nugget ayam crispy dengan saus', 'is_featured' => false],
                    ['name' => 'Sosis Bakar', 'price' => 10000, 'discount_price' => null, 'description' => 'Sosis bakar dengan saus sambal dan mayonaise', 'is_featured' => false],
                ],
            ],
        ];

        foreach ($categories as $index => $catData) {
            $category = Category::create([
                'name' => $catData['name'],
                'slug' => $catData['slug'],
                'description' => $catData['description'],
                'icon' => $catData['icon'],
                'sort_order' => $index + 1,
                'is_active' => true,
            ]);

            foreach ($catData['menus'] as $menuIndex => $menuData) {
                MenuItem::create([
                    'category_id' => $category->id,
                    'name' => $menuData['name'],
                    'slug' => \Illuminate\Support\Str::slug($menuData['name']),
                    'description' => $menuData['description'],
                    'price' => $menuData['price'],
                    'discount_price' => $menuData['discount_price'],
                    'is_available' => true,
                    'is_featured' => $menuData['is_featured'],
                    'sort_order' => $menuIndex + 1,
                ]);
            }
        }
    }

    private function seedTestimonials(): void
    {
        $testimonials = [
            ['name' => 'Rina Maharani', 'origin' => 'Mahasiswa UGM', 'rating' => 5, 'message' => 'Mie Jebew Mentainya juara! Sausnya creamy banget dan porsinya juga generous. Harganya juga ramah di kantong mahasiswa.', 'is_featured' => true],
            ['name' => 'Dimas Prasetyo', 'origin' => 'Mahasiswa UNY', 'rating' => 5, 'message' => 'Kwetiaw gorengnya enak, tidak berminyak dan bumbunya pas. Tempatnya juga nyaman buat nongkrong sama temen.', 'is_featured' => true],
            ['name' => 'Siti Nurhaliza', 'origin' => 'Mahasiswa UAD', 'rating' => 4, 'message' => 'Burger-nya juicy dan sausnya beda dari yang lain. Pelayanannya juga cepat meski ramai.', 'is_featured' => true],
            ['name' => 'Ahmad Fauzi', 'origin' => 'Mahasiswa UII', 'rating' => 5, 'message' => 'Pangsit gorengnya renyah banget, isiannya juga banyak. Cocok buat camilan sore.', 'is_featured' => false],
            ['name' => 'Putri Ayu', 'origin' => 'Mahasiswa UGM', 'rating' => 4, 'message' => 'Es kopi susunya mantap, gula arennya berasa. Tempatnya juga instagramable.', 'is_featured' => false],
            ['name' => 'Budi Santoso', 'origin' => 'Mahasiswa UNY', 'rating' => 5, 'message' => 'Double cheese burger-nya worth it banget! Pattey-nya tebal dan juicy.', 'is_featured' => false],
            ['name' => 'Maya Kusuma', 'origin' => 'Mahasiswa UAD', 'rating' => 4, 'message' => 'Mie jebew salted egg-nya unik dan enak. Porsinya juga cukup kenyang.', 'is_featured' => false],
            ['name' => 'Rizky Ramadhan', 'origin' => 'Mahasiswa UII', 'rating' => 5, 'message' => 'Tempat favorit buat makan siang. Harga terjangkau, rasa premium. Recommended!', 'is_featured' => false],
        ];

        foreach ($testimonials as $t) {
            Testimonial::create(array_merge($t, ['is_approved' => true]));
        }
    }

    private function seedContactMessages(): void
    {
        ContactMessage::create([
            'name' => 'Andi Wijaya',
            'email' => 'andi@example.com',
            'subject' => 'Pertanyaan Catering',
            'message' => 'Halo, apakah Teras Hilda menerima pesanan catering untuk acara kampus? Terima kasih.',
            'is_read' => false,
        ]);
    }
}
