<div class="col-10 mx-auto mt-1 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2  "
        style="margin-top: 100px; margin-bottom: 60px;">

        <?php 
    $Form_Obj = new Formulaire('Formation','POST','./Create.php','0');

    $Form_Obj->Create_Input_With_Label('number','annee','Année :','2019');
    Formulaire::Afficher_msg('annee');


    $Form_Obj->Create_Input_With_Label('text','nomE','Etablissement','EST-Agadir');
    Formulaire::Afficher_msg('nomE');

    
    $Form_Obj->Create_Input_With_Label('text','dip','Diplome/titre','CCNA');
    Formulaire::Afficher_msg('dip');


    $Form_Obj->Create_area_with_label('desc','Description','3');
    Formulaire::Afficher_msg('desc');


    echo'
    <a class="btn btn-warning d-inline-block ml-auto py-2 px-3 mt-4 col-1" href="./Reset.php" role="button"> <i
                class="fas fa-reply fa-lg "></i> </a>';
    

    $Form_Obj->Create_Submit_btn('EnvoyerForma','set','Suivant');

    $Form_Obj->Close_Form();

?>

    </div>

</div>