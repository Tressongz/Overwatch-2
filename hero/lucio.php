
   <?php
    require_once('../templates/header.php');
    require('sys/templateController.php');
    $tml = new templateController('sys/hero_templates.tpl');
    $tml->hero_information = array(
                                'hero_name' => 'Лусио',
                                'hero_img' => 'lusio.PNG',
                                'hero_real_name' => 'Лусио Коррейя дос Сантос',
                                'hero_age' => '26 лет',
                                'hero_work' => 'диджей, борец за свободу',
                                'hero_country' => 'Рио-де-Жанейро (Бразилия)',
                                'hero_group' => 'отсутствует',
                                'hero_img_role' => 'support.jpg',
                                'hero_role' => 'Поддержка',
                                'hero_description' => 'На поле боя Лусио использует усилитель звука, поражающий противников особыми акустическими снарядами и способный отбрасывать их мощными звуковыми волнами. Его мелодии могут как исцелять союзников, так и увеличивать их скорость передвижения. Лусио может менять эти мелодии на ходу.',
                                'name_page' => 'lucio'
                            );
    $tml->health = array(
                    'health' => 200,
                    'armor' => 0,
                    'sheilds' => 0
                );

    $tml->difficult = 1;

    $tml->skills = array(
                            array(  'skill_img' => 'sonic_amplifier.jpg',
                                    'hero_skill' => 'Усилитель звука',
                                    'skill_description' => 'Лусио способен поражать противников звуковыми снарядами или отбрасывать их с помощью звуковой волны.',
                                    'video_url' => 'https://www.youtube.com/embed/IV_woLcLSfQ',
                                    'skill_advice' => 'Старйтесь держаться на дальнем расстоянии от врагов и отстреливаться.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Голова</td>
                                                <td>Тело</td>
                                                <td>Количество снарядов</td>
                                                <td>Скорость</td>
                                            </tr>
                                            <tr>
                                                <td>32-50</td>
                                                <td>16-25</td>
                                                <td>20</td>
                                                <td>1-4 за выстрел</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'sound_wave.jpg',
                                    'hero_skill' => 'Звуковая волна',
                                    'skill_description' => 'Лусио создает мощную звуковую волну, способную отбростиь неприятеля.',
                                    'video_url' => 'https://www.youtube.com/embed/NFG8XRXAbSQ',
                                    'skill_advice' => 'Отталкивайте и скидывайте противников в пропасть. Используйте свою скорость и возможность кататься по стенам для этого.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Урон</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>25</td>
                                                <td>10с.</td>
                                            </tr>'
                                 ),
//3
                            array(  'skill_img' => 'amp_it_up.jpg',
                                    'hero_skill' => 'Громкость на полную',
                                    'skill_description' => 'Лусио выкручивает громкость своих колонок, увеличивая силу воздействия текущей песни.',
                                    'video_url' => 'https://www.youtube.com/embed/63xqr192738',
                                    'skill_advice' => 'Увеличивайте скорость передвижения, когда необходимо быстро добежать до точки или же увеличивайте восстановление здоровья, когда на врагов обрушивается большой урон или наступление врагов.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                                <td>Перезарядка</td>
                                            </tr>
                                            <tr>
                                                <td>3с.</td>
                                                <td>12с.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'crossfade.jpg',
                                    'hero_skill' => 'Кроссфейд',
                                    'skill_description' => 'Треки Лусио усиливают не только его самого, но и ближайших к нему союзников. Он может переключаться между двумя песнями: одна увеличивает скорость передвижения, другая — восполняет здоровье.',
                                    'video_url' => 'https://www.youtube.com/embed/SUL3KtHmlzw',
                                    'skill_advice' => 'В зависимости от ситации переключайте лечение/скорость. В каждый момент времени вам и вашим союзникам будет что-то важнее.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Лечение</td>
                                            </tr>
                                            <tr>
                                                <td>12 хп/с</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'sound_barrier.jpg',
                                    'hero_skill' => 'Звуковой барьер',
                                    'skill_description' => 'Защитные волны, создаваемые способностью Лусио «Звуковой барьер», на короткое время укрывают его самого и его ближайших союзников персональными щитами.',
                                    'video_url' => 'https://www.youtube.com/embed/aslmSyAkW8g',
                                    'skill_advice' => 'Когда противника заходят с большим количеством урона и здоровье ваших союзников не может пережить данный урон, то можно им помочь использовав Звуковой барьер, который заберет на себя весь этот урон. Не весь, но большую его часть. Сам щит со временем быстро истекает.',
                                    'skill_info' => '
                                            <tr>
                                                <td>Длительность</td>
                                            </tr>
                                            <tr>
                                                <td>6с.</td>
                                            </tr>'
                                 ),
                            array(  'skill_img' => 'passive.jpg',
                                    'hero_skill' => 'Езда по стенам',
                                    'skill_description' => 'Позволяет прыгать на стены и проезжать по ним.',
                                    'video_url' => 'https://www.youtube.com/embed/ZmODVW2EciE',
                                    'skill_advice' => '',
                                    'skill_info' => ''
                                 )
                        );

    $tml->Fill();

    require_once('../templates/footer.php');
?>
