
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Роковая вдова',
                                'hero_img' => 'rokovaya%20vdova.PNG',
                                'hero_real_name' => 'Амели Лакруа',
                                'hero_age' => '33 года',
                                'hero_work' => 'убийца',
                                'hero_country' => 'Анси (Франция)',
                                'hero_group' => 'Коготь',
                                'hero_img_role' => 'defense.jpg',
                                'hero_role' => 'Защита',
                                'hero_description' => 'Роковая вдова использует самые разные приспособления для устранения своих целей. Ее арсенал включает в себя ядовитые мины, разведывательный визор, наделяющий союзников инфракрасным зрением, а также универсальную снайперскую винтовку, которая может вести стрельбу в автоматическом режиме.',
                                'name_page' => 'window_maker'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 1;

    $tml->skills = array(
                            array(  'skill_img' => 'windows_kiss.jpg',
                                    'hero_skill' => 'Поцелуй вдовы',
                                    'skill_description' => 'Универсальная снайперская винтовка Роковой вдовы идеально подходит для ведения прицельного огня с большой дистанции. Если цель находится на средней дистанции, винтовку можно использовать для стрельбы в автоматическом режиме.',
                                    'video_url' => 'https://www.youtube.com/embed/Lne6meGZy1k',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>26-300</td>
                                                <td>13-120</td>
                                                <td>30</td>
                                                <td>7.5 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'crappling_hook.png',
                                    'hero_skill' => 'Крюк',
                                    'skill_description' => 'Роковая вдова выпускает крюк в направлении прицеливания. Когда крюк цепляется за подходящий выступ, она быстро подтягивается к данной точке. Это позволяет Роковой вдове проводить разведку на поле боя, уходить от преследования или обходить цели с фланга.',
                                    'video_url' => 'https://www.youtube.com/embed/rKTjSPz5jnk',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>12 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'venom_mine.png',
                                    'hero_skill' => 'Ядовитая мина',
                                    'skill_description' => 'Роковая вдова умеет быстро устанавливать ядовитые мины практически на любой поверхности. Когда цель заходит в область действия мины, срабатывает датчик движения и мина взрывается, отравляя ядовитым газом всех находящихся рядом противников.',
                                    'video_url' => 'https://www.youtube.com/embed/tUUGkoT3OBs',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>75</td>
                                                <td>15 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'infra_sight.png',
                                    'hero_skill' => 'Инфразрение',
                                    'skill_description' => 'Разведывательный визор Роковой вдовы позволяет ей некоторое время видеть тепловой след целей и другие объекты сквозь стены. Союзники Роковой вдовы также получают возможность видеть эти цели.',
                                    'video_url' => 'https://www.youtube.com/embed/6tvtixvmpLw',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>15.5 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
