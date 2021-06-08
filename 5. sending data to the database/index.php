<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add article</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="section">
    <form method="POST" id="form" action="post.php" enctype="multipart/form-data" class="add-record">
        <div class="form-row-header"><h2 id="added-article">Добавить статью</h2></div>
        <div class="form-row">
            <label for="title">Добавить заголовок:</label>
            <input id="title" name="title" type="text" placeholder="Заголовок"/>
        </div>
        <div class="form-row">
            <label id="label-description" class="description" for="description">Добавить описание:</label>
            <textarea id="description" rows="7" name="description" type="text" id="description"/></textarea>
        </div>
        <div class="form-row">
            <label id="label-date" for="date">Добавить дату:</label>
            <input id="date" name="date" type="date" placeholder="Дата"/>
        </div>
        <div class="form-row">
            <label id="label-image" for="image">Загрузить картинку:</label>
            <input id="image" name="image" type="file" placeholder="Картинка"/>
        </div>
        <div class="form-row-submit">
            <input type="submit" value="Отправить" />
        </div>
    </form>
</div>
<script>
    let elementForm = document.querySelector('#form');
    elementForm.addEventListener('submit', function(e) {
        if(document.getElementById('title').value == ''){
            e.preventDefault();
            document.getElementById('title').style.borderColor = '#FF0000';
            document.querySelector("label").innerHTML='Заполните поле Заголовок!';
            document.querySelector("label").style.color = '#FF0000';
        }
        if(document.getElementById('description').value == ''){
            e.preventDefault();
            document.getElementById('description').style.borderColor = '#FF0000';
            document.getElementById('label-description').innerHTML='Заполните поле Описание!';
            document.getElementById('label-description').style.color = '#FF0000';
        }
        if(document.getElementById('date').value == ''){
            e.preventDefault();
            document.getElementById('date').style.borderColor = '#FF0000';
            document.getElementById('label-date').innerHTML='Заполните поле Дата!';
            document.getElementById('label-date').style.color = '#FF0000';
        }
    });
</script>
</body>
</html>
