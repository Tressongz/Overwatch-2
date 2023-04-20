
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Дзенъятта',
                                'hero_img' => 'dzenyatta.PNG',
                                'hero_real_name' => 'Текхарта Дзенъятта',
                                'hero_age' => '20 лет',
                                'hero_work' => 'странствующий гуру, искатель приключений',
                                'hero_country' => 'в прошлом — монастырь Шамбала (Непал)',
                                'hero_group' => 'в прошлом — Шамбала',
                                'hero_img_role' => 'support.jpg',
                                'hero_role' => 'Поддержка',
                                'hero_description' => 'Дзенъятта исцеляет союзников сферами гармонии и ослабляет противников сферами разрушения, пытаясь достичь состояния трансцендентности, которое делает его неуязвимым.',
                                'name_page' => 'zenyatta'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 2;

    $tml->skills = array(
                            array(  'skill_img' => 'orb_of_destruction.jpg',
                                    'hero_skill' => 'Сфера разрушения',
                                    'skill_description' => 'Дзенъятта направляет в цель сферы разрушительной энергии. Он может использовать сферы поочередно либо все вместе, затратив некоторое время на подготовку способности.',
                                    'video_url' => 'https://www.youtube.com/embed/fvm4vIFxeAM',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>80-400</td>
                                                <td>40-200</td>
                                                <td>20</td>
                                                <td>1-5 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'orb_of_harmony.jpg',
                                    'hero_skill' => 'Сфера гармонии',
                                    'skill_description' => 'Дзенъятта направляет одну из сфер за спину союзника. Пока Дзенъятта остается в живых, сфера постепенно восстанавливает здоровье этого союзника. Одновременно может использоваться только одна такая сфера.',
                                    'video_url' => 'https://www.youtube.com/embed/1gi7hgy5R8o',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                            </tr>
                                            <tr>
                                                <td>30 хп/с</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'orb_of_discord.jpg',
                                    'hero_skill' => 'Сфера диссонанса',
                                    'skill_description' => 'Пока Дзенъятта остается в живых, противник, на котором зафиксирована сфера диссонанса, получает увеличенный урон. Одновременно может использоваться только одна такая сфера.',
                                    'video_url' => 'https://www.youtube.com/embed/jas8garZrsk',
                                    'skill_advice' => '',
                                    'skill_info' => 'Действует пока цель или сам Дзенъятта жив, или пока цель в зоне видимости.'
                                 ),
                            array(  'skill_img' => 'transcendence.jpg',
                                    'hero_skill' => 'Трансцендентность',
                                    'skill_description' => 'Дзенъятта на некоторое время входит в состояние высшего бытия. Находясь в этом состоянии, он не может использовать способности или оружие, но при этом не получает урона и автоматически восстанавливает здоровье себе и ближайшим союзникам.',
                                    'video_url' => 'https://www.youtube.com/embed/Yco_U5FXKVo',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>300 хп/с</td>
                                                <td>10 метров</td>
                                                <td>6 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
