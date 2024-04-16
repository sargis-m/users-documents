<?php

namespace App\Services;

use App\Mail\DocumentDeleted;
use App\Mail\DocumentEdited;
use Illuminate\Support\Facades\Mail;

class EmailNotificationService
{
    /**
     * Send document edit notification to the specified user email.
     *
     * @param string $userEmail The email of the user to send the notification to
     */
    public function sendDocumentEditNotification(string $userEmail): void
    {
         Mail::to($userEmail)->send(new DocumentEdited());
    }

    /**
     * Send document delete notification to the specified user email.
     *
     * @param string $userEmail The email of the user to send the notification to
     */
    public function sendDocumentDeleteNotification(string $userEmail): void
    {
        Mail::to($userEmail)->send(new DocumentDeleted());
    }
}
