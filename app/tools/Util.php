<?php
namespace App\Tools;
class Util {
    public static function randomNum(int|float $iMin, int|float $iMax, int|float $fSteps = 1) : int|float {
        $a = range($iMin, $iMax, $fSteps);
        return $a[array_rand($a)];
    }

    public static function dd($var) : void {
        echo '<pre>';
        var_dump($var);
        echo '</pre>';
        die();
    }

    public static function recursiveFileSearch($fileName, $dirName){

        // vérifie que le dossier existe
        if (!is_dir($dirName))
            return null;

        // vérifie si on a trouvé le fichier dans ce dossier
        // dans quel cas on arrête la recherche
        if (file_exists($dirName.'/'.$fileName))
            return $dirName.'/'.$fileName;

        // Cherche dans les sous-dossiers du dossier actuel
        $dir = dir($dirName);
        $foundFile = null;
        while (false !== ($entry = $dir->read())) {

            // passe outre les dossiers '.' et '..'
            if ($entry == '.' || $entry == '..')
                continue;

            // si on a un sous-dossier, lancé la recherche dans celui-ci
            if (is_dir($dirName.'/'.$entry)){
                $foundFile = self::recursiveFileSearch($fileName, $dirName.'/'.$entry);

                // si on a trouvé le fichier, s'arrêté là
                if ($foundFile)
                    return $foundFile;
            }
        }
        // ferme le dossier
        $dir->close();

        // aucun fichier trouvé dans le dossier en cours ou dans ses sous-dossiers
        return null;        
    }
}