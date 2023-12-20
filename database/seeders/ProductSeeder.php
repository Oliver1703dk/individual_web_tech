<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Seed sample products
        Product::create([
            'name' => 'CyberPowerPC Gamer Xtreme VR Gaming PC',
            'description' => 'Step into the immersive world of high-performance gaming with the CyberPowerPC Gamer Xtreme VR Gaming PC. This desktop powerhouse is designed to elevate your gaming experience to new heights. Featuring the formidable Intel Core i9-9900K processor, a massive 32GB of DDR4 RAM, and an expansive 2TB HDD coupled with a lightning-fast 480GB SSD, this gaming PC delivers the power and speed needed to conquer virtual worlds. Dominate the gaming arena, experience virtual reality like never before, and enjoy the seamless performance of cutting-edge technology.',
            'quantity' => 100,
            'price' => 1499.99,
            'product_info1' => '1TB HDD + 240GB SSD storage',
            'product_info2' => 'Intel Core i7-9700K processor',
            'product_info3' => '16GB DDR4 RAM',
            'product_info4' => '240GB SSD',
            'image'=> 'https://www.elgiganten.dk/image/dv_web_D1800010021336299/539209/pcspecialist-fusion-x90s-i9k-133220004090-stationar-gaming-computer--pdp_zoom-3000--pdp_main-540.jpg'
        ]);

        Product::create([
            'name' => 'Dell XPS 13 Laptop',
            'description' => 'Experience the pinnacle of professional computing with the Dell XPS 13 Laptop. This ultra-thin and lightweight masterpiece is engineered to redefine your expectations. Boasting an 11th Gen Intel Core i7 processor, a generous 16GB of LPDDR4x RAM, and a rapid 512GB PCIe NVMe SSD, the XPS 13 delivers unparalleled performance in a sleek and portable design. The stunning 13-inch InfinityEdge display provides a visually immersive experience, making it an ideal companion for both work and entertainment. Elevate your productivity and redefine the way you compute with the Dell XPS 13.',
            'quantity' => 150,
            'price' => 1299.99,
            'product_info1' => '256GB PCIe NVMe SSD',
            'product_info2' => '11th Gen Intel Core i5 processor',
            'product_info3' => '8GB LPDDR4x RAM',
            'product_info4' => '256GB PCIe NVMe SSD',
            'image'=> 'https://compware.dk/wp-content/uploads/2022/12/RGB-Gamer-PC.webp'
        ]);

        Product::create([
            'name' => 'Logitech MX Master 3 Wireless Mouse',
            'description' => 'Unleash productivity with the Logitech MX Master 3 Wireless Mouse. This advanced ergonomic mouse redefines precision and control. The Darkfield high-precision sensor ensures accurate tracking on any surface, while customizable buttons cater to your specific needs. With cross-computer control using Easy-Switch technology and a rechargeable battery supporting fast charging, the MX Master 3 is the ultimate tool for demanding tasks. Elevate your workflow, experience seamless multitasking, and make every click count with the Logitech MX Master 3.',
            'quantity' => 200,
            'price' => 99.99,
            'product_info1' => '2TB HDD + 480GB SSD storage',
            'product_info2' => 'Intel Core i9-9900K processor',
            'product_info3' => '32GB DDR4 RAM',
            'product_info4' => '480GB SSD',
            'image'=> 'https://i.pinimg.com/564x/37/41/52/374152fb11841914de5c4f54db2e7dce.jpg'
        ]);

        Product::create([
            'name' => 'Samsung Odyssey G7 Gaming Monitor',
            'description' => 'Immerse yourself in the heart of gaming with the Samsung Odyssey G7 Gaming Monitor. This curved 32-inch 4K QLED display transports you to new realms of visual splendor, while AMD Ryzen FreeSync technology ensures a tear-free and smooth gaming experience. With a colossal 64GB of RAM and a blazing-fast 1TB NVMe SSD, the Odyssey G7 sets the stage for unparalleled gaming performance. Elevate your gaming setup, experience breathtaking visuals, and dominate the competition with the Samsung Odyssey G7 Gaming Monitor.',
            'quantity' => 50,
            'price' => 699.99,
            'product_info1' => '512GB PCIe NVMe SSD',
            'product_info2' => '11th Gen Intel Core i7 processor',
            'product_info3' => '16GB LPDDR4x RAM',
            'product_info4' => '512GB PCIe NVMe SSD',
            'image'=> 'https://geekd.dk/cdn/shop/products/60240670f3f25672207245.jpg?v=1642683256'
        ]);

        Product::create([
            'name' => 'Seagate Barracuda 4TB',
            'description' => 'Unlock the power of storage with the Seagate Barracuda 4TB Internal Hard Drive. This high-capacity HDD is a reliable solution for all your storage and backup needs. Boasting a massive 6TB storage capacity, Seagate IronWolf Pro NAS HDD, 32GB of DDR4 RAM, and a speedy 512GB SSD, the Barracuda ensures that you never run out of space while maintaining top-notch performance. Trust in Seagate for efficient, dependable, and high-capacity storage solutions.',
            'quantity' => 300,
            'price' => 99.99,
            'product_info1' => '1TB HDD + 240GB SSD storage',
            'product_info2' => 'Intel Core i7-9700K processor',
            'product_info3' => '16GB DDR4 RAM',
            'product_info4' => '240GB SSD',
            'image'=> 'https://www.avxperten.dk/billeder/cooler-master-masterbox-520-mesh-gamer-pc-kabinet-rgb-atx-ssi-mini-itx-sort-big.jpg'
        ]);

        Product::create([
            'name' => 'ASUS ROG Strix Flare Mechanical',
            'description' => 'Conquer the gaming battlefield with the ASUS ROG Strix Flare Mechanical Gaming Keyboard. This RGB backlit keyboard is engineered for gamers seeking the utmost precision and style. Featuring customizable Cherry MX switches, dedicated media controls, and a magnetic wrist rest for added comfort, the Strix Flare is more than a keyboard; its a weapon for victory. Elevate your gaming setup, experience responsive key action, and unleash your full gaming potential with the ASUS ROG Strix Flare.',
            'quantity' => 120,
            'price' => 169.99,
            'product_info1' => '256GB PCIe NVMe SSD',
            'product_info2' => '11th Gen Intel Core i5 processor',
            'product_info3' => '8GB LPDDR4x RAM',
            'product_info4' => '256GB PCIe NVMe SSD',
            'image'=> 'https://shoppia.dk/wp-content/uploads/2023/07/Begynder-Gaming-Computer-2-scaled.jpg'
        ]);

        Product::create([
            'name' => 'APC Back-UPS Pro 1500VA UPS',
            'description' => 'Secure your electronic devices with the APC Back-UPS Pro 1500VA UPS. This uninterruptible power supply guarantees reliable power backup for your devices, ensuring they stay protected during power outages. With a 1000VA capacity, 10 outlets providing surge protection, automatic voltage regulation (AVR), and an LCD display for real-time status information, the APC Back-UPS Pro 1500VA UPS is the trusted solution for uninterrupted power and peace of mind.',
            'quantity' => 80,
            'price' => 249.99,
            'product_info1' => '512GB PCIe NVMe SSD',
            'product_info2' => '11th Gen Intel Core i7 processor',
            'product_info3' => '16GB LPDDR4x RAM',
            'product_info4' => '512GB PCIe NVMe SSD',
            'image'=> 'https://compware.dk/wp-content/uploads/2022/12/Begynder-Gaming-Computer-2.png'
        ]);


    }
}
