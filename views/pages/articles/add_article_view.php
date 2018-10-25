<div class="container">
    <form action="/articles/addArticle.php" method="post">
        <label for="title">Введіть назву статті</label>
        <input type="text" name="title" id="title">
        <br>

        <label for="content">Введіть текст статті</label>
        <textarea name="content" id="content" cols="30" rows="10" style="resize: vertical;"></textarea>
        <br>

        <button>Додати</button>
    </form>
</div>