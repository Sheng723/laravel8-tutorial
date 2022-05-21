<!doctype html>

<title> Hello World</title>
<link rel="stylesheet" href="/style.css">

<body>
    <?php foreach($blogs as $blog):?>
        <article id = "Blog1">
            <?=$blog;?>
        </article>
    <?php endforeach;?>
    <a href="/"> Go back </a>
</body>