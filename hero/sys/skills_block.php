<?php
   $this->block = '<div class="hero_skill_row">
                            <div class="hero_skill_target">
                                <h2 class="hero_skill_title">
                                    <div class="hero_skill_icon"><img width="30px"  height="30px" src="../img/heroes/{NAME_PAGE}/{SKILL_IMG}"></div>{HERO_SKILL}</h2>
                                <div class="hero_skill_description">{SKILL_DESCRIPTION}</div>
                            </div>
                            <div class="hero_skill_target">
                                <h2 class="hero_skill_title">
                                    <div class="hero_skill_icon"><img width="30px" height="30px" src="../img/heroes/{NAME_PAGE}/{SKILL_IMG}"></div>{HERO_SKILL}</h2>
                                <div class="hero_skill_description">{SKILL_DESCRIPTION}</div>
                            </div>
                        </div>
                        <div class="hero_skill_row">
                            <div class="hero_skill_target">
                                <div class="hero_skill_video">
                                    <iframe src="{VIDEO_URL}?loop=1&rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                            <div class="hero_skill_target">
                                <div class="hero_skill_video">
                                    <iframe src="{VIDEO_URL}?loop=1&rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="hero_skill_row">
                            <div class="hero_skill_target">
                                <div class="hero_skill_advice_btn">
                                    <button class="hero_skill_advice_{n} button_advinf">Получить совет</button>
                                    <button class="hero_skill_info_{n} button_advinf">Подробнее</button>
                                    <div class="hero_skill_advice_adv_{n} hidden">{SKILL_ADVICE}</div>
                                    <div class="hero_skill_advice_inf_{n} hidden"><table>
                                        {SKILL_INFO}
                                    </table></div>
                                </div>
                            </div>
                            <div class="hero_skill_target">
                                <div class="hero_skill_advice_btn">
                                    <button class="hero_skill_advice_{n} button_advinf">Получить совет</button>
                                    <button class="hero_skill_info_{n} button_advinf">Подробнее</button>
                                    <div class="hero_skill_advice_adv_{n} hidden">{SKILL_ADVICE}</div>
                                    <div class="hero_skill_advice_inf_{n} hidden"><table>
                                        {SKILL_INFO}
                                    </table></div>
                                </div>
                            </div>
                        </div>';
$this->half_block = '<div class="hero_skill_row">
                            <div class="hero_skill_target">
                                <h2 class="hero_skill_title">
                                    <div class="hero_skill_icon"><img width="30px"  height="30px" src="../img/heroes/{NAME_PAGE}/{SKILL_IMG}"></div>{HERO_SKILL}</h2>
                                <div class="hero_skill_description">{SKILL_DESCRIPTION}</div>
                            </div>
                        </div>
                        <div class="hero_skill_row">
                            <div class="hero_skill_target">
                                <div class="hero_skill_video">
                                    <iframe src="{VIDEO_URL}?loop=1&rel=0" frameborder="0" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="hero_skill_row">
                            <div class="hero_skill_target">
                                <div class="hero_skill_advice_btn">
                                    <button class="hero_skill_advice_{n} button_advinf">Получить совет</button>
                                    <button class="hero_skill_info_{n} button_advinf">Подробнее</button>
                                    <div class="hero_skill_advice_adv_{n} hidden">{SKILL_ADVICE}</div>
                                    <div class="hero_skill_advice_inf_{n} hidden"><table>
                                        {SKILL_INFO}
                                    </table></div>
                                </div>
                            </div>
                        </div>';
