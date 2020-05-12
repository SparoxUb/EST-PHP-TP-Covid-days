<div class="col-10 mx-auto mt-1 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2  "
        style="margin-top: 100px; margin-bottom: 60px;">

        <?php 
            $Form_Obj = new Formulaire('Loisirs & Intérets: ','POST','./Create.php','0');
                
                echo '<h2 class="h2 text-center"> Entrez trois de vos loisirs et interets : </h2>';


                $Form_Obj->Create_Input('text','L1','Voyage');
                Formulaire::Afficher_msg('L1');

                $Form_Obj->Create_Input('text','L2','Gaming');
                Formulaire::Afficher_msg('L2');

                $Form_Obj->Create_Input('text','L3','E-Learning');
                Formulaire::Afficher_msg('L3');
                
                echo'
                <a class="btn btn-warning d-inline-block ml-auto py-2 px-3 mt-4 col-1" href="./Reset.php" role="button"> <i
                            class="fas fa-reply fa-lg "></i> </a>';
                $Form_Obj->Create_Submit_btn('EnvoyerLois','set','Suivant');

            $Form_Obj->Close_Form();
        ?>
    </div>

</div>