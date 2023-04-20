
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Мэй',
                                'hero_img' => 'mehj.PNG',
                                'hero_real_name' => 'Мэй Лин Чжоу',
                                'hero_age' => '31 год',
                                'hero_work' => 'климатолог, искательница приключений',
                                'hero_country' => 'Сиань, Китай (ранее)',
                                'hero_group' => 'в прошлом — Overwatch',
                                'hero_img_role' => 'defense.jpg',
                                'hero_role' => 'Защита',
                                'hero_description' => 'При помощи метеорологических устройств Мэй замедляет противников и обеспечивает союзникам надежный тыл. Эндотермический бластер Мэй выпускает короткий луч холода или стреляет ледяными снарядами. Мэй может защищаться от урона, погружаясь в криостазис, или же блокировать перемещения противника при помощи ледяной стены.',
                                'name_page' => 'mei'
                            );
    $tml->health = array(
                    'health' => 250,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 2;

    $tml->skills = array(
                            array(  'skill_img' => 'endothermic_blaster.png',
                                    'hero_skill' => 'Эндотермический бластер',
                                    'skill_description' => 'Бластер Мэй выпускает концентрированный короткий луч холода, который наносит урон, замедляет и в конечном счете замораживает противников. Также Мэй может стрелять ледяными снарядами, имеющими среднюю дальность поражения.',
                                    'video_url' => 'https://www.youtube.com/embed/i98SydjJCmA',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Луч</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>150</td>
                                                <td>75</td>
                                                <td>2</td>
                                                <td>200</td>
                                                <td>1.8-20 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'cryo_freeze.jpg',
                                    'hero_skill' => 'Криотазис',
                                    'skill_description' => 'Мэй мгновенно создает вокруг себя барьер из толстого льда. Находясь под его защитой, она восстанавливает здоровье и не получает урона от атак противника, однако при этом теряет возможность передвигаться.',
                                    'video_url' => 'https://www.youtube.com/embed/FiRFzWB6Gns',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>37,5 хп/сек</td>
                                                <td>4 сек.</td>
                                                <td>12 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'ice_wall.png',
                                    'hero_skill' => 'Ледяная стена',
                                    'skill_description' => 'Мэй создает огромную стену из льда, которая преграждает путь, закрывает обзор и блокирует атаки.',
                                    'video_url' => 'https://www.youtube.com/embed/Itw9oPDuIOc',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>4.5 сек.</td>
                                                <td>10 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'blizzard.jpg',
                                    'hero_skill' => 'Вьюга',
                                    'skill_description' => 'Мэй использует метеорологический дрон, вызывающий сильный ветер и снегопад в большой области действия. Вьюга замедляет и наносит урон противникам. Обездвиживает тех, кто остается в области действия слишком долго.',
                                    'video_url' => 'https://www.youtube.com/embed/_B-M6pMYNbc',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>100</td>
                                                <td>5 метров</td>
                                                <td>5 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
