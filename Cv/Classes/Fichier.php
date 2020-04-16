<?php 


class Fichier{
    private $Filename;
    private $File;

    protected function __construct(string $filePath,string $mode)
    {
        $this->Filename = $filePath;
        $this->File= fopen($filePath,$mode);
        if(!$this->File)
        die('Erreure à l\'ouverture du fichier');
    }

    protected function Ecrire(string $Ligne)
    {
        $this->Open_write_mode();
        if( !fwrite($this->File,$Ligne))
        return false;
        return true;
    }
    protected function Effacer()
    {
        if( !file_put_contents($this->Filename, "") )
        return false;
        return true;
    }

    protected function Lecture(){
        $this->Open_read_mode();
        $tmp = fgets($this->File );
        return $tmp;
    }

    protected function Get_Array(){
        $this->Open_read_mode();
        $lines = [];

        while (($line = fgets($this->File)) !== false) {
            // process the line read.
            array_push($lines,$line);
        }
        return $lines;
    }

    protected function Open_read_mode(){
        fclose($this->File);
        $this->File= fopen($this->Filename,'r');
        if(!$this->File)
        die('Erreure à l\'ouverture du fichier pour la lecture');
    }

    protected function Open_write_mode(){
        fclose($this->File);
        $this->File= fopen($this->Filename,'a');
        if(!$this->File)
        die('Erreure à l\'ouverture du fichier pour l\'Ecriture');
    }

    


    protected function __destruct()
    {
        fclose($this->File);
    }
}  


?>