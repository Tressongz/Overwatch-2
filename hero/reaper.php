<?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Жнец',
                                'hero_img' => 'reaper.PNG',
                                'hero_real_name' => 'неизвестно',
                                'hero_age' => 'неизвестнен',
                                'hero_work' => 'наемник',
                                'hero_country' => 'неизвестна',
                                'hero_group' => 'неизвестна',
                                'hero_img_role' => 'offense.jpg',
                                'hero_role' => 'Штурм',
                                'hero_description' => 'Адские дробовики, неуязвимость в форме призрака и умение шагать сквозь тень — все это делает Жнеца одним из самых смертоносных существ на планете.',
                                'name_page' => 'reaper'
                            );
    $tml->health = array(
                    'health' => 250,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 0;

    $tml->skills = array(
                            array(  'skill_img' => 'hellfire_shotguns.png',
                                    'hero_skill' => 'Адские дробовики',
                                    'skill_description' => 'Дробовики Жнеца способны за секунды изрешетить противника.',
                                    'video_url' => 'https://www.youtube.com/embed/TsUafsDP02c',
                                    'skill_advice' => 'Старайте истреблять врагов в упор, так урон будет максимален. Так же истребляйте более уязвимые цели, более слабые.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>280</td>
                                                <td>140</td>
                                                <td>8</td>
                                                <td>2 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'wraith_form.jpg',
                                    'hero_skill' => 'Бестелесность',
                                    'skill_description' => 'Жнец на короткое время превращается в тень. В таком состоянии он неуязвим и способен проходить сквозь противников, но при этом не может использовать оружие или способности.',
                                    'video_url' => 'https://www.youtube.com/embed/7g_du9WOPfY',
                                    'skill_advice' => 'Используйте данную способность, чтобы покинуть поле битвы или же пробраться через стену огня противника. Очень эффективна против многих суперспособностей, например "Удара дракона", "Турбосвинства" и других.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>3 сек.</td>
                                                <td>8 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'shadow_step.png',
                                    'hero_skill' => 'Шаг сквозь тень',
                                    'skill_description' => 'Выбрав определенную область, Жнец переносится туда из текущего местоположения.',
                                    'video_url' => 'https://www.youtube.com/embed/TWvgiaY2NE8',
                                    'skill_advice' => 'Вы застанете в расплох своих противников, если вы окажитесь мгновенно за их спинами. И будет очень не плохо, если у вас на готове окажется суперспособность - Цветок смерти.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>35 метров</td>
                                                <td>2 сек.</td>
                                                <td>10 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'death_blossom.png',
                                    'hero_skill' => 'Цветок смерти',
                                    'skill_description' => 'Жнец с головокружительной быстротой опустошает боезапас адских дробовиков, нанося ближайшим противникам значительный урон.',
                                    'video_url' => 'https://www.youtube.com/embed/_lYcSCb29lM',
                                    'skill_advice' => 'Очень эффективна при большом скоплении противников и когда они отвлечены. Для лучшего исполнения необходимо воспользоваться сначала "Шаг сквозь тень" для перемещения за спины врагов.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>510</td>
                                                <td>8 метров</td>
                                                <td>3 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'passive.jpg',
                                    'hero_skill' => 'Жатва',
                                    'skill_description' => 'Восполняет здоровье, собирая сферы душ.',
                                    'video_url' => 'https://www.youtube.com/embed/Ut5q6JzT-gk',
                                    'skill_advice' => 'Удобно восстанавливать здоровье при взаимодействии с "Цветок смерти". Убиваете и восставливаете здоровье.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
