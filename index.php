<?php
$connection=require_once('connection.php');

//$connection=new Connection();
//echo  var_dump($connection);
$notes = $connection->getNotes();
//echo  var_dump($connection);
$curerentNote=[
    'id'=>'id', 
    'title'=>'',
    'description'=>'',
];
if(isset($_GET['']))
{
    $curerentNote=$connection->getNoteById($_GET['id']);  
}
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta http-equiv="X-UA-Copatable" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="app.css">
    </head>
    <body>
        <div>
            <form class="new-note" action="save.php" method="post">
                <input type="hidden" name="id" value="<?php echo $currentNote['id'] ?>">
                <input type="text" name="title" value="<?php echo $curerentNote['title'] ?>" placeholder="Note title" autocomplete="additional-name">
                <textarea name="description " cols="30" rows="4"
                placeholder="Note Description"
                ><?php echo $curerentNote['description']?></textarea>
                <button>
                    <?php if(isset($curerentNote['id'])): ?>
                          Update Note
                    <?php  else:?>
                        New Note
                    <?php endif; ?>    
                </button>
            </form>
            <div class="notes">
                <?php foreach($notes as $note): ?>
                <div class="title">
                    <a href="?id=<?php echo $note['id']?>"><?php  echo $note['title']?></a>
                </div>
                <div class="description">
                <?php  echo $note['description']?>
                </div>
                <small><?php  echo $note['create_date']?></small>
                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $note['id'] ?>" >
                    <button type="button" class="close">x</button>
                </form>
                
            </div>
            <?php endforeach;?>
       
        </div>
            </body>
    </head>
</html>