<?php $url = $_SERVER['REQUEST_URI']; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Page</title>
</head>
<body>  
    <div class="container my-5" style="width: 50%;">
        <h2 style="text-align: center;">Тестовая страница</h2>   
        <?php if ($data['image_view']) : ?> 
        <div class="container my-5">            
            <img src="../../public_html/images/image.jpg" alt="">  
        <?php endif; ?>                          
        </div> 
        <?php if ($data['text_view']) : ?> 
        <div class="container my-5">
            <div class="container my-5">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus, quos? Deleniti culpa minus animi. 
                    Temporibus omnis atque excepturi quaerat iusto amet minima odit hic error? Iste quisquam natus qui recusandae.</p>
            </div>
        </div>
        <?php endif; ?> 
    </div>
</body>
</html>