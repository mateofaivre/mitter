<?php 

interface EncoderVideoStrategy{
    public function getEncoding();
    public function encode($videoFile);
}

class EncoderMP4 implements EncoderVideoStrategy{

    public function getEncoding(){ return "mp4"; }

    public function encode($videoFile){
        echo "Encodage du fichier ".$videoFile." au format ".$this->getEncoding()."<br>";
        //Ici doit se trouver le traitement spécifique du fichier video
        $fileEncoding = "videoEncode.".$this->getEncoding();
        return $fileEncoding; // Retourne le fichier encodé
    }

}

class EncoderAvi implements EncoderVideoStrategy{

    public function getEncoding(){ return "avi"; }

    public function encode($videoFile){
        echo "Encodage du fichier ".$videoFile." au format ".$this->getEncoding()."<br>";
        //Ici doit se trouver le traitement spécifique du fichier video
        $fileEncoding = "videoEncode.".$this->getEncoding();
        return $fileEncoding; // Retourne le fichier encodé
    }

}

class EncoderMkv implements EncoderVideoStrategy{

    public function getEncoding(){ return "mkv"; }

    public function encode($videoFile){
        echo "Encodage du fichier ".$videoFile." au format ".$this->getEncoding()."<br>";
        //Ici doit se trouver le traitement spécifique du fichier video
        $fileEncoding = "videoEncode.".$this->getEncoding();
        return $fileEncoding; // Retourne le fichier encodé
    }

}


class ConvertVideoFile{

    private $videoFile;
    private $encoder;

    public function __construct(String $videoFile, EncoderVideoStrategy $encoder){
        $this->setFile($videoFile);
        $this->setEncoder($encoder);
    }

    public function setFile(String $videoFile){
        $this->videoFile = $videoFile;
    }

    public function setEncoder(EncoderVideoStrategy $encoder){
        $this->encoder = $encoder;
    }

    public function convert() {
        if(is_null($this->videoFile) || is_null($this->encoder)){
            throw new Exception("File or encoder can't be null");
        }
        $this->encoder->encode($this->videoFile);
    }

}


$videoConverter = new ConvertVideoFile("test_video.ogv", new EncoderMkv());
$videoConverter->convert();

$videoConverter->setEncoder(new EncoderAvi());
$videoConverter->convert();

?>