
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Фарра',
                                'hero_img' => 'farra.PNG',
                                'hero_real_name' => 'Фария Амари',
                                'hero_age' => '32 года',
                                'hero_work' => 'начальник службы безопасности',
                                'hero_country' => 'Гиза (Египет)',
                                'hero_group' => 'Helix Security International',
                                'hero_img_role' => 'offense.jpg',
                                'hero_role' => 'Штурм',
                                'hero_description' => 'Боевой костюм Фарры оборудован реактивными двигателями, которые позволяют ей парить в воздухе. А мощный ракетомет делает из нее очень грозного противника.',
                                'name_page' => 'pharah'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 0;

    $tml->skills = array(
                            array(  'skill_img' => 'rocket_launcher.png',
                                    'hero_skill' => 'Ракетомет "Сокол"',
                                    'skill_description' => 'Основное оружие Фарры, которое выпускает ракеты, наносящие значительный урон по большой области.',
                                    'video_url' => 'https://www.youtube.com/embed/Jv3f768JfOg',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>120</td>
                                                <td>80</td>
                                                <td>6</td>
                                                <td>1 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'jump_jet.jpg',
                                    'hero_skill' => 'Реактивный ранец',
                                    'skill_description' => 'Благодаря реактивным двигателям, закрепленным на костюме, Фарра способна взлетать высоко в небо.',
                                    'video_url' => 'https://www.youtube.com/embed/IpEOm4cwMR0',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>10 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'concussive_blast.png',
                                    'hero_skill' => 'Взрывная волна',
                                    'skill_description' => 'Фарра выпускает из наручного механизма ракету, которая отбрасывает пораженных противников.',
                                    'video_url' => 'https://www.youtube.com/embed/8Ye2ecWYzZ8',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Радиус</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>8 метров</td>
                                                <td>12 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'barrage.png',
                                    'hero_skill' => 'Ракетный залп',
                                    'skill_description' => 'Фарра выпускает заряд мини-ракет, способный уничтожить группы противников.',
                                    'video_url' => 'https://www.youtube.com/embed/Cg5nVDwCNxA',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Длительность</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                                <td>3 сек.</td>
                                                <td>30 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'passive.png',
                                    'hero_skill' => 'Парение',
                                    'skill_description' => 'Фарра парит в воздухе (поддерживает высоту), пока есть топливо.',
                                    'video_url' => 'https://www.youtube.com/embed/DznUIrIX76M',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>3 сек.</td>
                                                <td>4 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
