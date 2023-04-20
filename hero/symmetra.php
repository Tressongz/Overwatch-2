
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Cимметра',
                                'hero_img' => 'simmetra.PNG',
                                'hero_real_name' => 'Сатья Вашвани',
                                'hero_age' => '28 лет',
                                'hero_work' => 'архитектор',
                                'hero_country' => ' Утопия (Индия)',
                                'hero_group' => 'корпорация Vishkar',
                                'hero_img_role' => 'support.jpg',
                                'hero_role' => 'Поддержка',
                                'hero_description' => 'Симметра использует фотонный излучатель, чтобы разить врагов, укрывать щитами союзников, устанавливать телепорты и небольшие турели, замедляющие героев противника.',
                                'name_page' => 'symmetra'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 1;

    $tml->skills = array(
                            array(  'skill_img' => 'photon_projector.jpg',
                                    'hero_skill' => 'Фотонный излучатель',
                                    'skill_description' => 'Оружие Симметры испускает луч, действующий на близком расстоянии, который наводится на ближайшего противника и наносит тому периодический урон. Количество урона увеличивается по мере поддержания луча. Излучатель также способен создать сгусток энергии, который наносит значительный урон.',
                                    'video_url' => 'https://www.youtube.com/embed/983lP_3rX6I',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>30-125</td>
                                                <td>5 метров</td>
                                                <td>100</td>
                                                <td>7 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'sentry_turret.jpg',
                                    'hero_skill' => 'Защитная турель',
                                    'skill_description' => 'Симметра устанавливает небольшую турель, которая автоматически стреляет в ближайшего противника, находящегося в зоне поражения, замедляющими снарядами. На поле боя могут находиться несколько турелей одновременно.',
                                    'video_url' => 'https://www.youtube.com/embed/RtNXHaUG7Yo',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>5-7</td>
                                                <td>10 метров</td>
                                                <td>10 сек.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'photon_shield.jpg',
                                    'hero_skill' => 'Фотонный щит',
                                    'skill_description' => 'Симметра укрывает союзника прочным щитом из «жесткого» света, который поглощает урон и действует до тех пор, пока союзник не погибнет.',
                                    'video_url' => 'https://www.youtube.com/embed/yxfbwMqe8qg',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Щит</td>
                                                <td>Радиус</td>
                                                <td>Время накладывания</td>
                                            </tr>
                                            <tr>
                                                <td>25</td>
                                                <td>20 метров</td>
                                                <td>1 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'teleporter.jpg',
                                    'hero_skill' => 'Телепортер',
                                    'skill_description' => 'Симметра устанавливает рядом с собой выход телепортера и подключает его ко входу телепортера, который находится в точке возрождения своей команды. Побежденные союзники могут мгновенно перемещаться из начальной точки к выходу телепортера, чтобы без промедления вновь вступить в бой.',
                                    'video_url' => 'https://www.youtube.com/embed/vA9Rd-MyuGA',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Количество прохождений</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
