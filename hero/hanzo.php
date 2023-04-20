
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Хандзо',
                                'hero_img' => 'hanzo.PNG',
                                'hero_real_name' => 'Хандзо Шимада',
                                'hero_age' => '38 лет',
                                'hero_work' => 'наемник, убийца',
                                'hero_country' => 'Ханамура (Япония)',
                                'hero_group' => 'клан Шимада',
                                'hero_img_role' => 'defense.jpg',
                                'hero_role' => 'Защита',
                                'hero_description' => 'Стрелы Хандзо многофункциональны и позволяют ему следить за перемещения противника и поражать несколько целей одновременно. Хандзо может карабкаться по стенам и призывать гигантского призрачного дракона, пожирающего все на своем пути.',
                                'name_page' => 'hanzo'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 2;

    $tml->skills = array(
                            array(  'skill_img' => 'storm_bow.jpg',
                                    'hero_skill' => 'Лук бури',
                                    'skill_description' => 'Хандзо натягивает тетиву и выпускает стрелу в цель.',
                                    'video_url' => 'https://www.youtube.com/embed/yJ5XYoD_g4s',
                                    'skill_advice' => 'Натягивайте лук как можно сильнее, чтобы нанести максимальный урон. Можете почти не натягивать его, когда необходимо добить противника.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество снарядов</td>
                                            </tr>
                                            <tr>
                                                <td>58-250</td>
                                                <td>29-125</td>
                                                <td>∞</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'sonic_arrow.png',
                                    'hero_skill' => 'Звуковая стрела',
                                    'skill_description' => 'Хандзо выпускает стрелу, в которую встроен сонар, способный обнаружить любого противника в радиусе действия. На обнаруженных противников накладывается метка, позволяющая Хандзо и его союзникам отслеживать их.',
                                    'video_url' => 'https://www.youtube.com/embed/RcJLT72tUZA',
                                    'skill_advice' => 'Очень полезно, чтобы следить за приближением противника и их количеством и по ситуации можно дать суперспособность или подготовить что-нибудь для них с союзниками. Так же можете стрелять в голову или тело противника, эффект звуковой стрелы сохраниться.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>58-250</td>
                                                <td>29-125</td>
                                                <td>10с.</td>
                                                <td>20с.</td>
                                            </tr>'
                                 ),

                            array(  'skill_img' => 'scatter_arrow.jpg',
                                    'hero_skill' => 'Кластерная стрела',
                                    'skill_description' => 'Хандзо выпускает стрелу, разделяющуюся на несколько частей, которые рикошетят от стен или иных объектов, поражая несколько целей одновременно.',
                                    'video_url' => 'https://www.youtube.com/embed/wQv2Vx96ghQ',
                                    'skill_advice' => 'Если противник вблизи вас, то можете выстрелить ему под ноги и тем самым убить его. Или же использовать это в помещениях. Так же можете стрелять в голову или тело противника, эффект кластерной стрелы сохраниться.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>58-250(урон от стрелы) + 75(дополнительный урон от модификации)</td>
                                                <td>29-125(урон от стрелы) + 75(дополнительный урон от модификации)</td>
                                                <td>10с.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'dragonstrike.jpg',
                                    'hero_skill' => 'Удар дракона',
                                    'skill_description' => 'Хандзо призывает призрачного дракона, который летит по прямой. Дракон проходит сквозь стены, пожирая оказавшихся на пути противников.',
                                    'video_url' => 'https://www.youtube.com/embed/mYa_Th96Alg',
                                    'skill_advice' => 'Используйте при большом скоплении людей(необязательно), так же старайтесь, чтобы дракон вылетал внезапно, через модели домов, тогда враг не успеет отреагировать.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Дальность</td>
                                                <td>Радиус</td>
                                                <td>Урон</td>
                                            </tr>
                                            <tr>
                                                <td>∞ метров</td>
                                                <td>4 метра</td>
                                                <td>>600</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'passive.png',
                                    'hero_skill' => 'Карабканье',
                                    'skill_description' => 'Хандзо может запрыгивать на стены и взбираться по ним наверх.',
                                    'video_url' => 'https://www.youtube.com/embed/Apkl8hXHYuc',
                                    'skill_advice' => 'Занимайте выгодную позицую для прикрытия союзников или надаения на противников.',
                                    'skill_info' => 'Хандзо не может забираться на здания, где крыша выходит за уровень стен и тем самым мешает забраться.'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>