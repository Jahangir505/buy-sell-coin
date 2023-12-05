<?php
    namespace App\Http\Controllers;

    class nexha extends Controller
    {
        public static function message($message,$number,$sender="PROBUYSELL")
        {
                // Endpoint de l'API RESTful
            $endpoint = "https://smsvas.com/bulk/public/index.php/api/v1/sendsms";

            // Données à envoyer dans la requête POST
            $data = array(
                
                "user"=> "contact@beonweb.cm",
                "password"=> "nexah2023",
                "senderid"=> $sender,
                "sms"=> $message,
                "mobiles"=> "237".$number,
                "scheduletime"=> "2023-10-19 12:05:00"
                    
            );

            // Conversion des données en format JSON
            $jsonData = json_encode($data);
            
            // Initialisation de curl
            $curl = curl_init();

            // Configuration de la requête curl
            curl_setopt($curl, CURLOPT_URL, $endpoint);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $jsonData);
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Accept: application/json",
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
            ));

            // Exécution de la requête curl
            $response = curl_exec($curl);

            

            // Fermeture de la session curl
            curl_close($curl);

            // Vérification des erreurs
            if ($response === false) {
                $error = curl_error($curl);
                // Gestion des erreurs
                //echo "Erreur curl : " . $error;
                
            } else {
                // Traitement de la réponse
                //echo "Réponsesssss : " . $response;
            }

            return $response;
        }
    }