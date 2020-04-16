<div class="col-10 mx-auto mt-3 mb-5">
    <div class="col-11 mx-auto border border-secondary rounded py-4 py-2 "
        style="margin-top: 100px;margin-bottom: 60px;">

        <?php 
        
        
        
        ?>

        <?php 
            $Form_Obj = new Formulaire('Etat Civile', 'POST', './Create.php', '1');


            $Form_Obj->Create_Input('text','nom','Nom');
            Formulaire::Afficher_msg('nom');
           



            $Form_Obj->Create_Input('text','prenom','Prenom');
            Formulaire::Afficher_msg('prenom');


        

            echo '
            <div class="form-group d-flex align-content-center align-items-center">
                <div class=" mx-auto">
                    <h4 class="d-inline mr-3">Sex : </h4>
                ';
                    $Form_Obj->Create_Radio_input('Gender','M','Homme');


                    $Form_Obj->Create_Radio_input('Gender','F','Femme');
            echo '
                </div>
            </div>
            ';


            //$Form_Obj->Create_Select_Fielde('etatF',['C'=>'Célébataire','M'=>'Marié(e)','D'=>'Divorcé(e)']);
            $Form_Obj->Create_Input('number','age','Age');
            Formulaire::Afficher_msg('age');




            $Form_Obj->Create_Input('email','email','Adresse Email');
            Formulaire::Afficher_msg('email');




            $Form_Obj->Create_area_input('adresse','Adresse Actuel','3');
            Formulaire::Afficher_msg('addr');


            $Form_Obj->Create_Input('text','Tel','Numéro de Tel');
            Formulaire::Afficher_msg('Tel');


            $Form_Obj->Create_file_image_input('pic','Ajoutez votre photo ici (Optionnelle)');
            Formulaire::Afficher_msg('pic');


            /// This Script will get the name of the choosen file and place it as a label to the file input
            echo '
            <script> 
            const fileInput = document.getElementById("customFile");
            const fileInput_Label = document.getElementById("customFile_Label");
            fileInput.onchange=(e)=>{
             let fileName = e.target.files[0].name.split("\\\\").pop();
             fileInput_Label.innerText = fileName;
            }
            </script>
            ';


            $Form_Obj->Create_Submit_btn('EnvoyerEtat','set','Suivant');
            $Form_Obj->Close_Form();

        ?>
    </div>
</div>