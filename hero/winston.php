
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Уинстон',
                                'hero_img' => 'uinston.PNG',
                                'hero_real_name' => 'Уинстон',
                                'hero_age' => '29 лет',
                                'hero_work' => 'ученый, искатель приключений',
                                'hero_country' => 'в прошлом — лунная колония «Горизонт»',
                                'hero_group' => ' в прошлом — Overwatch',
                                'hero_img_role' => 'tank.jpg',
                                'hero_role' => 'Танк',
                                'hero_description' => 'Уинстон использует в бою поразительные изобретения, такие как прыжковый ранец, пушка «Тесла» и защитный купол. Вдобавок ко всему, он обладает невероятной физической силой.',
                                'name_page' => 'winston'
                            );
    $tml->health = array(
                    'health' => 500,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 2;

    $tml->skills = array(
                            array(  'skill_img' => 'tesla_cannon.jpg',
                                    'hero_skill' => 'Пушка "Тесла"',
                                    'skill_description' => 'При зажатом спусковом крючке оружие Уинстона испускает электрические разряды.',
                                    'video_url' => 'https://www.youtube.com/embed/jqXX6rcqJt4',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Количество патронов</td>
                                                <td>Радиус</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>57</td>
                                                <td>14</td>
                                                <td>8 метров</td>
                                                <td>20 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'jump_pack.jpg',
                                    'hero_skill' => 'Прыжковый ранец',
                                    'skill_description' => 'С помощью ранца Уинстон взмывает высоко в воздух, при приземлении наносит значительный урон находящимся рядом противникам и оглушает их.',
                                    'video_url' => 'https://www.youtube.com/embed/WJHe9usoWyg',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                                <td>6 сек.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'barrier_projector.jpg',
                                    'hero_skill' => 'Защитный купол',
                                    'skill_description' => 'Уинстон создает сферическое поле, поглощающее урон до тех пор, пока оно не будет уничтожено. Союзники, укрытые полем, могут продолжать вести ответный огонь.',
                                    'video_url' => 'https://www.youtube.com/embed/IlPa7WF_xuY',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Радиус</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>5 метров</td>
                                                <td>5 сек.</td>
                                                <td>13 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'primal_rage.jpg',
                                    'hero_skill' => 'Ярость зверя',
                                    'skill_description' => 'Уинстон высвобождает свою звериную сущность. При этом значительно увеличивается его запас здоровья, атаки ближнего боя начинают наносить увеличенный урон, а Уинстон может чаще использовать способность «Прыжковый ранец». В состоянии ярости Уинстон может использовать только атаки ближнего боя и «Прыжковый ранец».',
                                    'video_url' => 'https://www.youtube.com/embed/GFkpjK7ikwM',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Здоровье</td>
                                                <td>Перезарядка прыжка</td>
                                                <td>Урон</td>
                                                <td>Длительность/td>
                                            </tr>
                                            <tr>
                                                <td>1000</td>
                                                <td>2 сек.</td>
                                                <td>40</td>
                                                <td>10 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
