<?php
/* Переменные */

/* Модуль управления сайтом Overwatch-explained Inc. */
class templateController {

        //System
    public $errorMessage;
    public $template;

    public $first_block;
    public $second_block;
    public $third_block;
    public $half_block;


    //Information
    public $hero_information;
    public $health;
    public $difficult;
    public $skills;

    public function templateController($template) {
        $this->errorMessage = '';
        $this->template = $template;

        $this->hero_information = array();
        $this->health = array();
        $this->difficult = 0;
        $this->skills = array();

        require('skills_block.php');
    }

    public function Fill() {
        @$template = file_get_contents($this->template);
        if ($template === false) {
            $this->errorMessage = 'File is not detected.';
            return $this->errorMessage;
        } else {
            if ($this->skills) {
                if (count($this->skills)%2 == 0) {
                    $row = (count($this->skills))/2;

                    while($row!=0) {
                        if ($row!=1) {
                          $module=$this->block.'{SKILLS}';
                        } else {
                            $module=$this->block;
                        }
                        $row=$row-1;
                         $template = str_replace('{SKILLS}', $module, $template);
                    }
                } else {
                    $row = ((count($this->skills))-1)/2;

                    while($row!=0) {
                        if ($row!=0) {
                          $module=$this->block.'{SKILLS}';
                        } else {
                            $module=$this->block;
                        }
                        $row=$row-1;
                         $template = str_replace('{SKILLS}', $module, $template);
                    }
                    $template = str_replace('{SKILLS}', $this->half_block, $template);
                }
//Заполнение панелей данными
                $i=0;
                $element = count($this->skills);
                while($element!=0) {
                    $template = preg_replace('{{NAME_HERO}}', $this->skills[$i]['name_hero'], $template, 1);
                    $template = preg_replace('{{SKILL_IMG}}', $this->skills[$i]['skill_img'], $template, 1);
                    $template = preg_replace('{{HERO_SKILL}}', $this->skills[$i]['hero_skill'], $template, 1);
                    $template = preg_replace('{{SKILL_DESCRIPTION}}', $this->skills[$i]['skill_description'], $template, 1);
                    $template = preg_replace('{{VIDEO_URL}}', $this->skills[$i]['video_url'], $template, 1);
                    $template = preg_replace('{{SKILL_ADVICE}}', $this->skills[$i]['skill_advice'], $template, 1);
                    $template = preg_replace('{{SKILL_INFO}}', $this->skills[$i]['skill_info'], $template, 1);
                    $template = preg_replace('{{n}}', $u=$i+1, $template, 4);
                    $i=$i+1;
                    $element = $element-1;
                }
            }

            if ($this->hero_information) {
                $template = str_replace('{HERO_NAME}', $this->hero_information['hero_name'], $template);
                $template = str_replace('{HERO_IMG}', $this->hero_information['hero_img'], $template);
                $template = str_replace('{HERO_REAL_NAME}', $this->hero_information['hero_real_name'], $template);
                $template = str_replace('{HERO_AGE}', $this->hero_information['hero_age'], $template);
                $template = str_replace('{HERO_WORK}', $this->hero_information['hero_work'], $template);
                $template = str_replace('{HERO_COUNTRY}', $this->hero_information['hero_country'], $template);
                $template = str_replace('{HERO_GROUP}', $this->hero_information['hero_group'], $template);
                $template = str_replace('{HERO_IMG_ROLE}', $this->hero_information['hero_img_role'], $template);
                $template = str_replace('{HERO_ROLE}', $this->hero_information['hero_role'], $template);
                $template = str_replace('{HERO_DESCRIPTION}', $this->hero_information['hero_description'], $template);
                $template = str_replace('{NAME_PAGE}', $this->hero_information['name_page'], $template);
            }
            if ($this->health) {
                $template = str_replace('{HEALTH}', $this->health['health'], $template);
                if ($this->health['armor']!=0) {
                    $template = str_replace('{ARMOR}', $this->health['armor'], $template);
                } else {
                    $template = str_replace('Броня: {ARMOR}','', $template);
                }
                if ($this->health['sheilds']!=0) {
                    $template = str_replace('{SHEILDS}', $this->health['sheilds'], $template);
                } else {
                    $template = str_replace('Щиты: {SHEILDS}','', $template);
                }
            }
            if ($this->difficult == 0) {
                $difficult_string = '
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_easy"></div>';
                $template = str_replace('{DIFFICULT}', $difficult_string, $template);
            } elseif ($this->difficult == 1) {
                $difficult_string = '<div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_mid"></div>
                      <div class="hero_block_hard_mid"></div>
                      <div class="hero_block_hard_mid"></div>';
                $template = str_replace('{DIFFICULT}', $difficult_string, $template);
            } else {
                $difficult_string = '
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_easy"></div>
                      <div class="hero_block_hard_mid"></div>
                      <div class="hero_block_hard_mid"></div>
                      <div class="hero_block_hard_mid"></div>
                      <div class="hero_block_hard_hard"></div>
                      <div class="hero_block_hard_hard"></div>
                      <div class="hero_block_hard_hard"></div>';
                $template = str_replace('{DIFFICULT}', $difficult_string, $template);
            }
            echo $template;
        }
    }
}
?>
