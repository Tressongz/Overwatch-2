            <p>
                <a href="../death_star.php">Обратно к админке</a>
                <a href="http://overwatch-explained.ru/">На главную</a>
            </p>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'content_news' );
            </script>
            <script type="text/javascript">

                var timerId = setInterval(function() {
                    $('.news-header h3').text(
                        $('#header_news').val()
                    );
                    //
                    $('.news-content-html').html(
                        $('#content_news').val()
                    );
                    //
                    $('.news-header-tags').text(
                        $('#tags_news').val()
                    );
                    //
                    $('.news-content-mainImg img').attr('src', '../img/content/' + $('#main_picture_news').val()
                    );
                    //
                    $('.tag-r-admin').removeClass().addClass(
                        'tag-r-admin tag-ribbon__' +
                        $('#ribbon_news option:selected').attr('class')
                    );
                    $('.tag-ribbon').removeClass().addClass(
                        'tag-ribbon tag-ribbon__'    +
                        $('#ribbon_news option:selected').attr('class')
                    ).text(
                        $('#ribbon_news option:selected').text()
                    );
                    //
                }, 1000);
            </script>
    </body>

</html>
