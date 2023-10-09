<?php
//phpinfo();
if(count($_POST)) {


    $file = $_FILES['file'];
    $name = $file['name'];
    $tmp_name = $file['tmp_name'];

    $extension = pathinfo($name, PATHINFO_EXTENSION);

    $newName = uniqid() . '.' . $extension;

    move_uploaded_file($tmp_name, __DIR__ . '/uploads/' . $newName);
}

$items = scandir(__DIR__ . '/uploads');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileDrop</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
        <div class="brand">FileDrop</div>
        <a href="index.html">Files</a>
        <a href="#">Sharing</a>
        <a href="#">Recents</a>
        <a href="#">File requests</a>
        <a href="#">Deleted files</a>
    </nav>
    <main>
        <div class="top">
        <h1>Files &gt; </h1>
        <form class="search">
            <input type="search" placeholder="Search">
            <button>Search</button>
        </form>
        </div>
        <div class="files">
                <div class="header">File</div>
                <div class="header">Size</div>
                <div class="header">Created</div>

                <?php foreach($items as $item): ?>
                    <?php if($item === '.' || $item === '..') continue; ?>
                    <div><?= $item ?></div>
                    <div><?= filesize(__DIR__ . '/uploads/' . $item); ?></div>
                    <div>7/10/2023 10:48</div>
                <?php endforeach; ?>

                          
        </div>
        <form class="upload" method="POST" enctype="multipart/form-data" >
        <input type="hidden" name="test" value="test">    
        <input type="file" name="file" id="file">
            <button>Upload</button>
        </form>
    </main>
</body>
</html>