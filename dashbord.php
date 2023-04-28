<?php
$flag = '';
if(isset($_POST['submit'])){
    $texture_de_sol = $_POST['texture_de_sol'];
    $salinite_de_sol = $_POST['salinite_de_sol'];
    $ph = $_POST['ph'];
    $salinite_d_eau = $_POST['salinite_d_eau'];
    $saison = $_POST['saison'];
    $culture_precedente = $_POST['culture_precedente'];
    $matiere_organique = $_POST['matiere_organique'];
    $calcaire_totale = $_POST['calcaire_totale'];
   
    $conn = mysqli_connect('localhost','root','','aform');
    $query = mysqli_query($conn, "INSERT INTO `detail`( `texture_de_sol`, `salinite_de_sol`, `ph`, `salinite_d_eau`, `saison`, `culture_precedente`, `matiere_organique`, `calcaire_totale`) VALUES ('$texture_de_sol','$salinite_de_sol','$ph','$salinite_d_eau','$saison','$culture_precedente','$matiere_organique','$calcaire_totale')");
    if($query){
        $flag = '1';
    }else{
        $flag = '0';
    }
    if(isset($_POST['logout'])){
        header("location: login_form.php");
    }
    
   

}
?>
<?php 
@include 'config.php';
session_start();
if(!isset($_SESSION['user_name'])){
header('location:login_form.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digifarm Dashboard user</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/> 

    <style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }
    body {
        width: 100%;
        background: #E5E7EB;
        position: relative;
        display: flex;
    }
    form{
            background:#fff;
            height:700px;
            width:1050px;
           
            border-radius:5px;
            text-align:center;  
        }

        form{
            position: absolute;
            top: 325%;
            left: 84.5%;
            transform: translate(-80%, -20%);
        }
        select{
            height:30px;
            width:90%;
            border:1px solid grey;
            border-radius:10px;
            margin-top:20px;
        }
        button{
            height: 30px;
            width:200px;
            background:#111827;
            border:1px solid grey;
            border-radius:80px;
            margin-top:80px;
            color: white;
        }
        button:hover{
            cursor:pointer;
        }
       
    #menu {
        background: #1A140E;
        width: 300px;
        height: 100%;
        position: fixed;
        top: 0;
        left: 0;   
    }
    #menu .logo{
        display: flex;
        align-items: center;
        color: #fff;
        padding: 30px 0 0 30px;
        flex-direction: column;
    }

    #menu .logo img{
        width: 100px;
        margin-right: 50px;
    }
    #menu .items {
        margin-top: 50px;
    }
    #menu .items li{
        list-style: none;
        padding: 15px 0;
        transition: 0.3s ease;
    }
    #menu .items  li:hover{
        background: #253047;
        cursor: pointer;
    }
    #menu .items li:nth-child(1){
        border-left: 4px solid #fff;
    }
    #menu .items li i{
        color: rgb(134, 141, 151);
        width: 30px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        font-size: 14px;
        margin: 0 10px 0 25px;
    }
    #menu .items li:hover i,
    #menu .items li:hover a {
        color: #F3F4F6;
    }
    #menu .items li a {
        text-decoration: none;
        color: rgb(134, 141, 151);
        font-weight: 300px;
        transition: 0.3s ease;
    }

    #interface{
        width: calc(100% - 300px);
        margin-left: 300px;
        position: relative;
    }
    #interface .navigation{
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: #fff;
        padding: 15px 30px;
        border-bottom: 2px solid green;
    }
    #interface .navigation .search{
        display: flex;
        justify-content: flex-start;
        align-items: center;
        padding: 10px 14px;
        border: 1px solid #d7dbe6;
        border-radius: 4px;
    }
    #interface .navigation .search i {
        margin-right: 14px;
    }
    #interface .navigation .search input {
        border: none;
        outline: none;
        font-size: 14px;
    }
    #interface .navigation .profile {
        display: flex;
        justify-content: flex-start;
        align-items: center;
        margin-left: auto;
    }
    #interface .navigation .profile i {
        margin-right: 20px;
        font-size: 19px;
        font-weight: 400;
    }
    #interface .navigation .profile img {
        width: 30px;
        height: 30px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid black;
      
    }

</style>



</head>
<body>

    <section id="menu">
    <div class="logo">
    <img src="images/logoo.png" alt="">
    <h2 style="font-family: Pacifico Regular; font-size: 30px; margin-right: 50px;">Digifarm</h2>

</div>
<div class="items">
   
    
            <li><i class="fad fa-chart-pie-alt"></i><a herf="#">Planification des cultures</a></li>
           
            <li><a href="login_form.php" class="btn"><i class="fas fa-sign-out-alt"></i>Logout</a></li>

        </div>
        <form method="POST">
    <input type="hidden" name="logout" value="1">
    <button type="submit">Logout</button>
</form>

    </section>
    <section id="interface">
        <div class="navigation">
        <h1>USERNAME<span> <?php echo $_SESSION['user_name'] ?></span></h1>
        
            <div class="profile">
                
                <img src="images/profilee.jpg" alt="" >
            </div>
        </div>
    </section>
 

    <form action="" method="post">
        <h2 style="font-family: Georgia; margin-top: 30px;">Solution</h2>
        <select name="texture_de_sol" id="texture_de_sol"><br>
            <option value="" hidden>Select Texture_de_sol</option>
            <option value="humifiere">humifiere</option>
            <option value="leger">leger</option>
            <option value="argileux">argileux</option>
            <option value="limoneux">limoneux</option>
            <option value="argilo_calcaire">argilo_calcaire</option>
            <option value="silico_argileux">silico_argileux</option>
            <option value="sableux_argileux">sableux_argileux</option>
            <option value="sableux_limoneux">sableux_limoneux</option>
            <option value="limoneux_sableux">limoneux_sableux</option>
            <option value="argileux_sableux">argileux_sableux</option>
        </select>
        <select name="salinite_de_sol" id="salinite_de_sol"><br>
            <option value="" hidden>Select Salinite_de_sol</option>
            <option value="[0;4[">[0;4[</option>
            <option value="[4;8[">[4;8[</option>
           
        </select>
        <select name="ph" id="ph"><br>
            <option value="" hidden>Select Ph</option>
            <option value="inferieur_à_6,5">inferieur_à_6,5</option>
            <option value="[6,5;7,5]">[6,5;7,5]</option>
            <option value="superieur_à_7,5">superieur_à_7,5</option>
           
        </select>
        <select name="salinite_d_eau" id="salinite_d_eau"><br>
            <option value="" hidden>Select Salinite_d_eau</option>
            <option value="[0;0,5[">[0;0,5[</option>
            <option value="[0,5;1[">[0,5;1[</option>
            <option value="[1;1,5[">[1;1,5[</option>
            <option value="[1,5;2[">[1,5;2[</option>
            <option value="[2;2,5[">[2;2,5[</option>
            <option value="[2,5;3[">[2,5;3[</option>
            <option value="[3;4[">[3;4[</option>
        </select>
        <select name="saison" id="saison"><br>
            <option value="" hidden>Select Saison</option>
            <option value="printemps">printemps</option>
            <option value="hiver">hiver</option>
            <option value="automne">automne</option>
            <option value="ete">ete</option>
        </select>
        <select name="culture_precedente" id="culture_precedente"><br>
            <option value="" hidden>Select Culture_precedente</option>
            <option value="courgette">courgette</option>
            <option value="laitue">laitue</option>
            <option value="feve">feve</option>
            <option value="pomme de terre">pomme de terre</option>
            <option value="haricot">haricot</option>
            <option value="carotte">carotte</option>
            <option value="persil">persil</option>
            <option value="pois">pois</option>
            <option value="ognion">ognion</option>
            <option value="aubergine">aubergine</option>
            <option value="blette">blette</option>
            <option value="asperge">asperge</option>
            <option value="artichaut">artichaut</option>
            <option value="tomate">tomate</option>
            <option value="ail">ail</option>
           
        </select>
        <select name="matiere_organique" id="matiere_organique"><br>
            <option value="" hidden>Select Matiere_organique</option>
            <option value="superieur_à_2%">superieur_à_2%</option>
            <option value="inferieur_à_2%">inferieur_à_2%</option>
            </select>
            <select name="calcaire_totale" id="calcaire_totale"><br>
            <option value="" hidden>Select Calcaire_totale</option>
            <option value="superieur_à_12%">superieur_à_12%</option>
            <option value="inferieur_à_4%">inferieur_à_4%</option>
            <option value="[4;12]">[4;12]</option>
            </select>

        <button type="submit" name="submit">Submit</button>
        <?php 
        if($flag == '1'){
            ?>
            <p style="text-center;color:green;"><strong>Success!</strong>Details has been submited.</p>
            <?php
        }
        if($flag == '0'){
            ?>
            <p style="text-center;color:red;"><strong>Failed!</strong>Details can't submited.</p>
            <?php
        }
        ?>
    </form>
</body>
</html>

