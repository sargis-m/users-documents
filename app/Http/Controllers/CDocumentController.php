<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditDocumentRequest;
use App\Models\CDocument;
use App\Models\DocumentPreviousContent;
use App\Services\EmailNotificationService;

class CDocumentController extends Controller
{
    protected EmailNotificationService $emailService;

    public function __construct(EmailNotificationService $emailService)
    {
        $this->emailService = $emailService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function create(string $id)
    {
        //
    }

    /**
     * Edit a document.
     *
     * @param EditDocumentRequest $request The request object containing the validated data.
     * @param string $id The ID of the document to edit.
     * @return \Illuminate\Http\JsonResponse The JSON response containing the edited document.
     */
    public function edit(EditDocumentRequest $request, int $id): \Illuminate\Http\JsonResponse
    {
        $validatedData = $request->validated();

        $document = CDocument::findOrFail($id);
        $previousContent = $document->content;

        $document->previous_content = $previousContent;
        $document->content = $validatedData['content'];
        $document->save();

        $usersEmails = $document->users->select('email')->toArray();
        // TODO here we can add loop in $usersEmails and create events for sending email notification to users associated with the document
        // $this->emailService->sendDocumentEditNotification($userEmail);

        return response()->json($document);
    }

    /**
     * Deletes a document based on the provided ID.
     *
     * @param string $id The ID of the document to delete
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(int $id): \Illuminate\Http\JsonResponse
    {
        $document = CDocument::findOrFail($id);

        $usersEmails = $document->users->select('email')->toArray();

        // TODO here we can add loop in $usersEmails and create events for sending email notification to users associated with the document
//         $this->emailService->sendDocumentDeleteNotification($userEmail);

        $document->delete();

        return response()->json(['message' => 'Document deleted successfully']);
    }
}
