
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Торбьорн',
                                'hero_img' => 'torborn.PNG',
                                'hero_real_name' => 'Торбьорн Линдхольм',
                                'hero_age' => '57 лет',
                                'hero_work' => 'конструктор оружия',
                                'hero_country' => 'Гиза (Египет)',
                                'hero_group' => 'Гетеборг (Швеция)',
                                'hero_img_role' => 'defense.jpg',
                                'hero_role' => 'Защита',
                                'hero_description' => 'Обширный арсенал Торбьорна включает в себя гвоздестрел, кузнечный молот и персональную наковальню, на которой он кует и совершенствует турели, а также изготавливает комплекты брони для союзников.',
                                'name_page' => 'torbjorn'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 1;

    $tml->skills = array(
                            array(  'skill_img' => 'rivet_gun.jpg',
                                    'hero_skill' => 'Гвоздестрел',
                                    'skill_description' => 'Торбьорн стреляет гвоздями с большого расстояния либо выпускает струю раскаленного металла из своего оружия на близком расстоянии.',
                                    'video_url' => 'https://www.youtube.com/embed/zEVVjm9Omo8',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>140-300</td>
                                                <td>70-150</td>
                                                <td>18</td>
                                                <td>1-3 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'forge_hammer.jpg',
                                    'hero_skill' => 'Кузнечный молот',
                                    'skill_description' => 'Торбьорн использует свой универсальный молот, чтобы сооружать, улучшать и чинить турели. В определенных ситуациях его можно использовать и в качестве оружия.',
                                    'video_url' => 'https://www.youtube.com/embed/DthiwBN_img',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                            </tr>
                                            <tr>
                                                <td>75</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'build_turret.png',
                                    'hero_skill' => 'Турель',
                                    'skill_description' => 'Торбьорн сооружает самонаводящуюся автоматическую пушку. Используя кузнечный молот, он может совершенствовать и чинить ее: повышать прочность, устанавливать лишний ствол, превращать ее в ракетомет.',
                                    'video_url' => 'https://www.youtube.com/embed/gKTLNchySZ4',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>14</td>
                                                <td>40 метров</td>
                                                <td>2-4 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'armor_pack.jpg',
                                    'hero_skill' => 'Комплект брони',
                                    'skill_description' => 'Торбьорн создает улучшение для брони, которое может использовать он сам либо другие союзники, чтобы поглотить некоторое количество урона.',
                                    'video_url' => 'https://www.youtube.com/embed/it6Rkce44G4',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Броня</td>
                                                <td>Расход металла</td>
                                            </tr>
                                            <tr>
                                                <td>75</td>
                                                <td>50</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'molten_core.jpg',
                                    'hero_skill' => 'Перегрев',
                                    'skill_description' => 'При перегреве переносного горна Торбьорн приобретает значительный бонус к броне и количеству собираемого лома. При этом существенно повышается его скорость атаки, а также сооружения и ремонта турелей.',
                                    'video_url' => 'https://www.youtube.com/embed/6RXPbs7Gm3c',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Доп. здоровье</td>
                                                <td>Доп. здоровье турели</td>
                                                <td>Скорость</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>300</td>
                                                <td>500</td>
                                                <td>+125%</td>
                                                <td>12 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
