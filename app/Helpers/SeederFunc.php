<?php

namespace App\Helpers;

use PDF;
use ZipArchive;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Carbon;

class SeederFunc {

    public static function loadImageFolders() {
        $image_folders = [
            [ 
                'id'        => 1,
                'name'      => 'about-image_1',
                'extension' => 'jpg',
            ],
            [ 
                'id'        => 2,
                'name'      => 'about-image_2',
                'extension' => 'jpg'
            ],
            [ 
                'id'        => 3,
                'name'      => 'characteristic-image',
                'extension' => 'jpg'
            ],
            [ 
                'id'        => 4,
                'name'      => 'review-image',
                'extension' => 'png'
            ],
            [ 
                'id'        => 5,
                'name'      => 'information-image',
                'extension' => 'png'
            ],
            [ 
                'id'        => 6,
                'name'      => 'menu-item-image',
                'extension' => 'png'
            ]
        ];
        $insert_image_folders = \App\Models\ImageFolder::insert($image_folders);
        $image_sizes = [
            [ 
                'id'        => 1,
                'parent_id' => 1,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 800,
                'height'    => 560,
            ],
            [ 
                'id'        => 2,
                'parent_id' => 1,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
            [ 
                'id'        => 3,
                'parent_id' => 2,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 519,
                'height'    => null,
            ],
            [ 
                'id'        => 4,
                'parent_id' => 2,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
            [ 
                'id'        => 5,
                'parent_id' => 3,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 600,
                'height'    => null,
            ],
            [ 
                'id'        => 6,
                'parent_id' => 3,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
            [ 
                'id'        => 7,
                'parent_id' => 4,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 150,
                'height'    => null,
            ],
            [ 
                'id'        => 8,
                'parent_id' => 4,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
            [ 
                'id'        => 9,
                'parent_id' => 5,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 800,
                'height'    => null,
            ],
            [ 
                'id'        => 10,
                'parent_id' => 5,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
            [ 
                'id'        => 11,
                'parent_id' => 6,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 800,
                'height'    => null,
            ],
            [ 
                'id'        => 12,
                'parent_id' => 6,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
        ];
        $insert_image_sizes = \App\Models\ImageSize::insert($image_sizes);
    }
    
    public static function loadInformations() {
        \App\Models\Information::create([
            'code'  => 'banner-init',
            'title' => [
                'en' => 'Welcome to a Different Experience to Regenerate your Spirit in the Altitude!',
                'es' => 'Bienvenido a Una Experiencia Diferente para Regenerar tu Espíritu en la Altura!'
            ],
            'subtitle' => [
                'en' => 'The Unique Classic Pub-Restaurant in The Marvel City – La Paz, Bolivia',
                'es' => 'El Unico Clásico Pub-Restaurant en la Ciudad Maravilla de La Paz, Bolivia'
            ]
         ]);
    }

    public static function loadOurHistory() {
        \App\Models\About::create([
            'number' => 1,
            'title' => [
                'en' => 'Few words about us',
                'es' => 'Algunas Palabras Acerca de Nosotros'
            ],
            'description' => [
                'en' => '<p>With more than 20 years of existence, Diesel Nacional is indisputably a Classic Pub-Restaurant of the nightlife of the City of La Paz, "One of the 7 Wonder Cities of the World".</p><p>Diesel Nacional is a unique space inspired by the Industrial Revolution. Exceptionally composed remnants of time take us to a renewing air that inspires an eco-friendly attitude. Historical and economic circularity are breathed in every corner of Diesel Nacional, always accompanied by good, selected music and exquisitely prepared food and drinks.</p><p>These are details that make La Paz a Wonder City. Come to La Paz and visit us!!</p>',
                'es' => '<p>Con más de 20 años de existencia, Diesel Nacional es indiscutiblemente un Pub-Restaurant Clásico de la vida nocturna de la Ciudad de La Paz, “Una de las 7 Ciudades Maravilla del Mundo”. </p><p>Diesel Nacional es un espacio único inspirado en la revolución industrial, donde remanentes de la época compuestos excepcionalmente, nos llevan a un aire renovador que inspira una actitud eco-amigable, donde la circularidad histórica y económica se respira en cada rincón de Diesel Nacional, acompañado siempre de buena música seleccionada, y comida y bebidas exquisitamente preparadas.</p><p>Estos son detalles que hacen de La Paz, una Ciudad Maravilla. Ven a La Paz y visítanos!!</p>'
            ],
            'image_1' => \Asset::upload_image(asset('assets/img/content/about1.jpg'), 'about-image_1'),
            'image_2' => \Asset::upload_image(asset('assets/img/content/about2.jpg'), 'about-image_2')
         ]);
    }

    public static function loadSchedules() {
        \App\Models\Schedule::create([
            'title' => [
                'en' => 'Sunday to Tuesday',
                'es' => 'De Domingo a Martes'
            ],
            'order' => 1,
            'from' => '09:00',
            'to' => '22:00'
        ]);
        \App\Models\Schedule::create([
            'title' => [
                'en' => 'Friday to Saturday',
                'es' => 'De Viernes a Sábado'
            ],
            'order' => 2,
            'from' => '11:00',
            'to' => '19:00'
        ]);
    }

    public static function loadCategoriesAndMenu() {
        $category1 = \App\Models\Category::create([
            'order' => 1,
            'name' => [
                'en' => 'THE RESTO DIESEL',
                'es' => 'EL RESTO DIESEL'
            ],
            'detail' => [
                'en' => 'International Menu',
                'es' => 'Carta Internacional'
            ]
        ]);    
        $category2 = \App\Models\Category::create([
            'order' => 2,
            'name' => [
                'en' => 'LA BARRA DIESEL',
                'es' => 'LA BARRA DIESEL'
            ],
            'detail' => [
                'en' => 'BBQ & Charcoal',
                'es' => 'Parrilla al Carbon & Asador de Leña'
            ]
        ]);
        $category3 = \App\Models\Category::create([
            'order' => 3,
            'name' => [
                'en' => '“CLASSIC” DIESEL NACIONAL',
                'es' => 'DIESEL NACIONAL “CLASICO”'
            ],
            'detail' => [
                'en' => '',
                'es' => ''
            ]
        ]);  
        $menu1 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 1,
            'title' => [
                'en' => 'Main Dishes',
                'es' => 'Diesel nacional “CLÁSICO”'
            ],
            'detail' => [
                'en' => '',
                'es' => ''
            ]
        ]); 
        $menuItems1 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Individual Plates', 'es' => 'Platos Individuales' ] ]
        ];
        $menu1->menu_items()->createMany($menuItems1);
        $menu2 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 2,
            'title' => [
                'en' => 'Beef or Steak',
                'es' => 'Carne de Res'
            ]
        ]); 
        $menuItems2 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Lomo Montado', 'es' => 'Lomo Montado' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Medio Lomo', 'es' => 'Medio Lomo' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Black Pepper Medallion of Beef with American mashed potatoes', 'es' => 'Medallones a la Pimienta con Puré Americano' ] ],
        ];
        $menu2->menu_items()->createMany($menuItems2);
        $menu3 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 3,
            'title' => [
                'en' => 'Chicken',
                'es' => 'Pollo'
            ]
        ]); 
        $menuItems3 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Chicken Milanese (Fries and Salad)', 'es' => 'Milanesa de Pollo (Papa Frita y Ensalada)' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Teriyaki Chicken with sauteed veggies', 'es' => 'Pollo Teriyaki (con Verduras salteadas)' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Chiken Skewer Teriyaki stile', 'es' => 'Brochetas Teriyaki' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Hell’s Chicken with Pasta Very Hot!!!!', 'es' => 'Pollo del Averno con Tallarines (Muuuuuuuy picante!!!!)' ] ]
        ];
        $menu3->menu_items()->createMany($menuItems3);
        $menu4 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 4,
            'title' => [
                'en' => 'Fish',
                'es' => 'Pescado'
            ]
        ]); 
        $menuItems4 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Teriyaki Lake Trout with White Rice', 'es' => 'Trucha Teriyaki con arroz blanco' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Lake Trout a la Noissette Beurre with White Rice', 'es' => 'Trucha a la Mantequilla Negra con arroz blanco' ] ],
        ];
        $menu4->menu_items()->createMany($menuItems4);
        $menu5 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 5,
            'title' => [
                'en' => 'Pastas',
                'es' => 'Pasta'
            ]
        ]); 
        $menuItems5 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Pasta with Thyme Chicken', 'es' => 'Tallarines con Pollo al Tomillo' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Puttanesca Pasta', 'es' => 'Tallarines Puttanesca(Aceitunas, alcaparras, tomate)' ] ],
        ];
        $menu5->menu_items()->createMany($menuItems5);
        $menu6 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 6,
            'title' => [
                'en' => 'Salads',
                'es' => 'Ensaladas'
            ]
        ]); 
        $menuItems6 = [
            [ 'order' => 1, 'title' => [ 'en' => 'House Salad', 'es' => 'Ensalada de la Casa' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'SHAREABLES or (Eat & Bites)', 'es' => 'PA’ PICAR, PA’L BUCHE… (para compartir)' ] ],
        ];
        $menu6->menu_items()->createMany($menuItems6);
        $menu7 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 7,
            'title' => [
                'en' => 'Beef or Steak',
                'es' => 'Carne de Res'
            ]
        ]); 
        $menuItems7 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Sliced Milanese (For 2) (French Fries and Salad)', 'es' => 'Milanesa Picada (Para 2) (Papa Frita y Ensalada)' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Napolitan style Milanese (French Fries) (For 2)', 'es' => 'Milanesa Napolitana (Papa Frita)  (Para 2)' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Swiss Milanese (Cheese & White Sauce, with fries) (For 2)', 'es' => 'Milanesa Suiza (Queso y Salsa Blanca con fritas) (Para 2)' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Pique Macho (Para 2)', 'es' => 'Typical Bolivian Dish (Beef, Sausage, Egg & Tomatoes over Fries (For 2)' ] ],
        ];
        $menu7->menu_items()->createMany($menuItems7);
        $menu8 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 8,
            'title' => [
                'en' => 'CHARCUTERY',
                'es' => 'CHARCUTERIA'
            ]
        ]); 
        $menuItems8 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Cheese and cured meats platter with Bread (for 2)', 'es' => 'Tabla de Quesos y Embutidos (2 Personas)' ] ],
        ];
        $menu8->menu_items()->createMany($menuItems8);
        $menu9 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 9,
            'title' => [
                'en' => 'HAMBURGERS',
                'es' => 'HAMBURGUESAS'
            ]
        ]); 
        $menuItems9 = [
            [ 'order' => 1, 'title' => [ 'en' => 'No Bread Hamburger (1/2 pound) with French fries and salad', 'es' => 'Hamburguesa al plato (220 Grs) con Ensalada Mixta y Papa Frita' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'No Bread Chessburger (1/2 pound) with French fries and salad', 'es' => 'Hamburguesa con 3 Quesos al plato (220 Grs)  	60 con Ensalada Mixta y Papa Frita' ] ],
        ];
        $menu9->menu_items()->createMany($menuItems9);
        $menu10 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 10,
            'title' => [
                'en' => 'HOT SANDWICHES',
                'es' => 'SANDWICHES (calientes)'
            ]
        ]); 
        $menuItems10 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Choripan', 'es' => 'Choripan' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Hamburguesa Simple', 'es' => 'Hamburguesa Simple' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Lomito', 'es' => 'Lomito' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Milanesa', 'es' => 'Milanesa' ] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Barros Luco Typical chilean fillet sandwich with cheese (in Marraqueta or french bread)', 'es' => 'Lomito con queso en marraqueta o pan francés' ] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Quesadillas (Cheese & Ham in wheat tortilla)', 'es' => 'Quesadillas (Queso solo o con jamón en tortilla de trigo)' ] ],
            [ 'order' => 7, 'title' => [ 'en' => 'Argentinian Empandas', 'es' => 'Empanadas Argentinas' ] ],
        ];
        $menu10->menu_items()->createMany($menuItems10);
        $menu11 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 11,
            'title' => [
                'en' => 'COLD SANDWICH',
                'es' => 'SANDWICHS FRIOS'
            ]
        ]); 
        $menuItems11 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Caprese Sandwich in Pita Bread (Tomato, Cheese & Basil)', 'es' => 'Caprese en pan Árabe (Tomate,queso,albahaca)Choripan' ] ],
        ];
        $menu11->menu_items()->createMany($menuItems11);
        $menu12 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 12,
            'title' => [
                'en' => 'OTHER SMALL DELICIUOUS SURPRISES',
                'es' => 'OTRAS PEQUEÑAS DELICIOSAS SORPRESAS'
            ]
        ]); 
        $menuItems12 = [
            [ 'order' => 1, 'title' => [ 'en' => '(Chili, Tortillas, Crêpes & others)', 'es' => '(Chili, Tortillas, Crêpes y otros)' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Chili and Meat Stew', 'es' => 'Chili con Carne (El Mejor del Eje Troncal) ' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Chili and Meat Stew over French Fries with Cheese', 'es' => 'Chili Fries' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Crunchy Nachos with Chili, Cheese and Guacamole', 'es' => 'Nachos con Chili, Queso y Guacamole' ] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Spanish Tortilla (potato tortilla with onions and a pinch of Spanish sausage)', 'es' => 'Tortilla Española (Papa,Cebolla,pizca Chorizo Español)' ] ],
        ];
        $menu12->menu_items()->createMany($menuItems12);
        $menu13 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 13,
            'title' => [
                'en' => 'SIDE DISHES',
                'es' => 'ACOMPAÑAMIENTOS'
            ]
        ]); 
        $menuItems13 = [
            [ 'order' => 1, 'title' => [ 'en' => 'French Fries', 'es' => 'Porción de papas fritas' ] ],
        ];
        $menu13->menu_items()->createMany($menuItems13);
        $menu14 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 14,
            'title' => [
                'en' => 'DESSERTS',
                'es' => 'POSTRES'
            ]
        ]); 
        $menuItems14 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Crêpe con Dulce de Leche', 'es' => 'Crêpe con Dulce de Leche' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Syrup caned peaches with cream', 'es' => 'Duraznos al Jugo con crema' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Flan casero con dulce de leche', 'es' => 'Flan casero con dulce de leche' ] ],
        ];
        $menu14->menu_items()->createMany($menuItems14);
        $menu15 = \App\Models\Menu::create([
            'categoryId' => $category1->id,
            'order' => 15,
            'title' => [
                'en' => 'MENU OF THE DAY or WEEKLY SPECIALS',
                'es' => 'PLATO DEL DÍA o EL ESPECIAL SEMANAL'
            ]
        ]); 
        $menuItems15 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Anticuchos de Corazón (de jueves a sábado)', 'es' => 'Anticuchos de Corazón (de jueves a sábado)' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Anticuchos de Filete', 'es' => 'Anticuchos de Filete' ] ],
        ];
        $menu15->menu_items()->createMany($menuItems15);
    }

    public static function loadCharacteristics() {
        \App\Models\Characteristic::create([
            'order' => 1,
            'title' => [
                'en' => 'Great Food',
                'es' => 'Buena Comida'
            ],
            'subtitle' => [
                'en' => 'Daily New Fresh Menus',
                'es' => 'Nuevos menús frescos del día'
            ],
            'detail' => [
                'en' => 'ENJOY GREAT FOOD FOR GROUPS OR PERSONAL',
                'es' => 'DISFRUTE DE UNA EXCELENTE COMIDA PARA GRUPOS O PERSONAL'
            ],
            'image' => \Asset::upload_image(asset('assets/img/content/characteristics/1.jpg'), 'characteristic-image'),
        ]); 
        \App\Models\Characteristic::create([
            'order' => 2,
            'title' => [
                'en' => 'Exceptional Atmosphere',
                'es' => 'Excelente Ambiente y Atmosfera sin igual'
            ],
            'subtitle' => [
                'en' => 'Unique Ambiance for a Different Experience',
                'es' => 'Ambiente único para una experiencia diferente'
            ],
            'detail' => [
                'en' => 'FEEL THE PAST AND THE PRESENT AT A TIME',
                'es' => 'SIENTE EL PASADO Y EL PRESENTE A LA VEZ'
            ],
            'image' => \Asset::upload_image(asset('assets/img/content/characteristics/2.jpg'), 'characteristic-image'),
        ]); 
        \App\Models\Characteristic::create([
            'order' => 3,
            'title' => [
                'en' => 'Exquisite Drinks',
                'es' => 'Exquisitos Cocteles y Bebidas'
            ],
            'subtitle' => [
                'en' => 'The Best Drinks for Great Moments',
                'es' => 'Las mejores bebidas para grandes momentos'
            ],
            'detail' => [
                'en' => 'SPECIAL DRINKS AND THE BEST BEERS',
                'es' => 'DELICIOSAS BEBIDAS Y BUENAS CERVEZAS'
            ],
            'image' => \Asset::upload_image(asset('assets/img/content/characteristics/3.jpg'), 'characteristic-image'),
        ]); 
    }

    public static function loadEvents() {
        \App\Models\Event::create([
            'order' => 1,
            'title' => [
                'en' => 'Jazz Band Live Event',
                'es' => 'Evento en vivo con una banda de jazz'
            ],
            'subtitle' => [
                'en' => '25 may 2025',
                'es' => '25 de mayo de 2025'
            ],
            'detail' => [
                'en' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis ornare felis ut viverra. Mauris suscipit libero ac mi viverra facilisis.',
                'es' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus venenatis ornare felis ut viverra. Mauris suscipit libero ac mi viverra facilisis.'
            ],
        ]); 
    }

    public static function loadReviews() {
        \App\Models\Review::create([
            'name' => 'Josué Gutiérrez',
            'detail' => 'Un lugar increíble con mucha buena música y muy buen ambiente.',
            'qualification' => 5,
            'image' => \Asset::upload_image(asset('assets/img/content/profile/user.png'), 'review-image'),
        ]); 
        \App\Models\Review::create([
            'name' => 'Esteban Soleri',
            'detail' => 'La comida es deliciosa 100/100',
            'qualification' => 5,
            'image' => \Asset::upload_image(asset('assets/img/content/profile/user.png'), 'review-image'),
        ]); 
    }
}