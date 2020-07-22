<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/79873ae661.js" crossorigin="anonymous"></script>

    <title>Генератор</title>
</head>

<body>
    <script>
        function handleSumbit(form) {
            let images = document.getElementById("images").files;
            let keywords = document.getElementById("keywords").files;
            let description = document.getElementById("description").files;
            let pages = document.getElementById("pages");
            let link = document.getElementById("link");
            let input = document.getElementById("json");

            let json = {
                imgs: [],
                kwds: keywords[0].name,
                descr: description[0].name,
                pgs: pages.value,
                lnk: link.value
            };

            for (let i = 0; i < images.length; ++i) {
                json.imgs.push(images[i].name);
            }

            input.value = JSON.stringify(json);
            form.submit();
        }

        function handleChange() {
            let images = document.getElementById("images").files;
            let pages = document.getElementById("pages");
            let descriptionRows = document.getElementById("descriptionRows");
            let keywordsRows = document.getElementById("keywordsRows");

            descriptionRows.innerHTML = (images.length + parseInt(pages.value, 10)).toString(10);
            keywordsRows.innerHTML = (10 * parseInt(pages.value, 10)).toString(10);
        }
    </script>

    <div class="container mt-3">
        <div class="row d-flex justify-content-center text-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header bg-info">Генератор</div>

                    <div class="card-body">
                        <form action="gen.php" method="POST" onsubmit="handleSumbit(this); return false;">
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="images" accept="image/*" onchange="handleChange(); return false;" multiple required>
                                    <label class="custom-file-label" for="images" id="custom_label" style="text-align: left;" data-browse="Загрузить">Изображения</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="keywords" accept="text/plain" required>
                                    <label class="custom-file-label" for="keywords" id="custom_label" style="text-align: left;" data-browse="Загрузить">Ключевые слова</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="description" accept="text/plain" required>
                                    <label class="custom-file-label" for="description" id="custom_label" style="text-align: left;" data-browse="Загрузить">Описание</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pages">Сколько страниц сгенерировать?</label>
                                <input class="form-control" type="number" id="pages" name="pages" min="1" value="1" onchange="handleChange(); return false;" required>
                            </div>

                            <div class="form-group">
                                <label for="link">Ссылка (единая для всех страниц)</label>
                                <input class="form-control" type="text" id="link" name="link" placeholder="https://www.google.com/" required>
                            </div>

                            <input type="text" id="json" name="json" hidden>

                            <div class="form-group">
                                <button type="button submit" class="btn btn-outline-success">Выполнить</button>
                            </div>
                        </form>
                    </div>

                    <div class="card-footer">
                        <h3>Инструкция</h3>

                        <ul class="text-left">
                            <li>
                                В файле с ...
                                <ul>
                                    <li>описанием (<code>description.txt</code>) должно быть минимум <kbd id="descriptionRows">1</kbd> строк</li>
                                    <li>ключевыми словами (<code>keywords.txt</code>) должно быть минимум <kbd id="keywordsRows">1</kbd> строк</li>
                                    <p class="text-warning">Повторяющиеся строки удаляются!</p>
                                </ul>
                            </li>
                            <li>Файлы с ключевыми словами и описанием должны быть в кодировке <code>UTF-8</code></li>
                            <li>Все сгенерированные страницы и файл .json сохраняются в папку <code>pages</code></li>
                            <li>Если в папке <code>pages</code> уже есть страницы, а надо сгенерировать ещё несколько, то в папку <code>images</code> надо докинуть эти файлы, а папку <code>pages</code> удалить</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>