<?php
    require_once('templates/header.php');
    require('templates/db_connect.php');

    if (isset($_GET['search'])) {
        $user_query = mysqli_real_escape_string($dbc, htmlspecialchars(trim($_GET['search'])));
        if (splitQuery($user_query) != '') {
            $query = splitQuery($user_query);
            $result = mysqli_query($dbc, $query)
                or die('Упс! Что-то пошло не так.'.$query);

        } else {
?>
        <main class="news-section">
            <article class="news">
                <p class="search-result">Результат поиска:</p>
                <p class="search-header">
                По Вашему запросу ничего не найдено!
            </p>
            </article>

        </main>
<?php
        require_once('templates/footer.php');
        exit();
        }


    }
?>
<main class="news-section">
    <article class="news">
        <p class="search-result">Результат поиска:</p>
        <?php
            $postsNum = 0;
            while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="right-panel-item">
                <p class="search-header">
                    <a href="<?php
                        echo 'http://'.$_SERVER['HTTP_HOST'].'/news.php?id='.$row['id'];
                    ?>">
                        <?php echo $row['header'];?>
                    </a>
                </p>
                <div class="news-header-tags search-tags">
                    <?php
                            tagsOutput($row['tags']);
                        ?>
                </div>
                <div>
                    <?php
                        $content = strip_tags($row['content']);
                        //$position = mb_strpos($content, $_GET['search'], 0, 'UTF-8');
                        $position = posWordRegister($content, $user_query);

                        if (!$position) {
                            $newtext = mb_substr($content, 0, 200, 'UTF-8');
                        } else {
                            $word = '';
                            $i = $position;
                            $error = 0;
                            while (!preg_match('/[\s,\.]+/' , mb_substr($content, $i, 1, 'UTF-8'))) {
                                $word .= mb_substr($content, $i, 1, 'UTF-8');
                                $i++;
                                $error++;
                                if ($error == 50) {
                                    break;
                                }
                            }

                            $newtext = mb_substr($content, ($position - 100) > 0 ? $position - 100 : 0, 200, 'UTF-8');
                            $newtext = str_replace($word, '<span class="find-word">'.$word.'</span>', $newtext);
                        }
                        $postsNum++;
                    ?>
                    <?= '...'.$newtext.'...' ?>
                </div>
            </div>
        <?php
            }
        ?>
        <?php
            if ($postsNum == 0) {
        ?>
            <p class="search-header">
                По Вашему запросу ничего не найдено!
            </p>
        <?php
            }
        ?>
    </article>
</main>

<?php
    mysqli_close($dbc);
    require_once('templates/footer.php');
?>
