<?php
    require_once('templates/header.php');
    require('templates/db_connect.php');


    $pagination = pagination($dbc, 1);
    $result = mysqli_query($dbc, $pagination['query'])
        or die("Извините, произошла ошибка запроса на сервер");
?>
    <main class="news-section">
        <?php
            while ($row = mysqli_fetch_array($result)) {
        ?>
            <article class="news">
                <header class="news-header">
                    <h3>
                       <a href="<?php echo 'http://'.$_SERVER['HTTP_HOST'].'/news.php?id='.$row['id']; ?>" class="news-header-link"><?php echo $row['header'];
                          ?></a>
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
                    <div class="news-content-imgZone">
                        <img src="img/content/<?php echo $row['main_picture']; ?>">
                    </div>
                    <div class="news-content-article">
                        <div class="news-content-article-text">
                            <?php echo mb_substr(deleteAllImgs($row['content']), 0, 500, "UTF-8"); ?>...
                        </div>

                    </div>
                </div>
                <footer class="news-footer">
                    <a href="<?php
                        echo 'http://'.$_SERVER['HTTP_HOST'].'/news.php?id='.$row['id'];
                    ?>" class="readMore">
                                    Читать далее
                                </a>
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
            <?php
                }
                mysqli_close($dbc);
            ?>
    </main>

    <?php
        require_once('templates/footer.php');
    ?>
