<?php
    require_once('templates/header.php');
    require('templates/db_connect.php');
    if (strpos($_SERVER['REQUEST_URI'], '/news.php?id=') == false) {
        $news_id = mysqli_real_escape_string($dbc, trim(basename($_SERVER['REQUEST_URI'])));
        $query = "SELECT news.id, news.header, news.tags, news.main_picture, news.content, news.post_date, news.views, news.likes, ribbons.value, ribbons.value_css FROM news INNER JOIN ribbons ON news.ribbon = ribbons.ribbons_id WHERE news.header_eng = '$news_id'";
        $result = mysqli_query($dbc, $query)
            or die("Извините, произошла ошибка запроса на сервер[n1]");
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) == 1) {
            $header = $row['header'];
            $tags = $row['tags'];
            $ribbon = $row['ribbon'];
            $main_picture = $row['main_picture'];
            $content = $row['content'];
        } else {
            if (mysqli_num_rows($result) == 0) {
                echo '<p class="error">Извини, но что-то с новостью!</p>';
            } else {
                echo '<p class="error">Извиняй, какая-то ошибка.[ncount]</p>';
                exit();
            }
        }
    }

    addView($dbc, $row['id']);
?>
    <main class="news-section">
        <article class="news">
            <header class="news-header">
                <h3>
                        <?php echo $row['header']; ?>
                    </h3>
                <div class="news-header-tags">
                    <?php
                            tagsOutput($row['tags']);
                        ?>
                </div>
                <div class="tag-ribbon tag-ribbon__<?php echo $row['value_css']; ?>">
                    <?php echo $row['value']; ?>
                </div>
            </header>
            <div class="news-content">
                <div class="news-content-mainImg">
                    <img src="../img/content/<?php echo $row['main_picture']; ?>" src="">
                </div>
                <div class="news-content-html">
                    <?php echo $row['content']; ?>
                </div>
            </div>
            <footer class="news-footer">
                <div class="news-footer-date news-footer-item">
                    <div class="news-footer-date-img"></div>
                    <div class="news-footer-text">
                        <?php echo rdate('d M Y', $row['post_date']); ?>
                    </div>
                </div>
                <div class="news-footer-views news-footer-item">
                    <div class="news-footer-views-img"></div>
                    <div class="news-footer-text">
                        <?php echo $row['views']; ?>
                    </div>
                </div>
                <div class="news-footer-likes news-footer-item">
                    <div class="news-footer-likes-img"></div>
                    <div class="news-footer-text">
                        <?php echo $row['likes']; ?>
                    </div>
                </div>
            </footer>
        </article>

    </main>


<?php
    mysqli_close($dbc);
    require_once('templates/footer.php');
?>
