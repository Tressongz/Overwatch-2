
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Трейсер',
                                'hero_img' => 'tracer.PNG',
                                'hero_real_name' => 'Лена Окстон',
                                'hero_age' => '26 лет',
                                'hero_work' => 'искательница приключений',
                                'hero_country' => 'Лондон (Англия)',
                                'hero_group' => 'в прошлом — Overwatch',
                                'hero_img_role' => 'offense.jpg',
                                'hero_role' => 'Штурм',
                                'hero_description' => 'Трейсер вооружена двумя скорострельными пистолетами, импульсными бомбами и искрометным чувством юмора. Но важнее всего ее умение стремительно перемещаться в пространстве и даже возвращаться назад во времени, внося сумятицу в ряды противника.',
                                'name_page' => 'tracer'
                            );
    $tml->health = array(
                    'health' => 150,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 1;

    $tml->skills = array(
                            array(  'skill_img' => 'pulse_pistols.jpg',
                                    'hero_skill' => 'Импульсные пистолеты',
                                    'skill_description' => 'Трейсер стреляет из обоих скорострельных пистолетов.',
                                    'video_url' => 'https://www.youtube.com/embed/GsHC7m7JHhU',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>6</td>
                                                <td>40</td>
                                                <td>20 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'blink.png',
                                    'hero_skill' => 'Скачок',
                                    'skill_description' => 'Трейсер мгновенно перемещается в пространстве в горизонтальной плоскости по направлению движения и появляется в нескольких метрах от первоначальной точки. Одновременно она может накапливать до трех зарядов способности. Новый заряд накапливается каждые несколько секунд.',
                                    'video_url' => 'https://www.youtube.com/embed/pZ32_ifFPGE',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Расстояние</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>7 метров</td>
                                                <td>3 сек.</td>
                                            </tr>'
                                 ),

                            array(  'skill_img' => 'recall.png',
                                    'hero_skill' => 'Возврат',
                                    'skill_description' => 'Трейсер перемещается назад во времени, перемещаясь в точку на карте, где она находилась несколько секунд назад, и возвращая свое состояние здоровья и боезапас на тот момент.',
                                    'video_url' => 'https://www.youtube.com/embed/6pqUecN8Itc',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>1.25 сек</td>
                                                <td>12 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'pulse_bomb.jpg',
                                    'hero_skill' => 'Импульсная бомба',
                                    'skill_description' => 'Трейсер бросает большую бомбу, которая прикрепляется к любой поверхности или противнику при попадании. Через мгновение бомба взрывается, нанося значительный урон всем противникам в области поражения.',
                                    'video_url' => 'https://www.youtube.com/embed/ZuJSKoZtWWQ',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон (max)</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>400</td>
                                                <td>3 метра</td>
                                                <td>2 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
