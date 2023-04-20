    <main class="news-section">
        <article class="news">
            <div class="hero_block">
                <div class="hero_block_content">
<!--Inforamtion-->
                    <h1 class="hero_name">{HERO_NAME}</h1>
                    <div class="info">
                        <div class="icon_hero_page"><img src="../img/menu_heroes/{HERO_IMG}"></div>
                        <div class="description">
                            <h2 class="description_word">Биография</h2>
                                <div class="description_table">
                                    Настоящее имя: {HERO_REAL_NAME}
                                    <br>Возраст: {HERO_AGE}
                                    <br>Род занятий: {HERO_WORK}
                                    <br>Оперативная база: {HERO_COUNTRY}
                                    <br>Принадлежность: {HERO_GROUP}
                                </div>
                        </div>
                    </div>
<!--Health-->
                    <div class="hero_block_stats">Здоровье: {HEALTH}
                                                  Броня: {ARMOR}
                                                  Щиты: {SHEILDS}
<!--Difficulties-->
                        <br>Сложность:
                        <div class="hero_block_hard">
                           {DIFFICULT}
                        </div>
<!--                        Information-->
                        <br>Роль: <img width="20px" height="20px" src="../img/heroes/{HERO_IMG_ROLE}"> {HERO_ROLE}
                        <br>Описание: {HERO_DESCRIPTION}</div>
<!--                        First and second skill -->
                    <div class="hero_skill">
                        {SKILLS}
                    </div>
                    <!--                    <div class="hero_gallery">Галерея</div>-->
                    <div class="hero_article">Статьи</div>
                </div>
            </div>
        </article>
    </main>
