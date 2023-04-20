
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Солдат-76',
                                'hero_img' => 'soldier-76.PNG',
                                'hero_real_name' => 'неизвестно',
                                'hero_age' => 'неизвестен',
                                'hero_work' => 'мститель',
                                'hero_country' => 'неизвестна',
                                'hero_group' => 'в прошлом — Overwatch',
                                'hero_img_role' => 'offense.jpg',
                                'hero_role' => 'Штурм',
                                'hero_description' => 'Штурм
                        <br>Описание: Солдат-76 вооружен по последнему слову техники. В сражении он полагается на импульсную винтовку со встроенным отделением для ракет, а также на многолетнюю сноровку и боевой опыт.',
                                'name_page' => 'soldier-76'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 2;

    $tml->skills = array(
                            array(  'skill_img' => 'heavy_pulse_rifle.png',
                                    'hero_skill' => 'Импульсная винтовка',
                                    'skill_description' => 'Надежное оружие, сохраняющее точность даже при стрельбе в автоматическом режиме.',
                                    'video_url' => 'https://www.youtube.com/embed/zGqTcpQQD9M',
                                    'skill_advice' => 'Выбирайте среднюю дистанцию, где можно вести прицельный огонь. Винтовка Солдата-76 отлично подходит под бой на средней дистации из под прикрытий, к примеру.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>34</td>
                                                <td>17</td>
                                                <td>25</td>
                                                <td>10 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'helix_rockets.png',
                                    'hero_skill' => 'Ракетный удар',
                                    'skill_description' => 'Залп из нескольких ракет, летящих по спирали. Взрыв ракет наносит урон всем противникам в небольшой области.',
                                    'video_url' => 'https://www.youtube.com/embed/Els-u_NmzLA',
                                    'skill_advice' => 'Хорошая способность против многих целей или строений. Например, против турелей или большого скопления противников. Также удобно добивать врагов и просто прилично ранить противника.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>120</td>
                                                <td>2 метра</td>
                                                <td>8 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'sprint.jpg',
                                    'hero_skill' => 'Спринт',
                                    'skill_description' => 'Солдат-76 может резко ускорить бег, когда нужно срочно выйти из боя или вернуться в бой. Действие способности заканчивается, если Солдат-76 делает любое движение, кроме движения вперед.',
                                    'video_url' => 'https://www.youtube.com/embed/aanlNrQqFt0',
                                    'skill_advice' => 'Удобно, чтобы быстро перемещаться до точке или же до противников. Большинство врагов не сможет вас догнать.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>8.33 м/с</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'biotic_field.png',
                                    'hero_skill' => 'Биотическое поле',
                                    'skill_description' => 'Солдат-76 размещает на земле излучатель, восстанавливающий здоровье ему самому и всем его союзникам в области действия.',
                                    'video_url' => 'https://www.youtube.com/embed/WgwRVHw4JxE',
                                    'skill_advice' => 'Полезная способность за счет исцеления не только себя, но и союзников. Особенно эффективно, если держаться на средней дистанции под укрытием и исцелением.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>40 хп/сек</td>
                                                <td>5 метров</td>
                                                <td>5 сек.</td>
                                                <td>15 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'tactical_visor.png',
                                    'hero_skill' => 'Тактический визор',
                                    'skill_description' => 'Высокоточный модуль наведения Солдата-76 захватывает ближайшую к перекрестию прицела цель. Если она покидает зону видимости, Солдат-76 может быстро переключиться на новую цель.',
                                    'video_url' => 'https://www.youtube.com/embed/M83RdEitTs8',
                                    'skill_advice' => 'Используйте способность, когда необходимо убить много подвижных и уязвимых целей. Пример может служить трейсер или лусио. Тактический визор не действует на "Ракетный залп".',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>6 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
