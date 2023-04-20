
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Ангел',
                                'hero_img' => 'angel.PNG',
                                'hero_real_name' => 'Ангела Циглер',
                                'hero_age' => '37 лет',
                                'hero_work' => 'полевой врач, специалист быстрого реагирования',
                                'hero_country' => 'Цюрих (Швейцария)',
                                'hero_group' => 'в прошлом — Overwatch',
                                'hero_img_role' => 'support.jpg',
                                'hero_role' => 'Поддержка',
                                'hero_description' => 'Ангел, облаченная в спецкостюм «Валькирия», всегда рядом, когда друг нуждается в исцелении. С помощью своего кадуцея она лечит, воскрешает и укрепляет силы соратников.',
                                'name_page' => 'mercy'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 0;

    $tml->skills = array(
                            array(  'skill_img' => 'caduceus_staff.jpg',
                                    'hero_skill' => 'Кадуцей',
                                    'skill_description' => 'Ангел активирует один из двух лучей, связывающих ее с союзником. Используя лучи, она может восстанавливать его здоровье либо усиливать наносимый им урон.',
                                    'video_url' => 'https://www.youtube.com/embed/NC9q3pUyIpw',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                                <td>Радиус</td>
                                            </tr>
                                            <tr>
                                                <td>60 хп/с</td>
                                                <td>15 метров</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'caduceus_blaster.jpg',
                                    'hero_skill' => 'Кадуцей-бластер',
                                    'skill_description' => 'Ангел стреляет из пистолета. Используется для личной защиты в экстренных ситуациях.',
                                    'video_url' => 'https://www.youtube.com/embed/7cC2CMbxnx0',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>20</td>
                                                <td>20</td>
                                                <td>5 за сек.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'angelic_descent.jpg',
                                    'hero_skill' => 'Ангел-хранитель',
                                    'skill_description' => 'Ангел быстро летит к выбранному союзнику, чтобы оказать ему помощь в критической ситуации.',
                                    'video_url' => 'https://www.youtube.com/embed/bh-zmk95nfE',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>1,5 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'guardian_angel.jpg',
                                    'hero_skill' => 'Нисхождение ангела',
                                    'skill_description' => 'Спецкостюм «Валькирия» позволяет Ангелу плавно опускаться вниз с большой высоты.',
                                    'video_url' => 'https://www.youtube.com/embed/TkmSJ-Nepmc',
                                    'skill_advice' => '',
                                    'skill_info' => 'Парит в воздухе, пока не достанет земли.'
                                 ),
                            array(  'skill_img' => 'resurrect.jpg',
                                    'hero_skill' => 'Воскрешение',
                                    'skill_description' => 'Ангел излучает целительную энергию, которая воскрешает близлежащих павших союзников, полностью восстанавливая им здоровье и возвращая их в бой.',
                                    'video_url' => 'https://www.youtube.com/embed/_VECrgyFg5g',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>15 метров</td>
                                                <td>1 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
