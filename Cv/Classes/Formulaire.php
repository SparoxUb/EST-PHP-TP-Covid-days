<?php 

class Formulaire {
    public function __construct(string $name,string $method ,string $action, string $upload)
    {   
        echo'
            <h2 class="display-4 text-center mt-5 mb-4 "> '.$name.' </h2>
            <hr class="mt-2 mb-3 col-4 mx-auto text-secondary" />
            <div class="col-7 mx-auto mt-5 mb-4 py-3">

                <form action="'.$action.'" method="'.$method.'" ';
    
                if($upload=='1') echo ' enctype="multipart/form-data" ' ;
                echo '>';
    }

    public function Create_Input(string $type,string $name,string $PlaceHolder){
        echo '
            <div class="form-group">
                <input type="'.$type.'" class="form-control" name="'.$name.'" id="'.$name.'" aria-describedby="'.$name.'"
                    placeholder="'.$PlaceHolder.'" />
            </div>
        ';
    }

    public function Create_Select_Fielde(string $name,array $values){
    echo'
            <div class="form-group">
                <select class="form-control" name="'.$name.'" id="etatF">';
                foreach($values as $key=>$value)
                echo '<option value="'.$key.'" selected>'.$value.'</option>';
                    
                echo '
                </select>
            </div>
            ';
    }

    public function Create_Radio_input(string $name,string $value,string $libelle){
        echo '
            <div class="form-check d-inline">
                <label class="form-check-label">
                <input type="radio" class="form-check-input" name="'.$name.'" value="'.$value.'" checked>
                '.$libelle.'
              </label>
            </div>
        ';
    }

    public function Create_area_input(string $name,string$placeHolder, string $row){
        echo'
        <div class="form-group">
            <textarea class="form-control px-2 py-1" name="'.$name.'" id="'.$name.'" rows="'.$row.'"
            placeholder=" '. $placeHolder .' " style="resize:none;"></textarea>
        </div>
        ';
    }

    public function Create_Submit_btn(string $name,string $value,string $text){ 
        echo '
        <button type="submit" name="'.$name.'" value="'.$value.'" class="btn btn-primary d-inline-block ml-auto py-2 px-3 mt-4">'.$text.'</button>
        ';
    }

    public function Create_Input_With_Label(string $type,string $name,string $label,string $placeHolder){
        echo'
        <div class="form-group ">
            <div class="row">
                <div class="col-3 d-inline">
                    <label for="'.$name.'" class="d-inline h4">'.$label.'</label>
                </div>
                <div class="col">
                    <input type="'.$type.'" class="form-control  d-inline" name="'.$name.'" id="'.$name.'" aria-describedby="nom"
                    placeholder="'.$placeHolder.'" />
                </div>
            </div>
        </div>
        ';
    }


    public function Create_area_with_label(string $name,string $label,string $row){
        echo'
        <div class="form-group">
            <label for="'.$name.'" class="h5">'.$label.' </label>
            <textarea class="form-control" name="'.$name.'" id="'.$name.'" rows="'.$row.'" style="resize:none;"></textarea>
        </div>
        ';
    }

    public function Create_file_image_input(string $name,string $label){
        echo '
        <div class="form-group">
        <div class="custom-file">
  <input type="file" name="'.$name.'" class="custom-file-input" id="customFile" accept="image/*"  />
  <label class="custom-file-label" for="customFile" id="customFile_Label">'.$label.'</label>
</div>
</div>
        ';
    }


    public function Close_Form(){
    echo '
        </form>
    </div>
    ';
    }
    


    public static function Afficher_msg(string $name){
        global $Empty_Messages;
        global $Validation_Messages;
        if(isset($Empty_Messages[$name])&&!empty($Empty_Messages[$name])){
            echo '<div class="alert alert-danger alert-dismissible fade show mt-n3" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                '.$Empty_Messages[$name].'
            </div>';
        }else if(isset($Validation_Messages[$name])&&!empty($Validation_Messages[$name])){
            echo '<div class="alert alert-warning alert-dismissible fade show mt-n3" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            '.$Validation_Messages[$name].'
        </div>';
        }
    }

}