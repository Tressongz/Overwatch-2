
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Турбосвин',
                                'hero_img' => 'turbosvin.PNG',
                                'hero_real_name' => 'Мако Рутледж',
                                'hero_age' => '48 лет',
                                'hero_work' => 'телохранитель, в прошлом — бандит',
                                'hero_country' => 'в прошлом — Джанкертаун, Австралия',
                                'hero_group' => 'в прошлом — Стервятники',
                                'hero_img_role' => 'tank.jpg',
                                'hero_role' => 'Танк',
                                'hero_description' => 'Турбосвин притягивает врагов своим знаменитым цепным крюком, а затем разделывается с ними при помощи мощного металломета. Крепкое телосложение позволяет ему выдерживать огромный урон. Вдобавок к этому, он способен часто восстанавливать себе здоровье.',
                                'name_page' => 'roadhog'
                            );
    $tml->health = array(
                    'health' => 600,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 0;

    $tml->skills = array(
                            array(  'skill_img' => 'scrap_gun.jpg',
                                    'hero_skill' => 'Металломет',
                                    'skill_description' => 'Металломет Турбосвина выстреливает зарядами металлических обломков с большим разбросом и малой дальностью полета. В альтернативном режиме он запускает шар из металлолома, взрывающийся на некотором расстоянии и разбрасывающий осколки из точки взрыва.',
                                    'video_url' => 'https://www.youtube.com/embed/dnIeDN_xIi8',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество патронов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>100-450</td>
                                                <td>50-225</td>
                                                <td>4</td>
                                                <td>1 за сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'take_a_breather.jpg',
                                    'hero_skill' => 'Передышка',
                                    'skill_description' => 'За короткий промежуток времени Турбосвин восстанавливает часть своего запаса здоровья.',
                                    'video_url' => 'https://www.youtube.com/embed/vISZALXdE0M',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>300 хп</td>
                                                <td>1 сек.</td>
                                                <td>8 сек.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'chain_hook.jpg',
                                    'hero_skill' => 'Цепной крюк',
                                    'skill_description' => 'Турбосвин бросает крюк на цепи и притягивает пораженного противника к себе.',
                                    'video_url' => 'https://www.youtube.com/embed/j7tcc75KIyM',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Радиус</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>30</td>
                                                <td>21 метр</td>
                                                <td>6 сек.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'whole_hog.jpg',
                                    'hero_skill' => 'Турбосвинство',
                                    'skill_description' => 'Турбосвин под завязку заряжает свой металломет и обрушивает на врагов ливень картечи, отбрасывающей все пораженные цели.',
                                    'video_url' => 'https://www.youtube.com/embed/NSWYTIdneT8',
                                    'skill_advice' => '',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>0-4928</td>
                                                <td>6 сек.</td>
                                            </tr>'
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
