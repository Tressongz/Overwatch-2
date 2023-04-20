
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Заря',
                                'hero_img' => 'zarya.PNG',
                                'hero_real_name' => 'Александра Зарянова',
                                'hero_age' => '28 лет',
                                'hero_work' => ' военнослужащая',
                                'hero_country' => 'Красноярский фронт, Россия',
                                'hero_group' => 'Российские силы обороны',
                                'hero_img_role' => 'tank.jpg',
                                'hero_role' => 'Танк',
                                'hero_description' => 'Окруженная энергетическим барьером, поглощающим входящий урон и усиливающим мощность лучевой пушки, Заря готова к любой схватке на передовой.',
                                'name_page' => 'zarya'
                            );
    $tml->health = array(
                    'health' => 400,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 2;

    $tml->skills = array(
                            array(  'skill_img' => 'cannon.jpg',
                                    'hero_skill' => 'Лучевая пушка',
                                    'skill_description' => 'Мощная лучевая пушка Зари испускает короткий луч разрушительной энергии. Заря также может выпустить разрывной снаряд, поражающий несколько противников.',
                                    'video_url' => 'https://www.youtube.com/embed/-C4kD3H9hkc',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>92-300</td>
                                                <td>46-150</td>
                                                <td>100</td>
                                                <td>20 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'barrier.jpg',
                                    'hero_skill' => 'Защитный барьер',
                                    'skill_description' => 'Лучевая пушка создает барьер, укрывающий Зарю от атак и перенаправляющий их энергию на усиление собственного урона и увеличение диаметра луча.',
                                    'video_url' => 'https://www.youtube.com/embed/SOu3lvozkx4',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Барьер</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>200 хп</td>
                                                <td>2 сек.</td>
                                                <td>10 сек.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'projected_barrier.jpg',
                                    'hero_skill' => 'Дистанционный барьер',
                                    'skill_description' => 'Заря окружает одного из своих союзников энергетическим барьером, который поглощает урон и одновременно увеличивает мощь лучевой пушки.',
                                    'video_url' => 'https://www.youtube.com/embed/ZGV7HnFsdo0',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Барьер</td>
                                                <td>Дальность</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>200 хп</td>
                                                <td>30 метров</td>
                                                <td>2 сек.</td>
                                                <td>8 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'craviton_surge.jpg',
                                    'hero_skill' => 'Гравитонный импульс',
                                    'skill_description' => 'Заря запускает гравитонную бомбу, которая притягивает к себе противников и одновременно наносит им урон.',
                                    'video_url' => 'https://www.youtube.com/embed/l30ZCv8E3C0',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>22</td>
                                                <td>8 метров</td>
                                                <td>4 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'passive.jpg',
                                    'hero_skill' => 'Энергия',
                                    'skill_description' => 'Заря накапливает заблокированный барьерами урон и тем самым повышает эффективность "Лучевой пушки".',
                                    'video_url' => 'https://www.youtube.com/embed/HLl1HytAeg8',
                                    'skill_advice' => '',
                                    'skill_info' => ''
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
