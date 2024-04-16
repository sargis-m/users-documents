<?php

namespace Database\Factories;

use App\Models\CUser;
use App\Models\CDocument;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UsersDocument>
 */
class CUsersDocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = CUser::select('id')->get()->random()->id;
        $documentId = CDocument::select('id')->get()->random()->id;
        return [
            'user_id' => $userId,
            'document_id' => $documentId,
        ];
    }
}
