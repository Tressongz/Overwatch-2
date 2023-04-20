
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Райнхардт',
                                'hero_img' => 'rajnhardt.PNG',
                                'hero_real_name' => 'Райнхардт Вильгельм',
                                'hero_age' => '61 год',
                                'hero_work' => 'искатель приключений',
                                'hero_country' => 'Штутгарт (Германия)',
                                'hero_group' => 'в прошлом — Overwatch',
                                'hero_img_role' => 'tank.jpg',
                                'hero_role' => 'Танк',
                                'hero_description' => 'Закованный в броню Райнхардт свирепо машет огромным молотом и стремительным рывком сбивает всех противников на своем пути. Для защиты соратников он использует широкий энергетический барьер.',
                                'name_page' => 'reinhardt'
                            );
    $tml->health = array(
                    'health' => 500,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 0;

    $tml->skills = array(
                            array(  'skill_img' => 'rocket_hammer.jpg',
                                    'hero_skill' => 'Ракетный молот',
                                    'skill_description' => 'Ракетный молот Райнхардта — идеальное оружие ближнего боя. С каждым взмахом он наносит существенный урон, накрывая значительное пространство.',
                                    'video_url' => 'https://www.youtube.com/embed/HdAUgVj8dws',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Тип</td>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>ближний бой</td>
                                                <td>75</td>
                                                <td>5 метров</td>
                                                <td>1 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'barrier_field.jpg',
                                    'hero_skill' => 'Энергетический барьер',
                                    'skill_description' => 'Райнхардт создает перед собой обширный энергетический барьер, поглощающий значительное количество урона до тех пор, пока не будет уничтожен. Проецируемый барьер надежно укрывает Райнхардта и его союзников, но при этом Райнхардт не может атаковать противников.',
                                    'video_url' => 'https://www.youtube.com/embed/o9q_Q8j84Sk',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Барьер</td>
                                                <td>Скорость</td>
                                                <td>Восстановление</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>2000 хп</td>
                                                <td>2,75 м/с</td>
                                                <td>250 хп/с</td>
                                                <td>5 сек.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'charge.jpg',
                                    'hero_skill' => 'Рывок',
                                    'skill_description' => 'Райнхардт бросается вперед по прямой, захватывая противников на своем пути. Если при этом Райнхардт врезается в стену, захваченные противники получают колоссальный урон.',
                                    'video_url' => 'https://www.youtube.com/embed/fhEY114JpQ0',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Расстояние</td>
                                                <td>Скорость</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>300</td>
                                                <td>55 метров</td>
                                                <td>16,66 м/с</td>
                                                <td>10 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'fire_strike.jpg',
                                    'hero_skill' => 'Огненный удар',
                                    'skill_description' => 'Райнхардт взмахивает ракетным молотом перед собой, посылая вперед огненный заряд, который проходит сквозь противников и наносит им урон.',
                                    'video_url' => 'https://www.youtube.com/embed/ZJDkx7gdwFM',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Скорость</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>100</td>
                                                <td>26,66 м/с</td>
                                                <td>6 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'earthshatter.jpg',
                                    'hero_skill' => 'Землетрясение',
                                    'skill_description' => 'Райнхардт с силой бьет ракетным молотом по земле, нанося урон всем противникам перед собой и сбивая их с ног.',
                                    'video_url' => 'https://www.youtube.com/embed/VQdFhw8Fn7k',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                                <td>20 метров</td>
                                                <td>2,5 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
