<?php require '../layout/header.php'; ?>
<?php require '../../config/scripts.php'; ?>

<div class="content">
    <h2 style="text-align: center;">Pokémons List</h2>
    <hr>
    <div class="row" style="padding-right: 80px; padding-left: 80px">
        <?php
        $lista = generateList();
        if(count($lista->pokemon)) {
            foreach($lista->pokemon as $pokemon) {
                foreach($pokemon->type as $type){ $colorType = $type; break; }
                ?>
                <div class="col-sm-2" style="padding-bottom: 1.5%">
                    <div class="card" style="border: 2px solid <?php echo cardColor($type);?>; height: 350px; background-color: <?php echo cardColor($type);?>">
                        <a href="pokemon.php?num=<?php echo $pokemon->num?>" class='lang' style="text-decoration: none; color:#000000;"><center><img class="card-img-top" src="<?php echo $pokemon->img?>" alt="<?php echo $pokemon->name?>" style="height: 150px; width: 150px; padding: 10px;"></center>
                        <div class="card-body" style="background-color: white">
                            <h5 class="card-title" style="text-align: center;"><?php echo $pokemon->name?></h5>
                            <?php
                            $p = "";
                            if(isset($pokemon->next_evolution)) {
                                $p = "Next evolutions: ";
                                foreach($pokemon->next_evolution as $proximaEvolucao) {
                                    $p = $p . "<br> •" . $proximaEvolucao->name . " ";
                                }
                            } else {
                                $p = "This pokémon doesn't have any evolution.";
                            }
                            echo '<p align="center">' . $p . '</p></a>';
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
        }    
        ?>
    </div> 
</div>

<?php require '../layout/footer.php'; ?>
