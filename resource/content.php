<?php
$count = 0;
$rowStart = "<div class='row'>";
$rowEnd = "</div>";
echo $rowStart;
foreach(getAllGames() as $game){
    if($count == 2){
        $count = 0;
        echo $rowEnd;
        echo $rowStart;
    }
?>
    <div class="col-md-6">
        <div class="card bg-dark flex-md-row mb-4 h-md-250 border border-secondary rounded-0">
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]" style="width: 200px; height: 250px;" src="img/<?php echo $game['image']?>" data-holder-rendered="true">
            <div class="card-body d-flex align-items-start">
                <div class="d-flex flex-column justify-content-start h-100">
                    <h3 class="mb-0 title">
                        <a class="text-dark title-text" href="#"><?= $game['name']?></a>
                    </h3>
                    <p class="card-text mb-auto length"><?php echo strip_tags($game['description'])?></p>
                    <div class="mt-auto">
                        <a href="game.php?id=<?php echo $game['id']?>">Continue reading</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
    $count++;
}
echo $rowEnd;
?>