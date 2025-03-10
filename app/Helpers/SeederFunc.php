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
            ],
            [ 
                'id'        => 7,
                'name'      => 'event-image',
                'extension' => 'jpg'
            ],
            [ 
                'id'        => 8,
                'name'      => 'menu-image',
                'extension' => 'jpg'
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
            [ 
                'id'        => 13,
                'parent_id' => 7,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 1920,
                'height'    => null,
            ],
            [ 
                'id'        => 14,
                'parent_id' => 7,
                'code'      => 'original',
                'type'      => 'original',
                'width'     => null,
                'height'    => null,
            ],
            [ 
                'id'        => 15,
                'parent_id' => 8,
                'code'      => 'normal',
                'type'      => 'resize',
                'width'     => 1920,
                'height'    => null,
            ],
            [ 
                'id'        => 16,
                'parent_id' => 8,
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
            'order' => 2,
            'code' => 'the-resto-diesel',
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
            'code' => 'barra-diesel',
            'order' => 3,
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
            'code' => 'diesel-bar-menu',
            'order' => 1,
            'name' => [
                'en' => 'THE DIESEL BAR',
                'es' => 'EL BAR DIESEL'
            ],
            'detail' => [
                'en' => '',
                'es' => ''
            ]
        ]);  
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
            [ 'order' => 5, 'title' => [ 'en' => 'Barros Luco Typical chilean fillet sandwich with cheese', 'es' => 'Lomito con queso en marraqueta o pan francés' ], 'detail' => ['en'=>'In Marraqueta or french bread', 'es'=>''] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Quesadillas', 'es' => 'Quesadillas' ], 'detail' => ['en' => 'Cheese & Ham in wheat tortilla', 'es' =>'Queso solo o con jamón en tortilla de trigo'] ],
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
            /* Bar */
        $menuBar1 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 1,
            'title' => [
                'en' => 'SIGNATURE & HOUSE COCKTAILS – FUTURE CLASSICS',
                'es' => 'ESPECIALES COCKTALIS “DE LA CASA” & FUTUROS CLÁSICOS'
            ]
        ]); 
        $menuBarItems1 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Acero', 'es' => 'Acero' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Anthrax', 'es' => 'Anthrax' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Apple Pie(Cinnamon Whiskey,Vanilla Vodka,apple juice)', 'es' => 'Apple Pie(Cinnamon Whiskey,Vanilla Vodka,apple juice)' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'B-52', 'es' => 'B-52' ] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Beso Siciliano Sicilian Kiss (Bourbon, Amaretto)', 'es' => 'Beso Siciliano Sicilian Kiss (Bourbon, Amaretto)' ] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Cascada del Diablo Devil’s Waterfall ', 'es' => 'Cascada del Diablo Devil’s Waterfall' ] ],
            [ 'order' => 7, 'title' => [ 'en' => 'Cucaracha Cockroach', 'es' => 'Cucaracha Cockroach' ] ],
            [ 'order' => 8, 'title' => [ 'en' => '4x4 (Vodka & Red Bull)', 'es' => '4x4 (Vodka & Red Bull)' ] ],
            [ 'order' => 9, 'title' => [ 'en' => 'Chitochatarra II', 'es' => 'Chitochatarra II' ] ],
            [ 'order' => 10, 'title' => [ 'en' => 'Typical Bolivian Politician - Son of a Bitch’s corrupt dirty bussines', 'es' => 'Typical Bolivian Politician - Son of a Bitch’s corrupt dirty bussines' ] ],
            [ 'order' => 11, 'title' => [ 'en' => 'Curtiss (fernet & Red Bull)', 'es' => 'Curtiss (fernet & Red Bull)' ] ],
            [ 'order' => 12, 'title' => [ 'en' => 'Golden Cadillac', 'es' => 'Golden Cadillac' ] ],
            [ 'order' => 13, 'title' => [ 'en' => 'Green Bull 	(fernet menta Mint Fernet & Red Bull)', 'es' => 'Green Bull 	(fernet menta Mint Fernet & Red Bull)' ] ],
            [ 'order' => 14, 'title' => [ 'en' => 'Hot Buttered Rum', 'es' => 'Hot Buttered Rum' ] ],
            [ 'order' => 15, 'title' => [ 'en' => 'Jaeger Bull ', 'es' => 'Jaeger Bull' ] ],
            [ 'order' => 16, 'title' => [ 'en' => 'Jaeger Heaven & Hell (2 shots)', 'es' => 'Jaeger Heaven & Hell (2 shots)' ] ],
            [ 'order' => 17, 'title' => [ 'en' => 'Kangaroo Cake', 'es' => 'Kangaroo Cake' ], 'detail' => ['en' => '(Absolut, Frangelico & Limones caramelizados Caramelized Lemon Slices)', 'es' => '(Absolut, Frangelico & Limones caramelizados Caramelized Lemon Slices)'] ],
            [ 'order' => 18, 'title' => [ 'en' => 'Long Island Ice Tea', 'es' => 'Long Island Ice Tea' ] ],
            [ 'order' => 19, 'title' => [ 'en' => 'Margarita Descalza', 'es' => 'Margarita Descalza' ], 'detail' => ['en' => 'Margarita con Singani', 'es' => 'Margarita con Singani'] ],
            [ 'order' => 20, 'title' => [ 'en' => 'Petrodiesel ', 'es' => 'Petrodiesel ' ] ],
            [ 'order' => 21, 'title' => [ 'en' => 'Primera Dama First Lady', 'es' => 'Primera Dama First Lady' ], 'detail' => ['en'=> 'Licor de Cacao & Red Bull', 'es'=>'Licor de Cacao & Red Bull'] ],
            [ 'order' => 22, 'title' => [ 'en' => 'Quiroga Gullco Untranslatable', 'es' => 'Quiroga Gullco Untranslatable' ] ],
            [ 'order' => 23, 'title' => [ 'en' => 'Redneck', 'es' => 'Redneck' ], 'detail' => ['en'=> 'Whisky, Red Bull', 'es'=>'Whisky, Red Bull'] ],
            [ 'order' => 24, 'title' => [ 'en' => 'Red Rain', 'es' => 'Red Rain' ], 'detail' => ['en'=> 'Gin, Campari, Red Bull', 'es'=>'Gin, Campari, Red Bull'] ],
            [ 'order' => 25, 'title' => [ 'en' => 'Toro Salvaje “Raging Bull”', 'es' => 'Toro Salvaje “Raging Bull”' ], 'detail' => ['en'=> 'Gin & Red Bull', 'es'=>'Licor de Cacao & Red Bull'] ],
            [ 'order' => 26, 'title' => [ 'en' => '¡Viejo Verde!', 'es' => '¡Viejo Verde!' ], 'detail' => ['en'=> 'Ajenjo y manzana', 'es'=>'Ajenjo y manzana'] ],
            [ 'order' => 27, 'title' => [ 'en' => '¡...que lo Parió!', 'es' => '¡...que lo Parió!' ], 'detail' => ['en'=> 'Tequila & locoto (Forbidden Hot!)', 'es'=>'Tequila & locoto (Forbidden Hot!)'] ],
        ];
        $menuBar1->menu_items()->createMany($menuBarItems1);
        $menuBar2 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 2,
            'title' => [
                'en' => 'Others specials / Unclassifiable',
                'es' => 'Otros / Inclasificables'
            ]
        ]); 
        $menuBarItems2 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Toasted Almond', 'es' => 'Almendra Tostada' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Amaretto with Orange', 'es' => 'Amaretto con Naranja' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Amaretto Di Saronno con Naranja', 'es' => 'Amaretto Di Saronno con Naranja' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Amaretto Sour', 'es' => 'Amaretto Sour' ] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Aperol Spritz', 'es' => 'Aperol Spritz' ] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Caipirinha', 'es' => 'Caipirinha' ] ],
            [ 'order' => 7, 'title' => [ 'en' => 'Expresso Martini', 'es' => 'Expresso Martini', 'detail' => ['en' => 'Kalhúa,Vodka,Expresso', 'es' => 'Kalhúa,Vodka,Expresso'] ] ],
            [ 'order' => 8, 'title' => [ 'en' => 'Fernet con Cocacola', 'es' => 'Fernet con Cocacola' ] ],
            [ 'order' => 9, 'title' => [ 'en' => 'Mint Fernet with 7up', 'es' => 'Fernet Menta con 7Up' ] ],
            [ 'order' => 10, 'title' => [ 'en' => 'Gancia con Limón', 'es' => 'Gancia with Lemon Juice' ] ],
            [ 'order' => 11, 'title' => [ 'en' => 'Pisco Sour', 'es' => 'Pisco Sour' ] ],
        ];        
        $menuBar2->menu_items()->createMany($menuBarItems2);
        $menuBar3 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 3,
            'title' => [
                'en' => 'Vodka',
                'es' => 'Vodka'
            ]
        ]); 
        $menuBarItems3 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Absolut con Naranja  with Orange Juice', 'es' => 'Absolut con Naranja  with Orange Juice' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Absolut con Seven Up', 'es' => 'Absolut con Seven Up' ] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Golden Bullet', 'es' => 'Bala Dorada' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Bloody Mery', 'es' => 'Bloody Mery' ] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Blue Moon', 'es' => 'Blue Moon' ] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Crystalline', 'es' => 'Cristalino (Stolichnaya)' ] ],
            [ 'order' => 7, 'title' => [ 'en' => 'Caipiroska (Stolichnaya)', 'es' => 'Caipiroska (Stolichnaya)' ] ],
            [ 'order' => 8, 'title' => [ 'en' => 'White / Black Russian', 'es' => 'Ruso Blanco / Negro ' ] ],
            [ 'order' => 9, 'title' => [ 'en' => 'Sex on the Beach', 'es' => 'Sex on the Beach' ] ],
            [ 'order' => 10, 'title' => [ 'en' => 'San Mateo with Absolut Vodka', 'es' => 'San Mateo con Absolut' ] ],
            [ 'order' => 11, 'title' => [ 'en' => 'Screwdriver  (Stolichnaya)', 'es' => 'Screwdriver  (Stolichnaya)' ] ],
            [ 'order' => 12, 'title' => [ 'en' => 'Vodka Tonic (Stolichnaya)', 'es' => 'Vodka Tonic (Stolichnaya)' ] ],
            [ 'order' => 13, 'title' => [ 'en' => 'Vodkatini (Stolichnaya)', 'es' => 'Vodkatini (Stolichnaya)' ] ],
        ];        
        $menuBar3->menu_items()->createMany($menuBarItems3);
        $menuBar4 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 4,
            'title' => [
                'en' => 'Rum',
                'es' => 'Ron'
            ]
        ]); 
        $menuBarItems4 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Alexander', 'es' => 'Alexander' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Mojito Cubano', 'es' => 'Mojito Cubano' ] ],
            [ 'order' => 3, 'title' => [ 'en' => '“RG”', 'es' => '“RG”' ], 'detail' => ['en' => 'Rum & Ginger Ale', 'es' => 'Ron con Ginger Ale'] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Daiquiri', 'es' => 'Daiquiri' ] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Daiquiri de frutas)', 'es' => 'Daiquiri de frutas' ] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Piña Colada', 'es' => 'Piña Colada' ] ],
            [ 'order' => 7, 'title' => [ 'en' => 'Cubas', 'es' => 'Cubas' ] ],
            [ 'order' => 8, 'title' => [ 'en' => 'Cuba Libre', 'es' => 'Cuba Libre' ], 'detail' => ['en' => 'White Havana', 'es' => 'Havana Blanco'] ],
            [ 'order' => 9, 'title' => [ 'en' => 'Bacardi Limón', 'es' => 'Bacardi Limón' ], 'detail' => ['en' => 'with 7up', 'es' => 'con Seven Up'] ],
            [ 'order' => 10, 'title' => [ 'en' => 'Barceló Gran Añejo (Dominicano)', 'es' => 'Barceló Gran Añejo (Dominicano)' ] ],
            [ 'order' => 11, 'title' => [ 'en' => 'El Abuelo', 'es' => 'El Abuelo' ] ],
            [ 'order' => 12, 'title' => [ 'en' => 'Flor de Caña 7', 'es' => 'Flor de Caña 7' ] ],
            [ 'order' => 13, 'title' => [ 'en' => 'Flor de Caña 12 años', 'es' => 'Flor de Caña 12 años' ] ],
            [ 'order' => 14, 'title' => [ 'en' => 'Havana 7', 'es' => 'Havana 7' ] ],
            [ 'order' => 15, 'title' => [ 'en' => 'Medellín', 'es' => 'Medellín' ] ],
            [ 'order' => 13, 'title' => [ 'en' => 'Solera', 'es' => 'Solera' ] ],
        ];        
        $menuBar4->menu_items()->createMany($menuBarItems4);
        $menuBar5 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 5,
            'title' => [
                'en' => 'Gin',
                'es' => 'Ginebra'
            ]
        ]); 
        $menuBar6 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 6,
            'title' => [
                'en' => 'Singani',
                'es' => 'Singani'
            ]
        ]); 
        $menuBar7 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 7,
            'title' => [
                'en' => 'Wine',
                'es' => 'Vino'
            ]
        ]); 
        $menuBar8 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 8,
            'title' => [
                'en' => 'Whisky – Scotch',
                'es' => 'Whisky – Scotch'
            ]
        ]); 
        $menuBar9 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 9,
            'title' => [
                'en' => 'Tequila',
                'es' => 'Tequila'
            ]
        ]); 
        $menuBar10 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 10,
            'title' => [
                'en' => 'LICORES, APERITIVOS & DIGESTIVE',
                'es' => 'LIQUORS, APÉRITIVS & DIGESTIVOS'
            ]
        ]); 
        $menuBar11 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 11,
            'title' => [
                'en' => 'Table Wine (Bolivian wines)',
                'es' => 'Vinos de Mesa (Boliviano)'
            ]
        ]); 
        $menuBar12 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 12,
            'title' => [
                'en' => 'White Wine',
                'es' => 'Blancos'
            ]
        ]); 
        $menuBar13 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 13,
            'title' => [
                'en' => 'Red Wine',
                'es' => 'Tinto'
            ]
        ]); 
        $menuBar14 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 14,
            'title' => [
                'en' => 'Bolivian Beers',
                'es' => 'Cervezas Bolivianas'
            ]
        ]); 
        $menuBar15 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 15,
            'title' => [
                'en' => 'Imported Beers',
                'es' => 'Cervezas Importadas'
            ]
        ]); 
        $menuBar16 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 16,
            'title' => [
                'en' => 'SHOTS - Whisky',
                'es' => 'PUROS - Whisky'
            ]
        ]); 
        $menuBar17 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 17,
            'title' => [
                'en' => 'SHOTS - Bourbon',
                'es' => 'PUROS - Bourbon'
            ]
        ]); 
        $menuBar18 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 18,
            'title' => [
                'en' => 'SHOTS - Malt',
                'es' => 'PUROS - Malta'
            ]
        ]); 
        $menuBar19 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 19,
            'title' => [
                'en' => 'SHOTS - Cognac',
                'es' => 'PUROS - Coñac'
            ]
        ]); 
        $menuBar20 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 20,
            'title' => [
                'en' => 'SHOTS - Rum',
                'es' => 'PUROS - Ron'
            ]
        ]); 
        $menuBar21 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 21,
            'title' => [
                'en' => 'SHOTS - Gin',
                'es' => 'PUROS - Ginebra'
            ]
        ]); 
        $menuBar22 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 22,
            'title' => [
                'en' => 'Vodka (Just vodka)',
                'es' => 'Vodka (Puro / Solo)'
            ]
        ]); 
        $menuBar23 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 23,
            'title' => [
                'en' => 'Singani (Just pisco)',
                'es' => 'Singani (Puro / Solo)'
            ]
        ]); 
        $menuBar24 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 24,
            'title' => [
                'en' => 'Additional Soda',
                'es' => 'Gaseosa Adicional'
            ]
        ]); 
        $menuBar25 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 25,
            'title' => [
                'en' => 'Tea',
                'es' => 'Te'
            ]
        ]); 
        $menuBar26 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 26,
            'title' => [
                'en' => 'Coffee with Liquor',
                'es' => 'Café Con Licor'
            ]
        ]); 
        $menuBar27 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 27,
            'title' => [
                'en' => 'NON-ALCOHOLIC BEVERAGES',
                'es' => 'BEBIDAS SIN ALCOHOL'
            ]
        ]); 
        $menuBar28 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 28,
            'title' => [
                'en' => 'NATURAL JUICES',
                'es' => 'JUGOS, ZUMOS NATURALES'
            ]
        ]); 
        $menuBar29 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 29,
            'title' => [
                'en' => 'Bottled',
                'es' => 'Envasados'
            ]
        ]); 
        $menuBar30 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 30,
            'title' => [
                'en' => 'COFFEE & TEA',
                'es' => 'CAFÉ, TÉ Y MATES'
            ]
        ]); 
        $menuBar31 = \App\Models\Menu::create([
            'categoryId' => $category3->id,
            'order' => 31,
            'title' => [
                'en' => 'SODAS',
                'es' => 'GASEOSAS'
            ]
        ]); 

            /* Barra diesel classic */
        $menuBarraDiesel1 = \App\Models\Menu::create([
            'categoryId' => $category2->id,
            'order' => 1,
            'title' => [
                'en' => 'Beef or Steak',
                'es' => 'Carne de Res'
            ]
        ]); 
        $menuBarraDieselItems1 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Bife de Chorizo', 'es' => 'Bife de Chorizo' ], 'detail' => ['en'=> '3/4 pound of argentinean imported meat', 'es' =>'350 grs carne Argentina'] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Bife de Chorizo nacional', 'es' => 'Bife de Chorizo nacional' ], 'detail' => ['en' => '250 grs', 'es' => '250 grs'] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Punta de “S”', 'es' => 'Punta de “S”' ] ],
            [ 'order' => 4, 'title' => [ 'en' => 'BBQ Flank Steak', 'es' => 'Matambre a la Parrilla' ], 'detail' => ['en' => 'With French Fries', 'es'=> 'Con Papa Frita'] ],
            [ 'order' => 5, 'title' => [ 'en' => 'Napolitan style Flank Steak', 'es' => 'Matambre a la Pizza' ], 'detail' => ['en' => 'With French Fries', 'es'=> 'Con Papa Frita'] ],
            [ 'order' => 6, 'title' => [ 'en' => 'Costilla de Res a la Leña', 'es' => 'Costilla de Res a la Leña' ] ],
            [ 'order' => 7, 'title' => [ 'en' => 'Giba', 'es' => 'Giba' ] ],
            [ 'order' => 8, 'title' => [ 'en' => 'Skewer', 'es' => 'Pacumuto' ], 'detail' => ['en' => 'Meat and Sausage with French Fries', 'es' => 'Res y chorizo con papa frita'] ]
        ];        
        $menuBarraDiesel1->menu_items()->createMany($menuBarraDieselItems1);

        $menuBarraDiesel2 = \App\Models\Menu::create([
            'categoryId' => $category2->id,
            'order' => 2,
            'title' => [
                'en' => 'Pork',
                'es' => 'Cerdo'
            ]
        ]); 
        $menuBarraDieselItems2 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Chancho a la Leña', 'es' => 'Chancho a la Leña' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Costillitas a la BBQ', 'es' => 'Costillitas a la BBQ' ] ],
        ];        
        $menuBarraDiesel2->menu_items()->createMany($menuBarraDieselItems2);

        $menuBarraDiesel3 = \App\Models\Menu::create([
            'categoryId' => $category2->id,
            'order' => 3,
            'title' => [
                'en' => 'Chicken',
                'es' => 'Pollo'
            ]
        ]); 
        $menuBarraDieselItems3 = [
            [ 'order' => 1, 'title' => [ 'en' => '1/2 Pollo deshuesado al Limón', 'es' => '1/2 Pollo deshuesado al Limón' ] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Grilled Chicken with salad', 'es' => 'Pollo a la parrilla con Ensalada' ] ],
        ];        
        $menuBarraDiesel3->menu_items()->createMany($menuBarraDieselItems3);
        $menuBarraDiesel4 = \App\Models\Menu::create([
            'categoryId' => $category2->id,
            'order' => 4,
            'title' => [
                'en' => 'Fish',
                'es' => 'Pescado'
            ]
        ]); 
        $menuBarraDieselItems4 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Trucha a la parrilla con arroz blanco', 'es' => 'Trucha a la parrilla con arroz blanco' ] ],
        ];        
        $menuBarraDiesel4->menu_items()->createMany($menuBarraDieselItems4);
        $menuBarraDiesel5 = \App\Models\Menu::create([
            'categoryId' => $category2->id,
            'order' => 5,
            'title' => [
                'en' => 'PLATTERS',
                'es' => 'TABLAS'
            ]
        ]); 
        $menuBarraDieselItems5 = [
            [ 'order' => 1, 'title' => [ 'en' => 'Argentinian style Barbecue platter', 'es' => 'Tabla Parrillera' ], 'detail' => ['en'=>'for 2 (Punta de S, Pollo, Chorizo, Morcilla, Queso)', 'es' => '2 Personas (Punta de S, Pollo, Chorizo, Morcilla, Queso)'] ],
            [ 'order' => 2, 'title' => [ 'en' => 'Argentinian style Barbecue platter', 'es' => 'Tabla Parrillera' ], 'detail' => ['en'=>'for 4 (Punta de S, Pollo, Chorizo, Morcilla, Queso)', 'es' => '4 Personas (Punta de S, Pollo, Chorizo, Morcilla, Queso)'] ],
            [ 'order' => 3, 'title' => [ 'en' => 'Tapa de Cuadril', 'es' => 'Tapa de Cuadril' ], 'detail' => ['en'=>'Punta de S for 2', 'es' => 'Punta de S para 2'] ],
            [ 'order' => 4, 'title' => [ 'en' => 'Lomo en pieza', 'es' => 'Lomo en pieza' ], 'detail' => ['en'=>'para 3 o 4', 'es' => 'para 3 o 4'] ],
            
        ];        
        $menuBarraDiesel5->menu_items()->createMany($menuBarraDieselItems5);
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
            'icon' => 'fal fa-fish',
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
            'icon' => 'fal fa-fish',
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
            'icon' => 'fal fa-fish',
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
            'showBanner' => 1,
            'image' => \Asset::upload_image(asset('assets/img/content/events/10.jpg'), 'event-image'),
        ]); 
    }

    public static function loadReviews() {
        \App\Models\Parameter::create([
            'code' => 'phone',
            'key' => [
                'es' => 'Teléfono',
                'en' => 'Phone',
            ],
            'value' => [
                'es' => '59169002412',
                'en' => '59169002412'
            ]
        ]); 
        \App\Models\Parameter::create([
            'code' => 'email',
            'key' => [
                'es' => 'Correo electrónico',
                'en' => 'Email',
            ],
            'value' => [
                'es' => 'inbox@dieselnacional.com',
                'en' => 'inbox@dieselnacional.com'
            ]
        ]); 
        \App\Models\Parameter::create([
            'code' => 'address',
            'key' => [
                'es' => 'Ubícanos en',
                'en' => 'Locate us',
            ],
            'value' => [
                'es' => '20 de Octubre Ave # 2271, La Paz, Bolivia',
                'en' => '20 de Octubre Ave # 2271, La Paz, Bolivia'
            ]
        ]);
        \App\Models\Parameter::create([
            'code' => 'description',
            'key' => [
                'es' => 'Breve descripción Footer',
                'en' => 'Footer Brief description',
            ],
            'value' => [
                'es' => 'Con más de 20 años de existencia, Diesel Nacional es un clásico indiscutible de la vida nocturna de La Paz, “Una de las 7 Ciudades Maravilla del Mundo”.',
                'en' => 'With more than 20 years of existence, Diesel Nacional is indisputably a Classic Pub-Restaurant of the nightlife of the City of La Paz, "One of the 7 Wonder Cities of the World".'
            ]
        ]);
        \App\Models\Parameter::create([
            'code' => 'gallery-title',
            'key' => [
                'es' => 'Título de la galería',
                'en' => 'Gallery title',
            ],
            'value' => [
                'es' => 'Nuestra galería',
                'en' => 'Our Gallery',
            ]
        ]);
        \App\Models\Parameter::create([
            'code' => 'gallery-subtitle',
            'key' => [
                'es' => 'Subtítulo de la galería',
                'en' => 'Gallery subtitle',
            ],
            'value' => [
                'es' => 'Disfrute con placer de su estancia en nuestro restaurante.',
                'en' => 'Enjoy your time in our restaurant with pleasure.',
            ]
        ]);
        \App\Models\Parameter::create([
            'code' => 'schedule-text',
            'key' => [
                'es' => 'Texto del banner de horario',
                'en' => 'Schedule text of banner',
            ],
            'value' => [
                'es' => 'En Diesel Nacional, la mente maestra adopta un enfoque ecléctico. Es, sin duda, una experiencia gastronómica emocionante, interesante y divertida, con puertas hechas de camiones, montones de arte chatarra y una iluminación digna de una mina. Diesel Nacional es un excelente lugar para pasar gratos momentos con amigos y disfrutar de tapas y bebidas… La comida se sirve hasta tarde, al igual que los cócteles y bebidas, y el personal es servicial y amable.',
                'en' => 'In Diesel Nacional, the mastermind takes an eclectic approach. It is undoubtedly an exciting dining experience – interesting and fun – with doors made of trucks, piles of junk art, and lighting fit for a mine. Diesel Nacional is an excellent place to hang out with friends, enjoy tapas and drinks, and marvel at the beauty of rusting truck fenders. Food is served till late, and cocktails are stocked until late. The staff is helpful and friendly.',
            ]
        ]);
        \App\Models\Parameter::create([
            'code' => 'schedule-text-secondary',
            'key' => [
                'es' => 'Texto secundario del banner de horario',
                'en' => 'Schedule text secondary of banner',
            ],
            'value' => [
                'es' => 'nightflow.com 2025  - La Paz Nightlife  - A Complete Guide 2025',
                'en' => 'nightflow.com 2025  - La Paz Nightlife  - A Complete Guide 2025',
            ]
        ]);
        \App\Models\SocialNetwork::create([
            'name'   => 'Facebook',
            'icon'   => 'fab fa-facebook-f',
            'url'    => 'https://www.facebook.com/people/Diesel-Nacional/61573756449486/',
            'active' => 1,
        ]);
        \App\Models\SocialNetwork::create([
            'name' => 'Instagram',
            'icon' => 'fab fa-instagram',
            'url'  => 'https://www.instagram.com/dieselnacional.pub/',
            'active' => 1,
        ]);
        \App\Models\SocialNetwork::create([
            'name' => 'Twitter',
            'icon' => 'fab fa-twitter',
            'url'  => 'https://x.com',
            'active' => 0,
        ]);
    }
}