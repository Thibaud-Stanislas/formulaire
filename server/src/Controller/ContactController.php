<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\Message;
use App\Model\Table\MessagesTable;
use Cake\ORM\TableRegistry;

class ContactController extends AppController
{
    public function submitMessage()
    {
        $this->request->allowMethod(['post']); // Assure que seule la méthode POST est autorisée

        $messagesTable = TableRegistry::getTableLocator()->get('Messages'); // Obtient le modèle Messages
        $message = $messagesTable->newEmptyEntity(); // Crée une nouvelle entité Message

        // Patch l'entité Message avec les données de la requête
        $message = $messagesTable->patchEntity($message, $this->request->getData());

        if ($messagesTable->save($message)) {
            $response = ['status' => 'success', 'message' => 'Votre message a été envoyé avec succès.'];
        } else {
            $response = ['status' => 'error', 'message' => 'Une erreur s\'est produite. Veuillez réessayer.'];
        }

        $this->set([
            'response' => $response,
            '_serialize' => 'response',
        ]);
    }
}