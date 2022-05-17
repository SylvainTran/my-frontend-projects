<?php
    require_once("connection.inc.php");
    class QueryObject {
        private $request, $params, $connection;

        function __construct($request=null, $params=null) {
            $this->request=$request;
            $this->params=$params;
        }

        function getConnection() {
            $connection=new Connection("www-ens.iro.umontreal.ca", "transylv", "ylvp119T", "transylv_clientdb");
            //$connection=new Connection("localhost", "root", "", "clientdb");
            $connection->connect();
            return $connection->getConnection();
        }

        function executeQuery(){
            $this->connection = $this->getConnection();
            $stmt = $this->connection->prepare($this->request);
            $stmt->execute($this->params);
            $this->disconnect();
            return $stmt;		
        }

        function disconnect(){
            unset($this->connection);
        }

        function removeFile($dossier,$pochette){
            if($pochette!=="avatar.jpg"){
                $rmPoc="../$dossier/".$pochette;
                $tabFichiers = glob("../$dossier/*");
                //print_r($tabFichiers);
                // parcourir les fichier
                foreach($tabFichiers as $fichier){
                  if(is_file($fichier) && $fichier==trim($rmPoc)) {
                    // enlever le fichier
                    unlink($fichier);
                    break;
                  }
                }
            }
        }
            
        function uploadNewFile($dossier, $inputNom, $fichierDefaut, $chaine){
            $cheminDossier="../$dossier/";
            $nomPochette=sha1($chaine.time());
            $pochette=$fichierDefaut;
            if($_FILES[$inputNom]['tmp_name']!==""){
                //Upload de la photo
                $tmp = $_FILES[$inputNom]['tmp_name'];
                $fichier= $_FILES[$inputNom]['name'];
                $extension=strrchr($fichier,'.');
                @move_uploaded_file($tmp,$cheminDossier.$nomPochette.$extension);
                // Enlever le fichier temporaire charg�
                @unlink($tmp); //effacer le fichier temporaire
                //Enlever l'ancienne pochette dans le cas de modifier
                $this->removeFile($dossier,$pochette);
                $pochette=$nomPochette.$extension;
            }
            return $pochette;
        }
    }

?>