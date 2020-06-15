<?php 
require '../layout/header.php';
require '../../config/scripts.php';
?>

<div class="content">
    <?php
    $i = 0;
    if(isset($_GET['num'])) {
        $verifyNum = 0;
        $num = $_GET['num'];
        $lista = generateList();
        foreach($lista->pokemon as $pokemon) {
            if($pokemon->num == $num  && $i == 0) {
                $verifyNum = 1;
                $i = 1;
                ?>
                <h2 style="text-align: center;"><?php echo $pokemon->name?></h2>
                <hr>
                <table style="margin-left: auto; margin-right: auto;">
                    <tr>                        
                        <td><img class="card-img-top" src="<?php echo $pokemon->img?>" alt="<?php echo $pokemon->name?>" style="height: 200px; width: 200px; padding: 10%"></td>
                        <td>
                            <p><strong>Height: </strong><?php echo $pokemon->height?></p>
                            <p><strong>Weight: </strong><?php echo $pokemon->weight?></p>
                            <p><strong>Type: </strong><?php foreach($pokemon->type as $type){ ?>
                                <br> 
                                • <a href="/pokedex/view/pages/pokemon.php?type=<?php echo $type?>" style="color: #000000;"><?php echo $type;?></a>
                                <?php }?> 
                            </p>
                            <p><strong>Weaknesses: </strong><?php foreach($pokemon->weaknesses as $fraqueza){ ?>
                                <br> 
                                • <a href="/pokedex/view/pages/pokemon.php?type=<?php echo $fraqueza?>" style="color: #000000;"><?php echo $fraqueza;?></a>
                                <?php }?> 
                            </p>                            
                        </td>
                    </tr>
                </table>
                <hr>
                <?php
                if(isset($pokemon->next_evolution)) {                    
                    echo '<h5><center>Evoluções</center></h5>';
                    echo '<table style="margin-left: auto; margin-right: auto;>"';
                    echo '<tr>';
                    foreach($pokemon->next_evolution as $proximaEvolucao){
                        $num = $proximaEvolucao->num;
                        foreach($lista->pokemon as $verifyPokemon) {
                            if($verifyPokemon->num == $num) { ?>
                                    <td><img class="card-img-top" src="<?php echo $verifyPokemon->img?>" alt="<?php echo $verifyPokemon->name?>" style="height: 100px; width: 100px; padding: 15%"></td>
                                    <td>
                                        <strong>Name: </strong><a href="/pokedex/view/pages/pokemon.php?num=<?php echo $num?>" style="color: #000000;"><?php echo $verifyPokemon->name?></a>                                        
                                        <br>
                                        <strong>Type: </strong><?php foreach($verifyPokemon->type as $evolutionType){ ?>
                                            <br> 
                                            • <a href="/pokedex/view/pages/pokemon.php?type=<?php echo $evolutionType?>" style="color: #000000;"><?php echo $evolutionType;?></a>
                                        <?php }?> 
                                        <br>
                                    </td>                                    
                            <?php }
                        }
                    }
                    echo '</tr>';
                    echo '</table>';
                }
            }
        }
    }
    else if(isset($_GET['type'])) {        
        $type = $_GET['type'];
        $verifyType = 0;
        echo '<h2><center>' . $type . '</center></h2><hr>';
        $lista = generateList();
        ?>
        <div class="row" style="padding-right: 80px; padding-left: 80px">
            <?php
            foreach($lista->pokemon as $pokemon) {
                foreach($pokemon->type as $Type) {
                    if($Type == $type) { 
                        $verifyType = 1; ?>                                        
                            <div class="col-sm-2" style="padding-bottom: 1.5%">
                                <div class="card" style="height: 350px;">
                                    <a href="pokemon.php?num=<?php echo $pokemon->num?>" class='lang' style="text-decoration: none; color:#000000;"><center><img class="card-img-top" src="<?php echo $pokemon->img?>" alt="<?php echo $pokemon->name?>" style="height: 150px; width: 150px; padding: 10px;"></center>
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-align: center;"><?php echo $pokemon->name?></h5>
                                        <?php
                                        $p = "";
                                        if(isset($pokemon->next_evolution)) {
                                            $p = "Next evolutions: ";
                                            foreach($pokemon->next_evolution as $ProximaEvolucao){
                                                $p = $p . "<br> •" . $ProximaEvolucao->name . " ";
                                            }
                                        } else {
                                            $p = "This pokémon doesn't have any evolution.";
                                        }
                                        echo '<p align="center">' . $p . '</p></a>';
                                        ?>
                                    </div>
                                </div>
                            </div>                    
                    <?php }
                }
            } ?>
        </div> 
    <?php } else {
        header("location: index.php");
    } 
    if((isset($verifyNum) && $verifyNum != '1' ) || (isset($verifyType) && $verifyType != '1')){
        ?>
        <center><img src="../../assets/img/pikachu.jpg" alt="pikachu" style="width: 350px; height: 350px; border-radius: 10px;"></center>
        <br/>
        <h3 style="text-align: center">Unfortunately, there's nothing here...</h3>
        <?php
    }?>
</div>
<br>
<br>

<?php require '../layout/footer.php'; ?>