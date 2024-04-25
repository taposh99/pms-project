
<?php


use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;



function sendSuccessResponse(string $message, int $statusCode = 200, $payload = []): JsonResponse
{
    return response()->json([
        'success' => true,
        'message' => $message,
        'data' => $payload
    ], $statusCode);
}

function sendErrorResponse(string $message, int $statusCode = 200, $payload = []): JsonResponse
{
    return response()->json([
        'success' => false,
        'message' => $message,
        'data' => $payload
    ], $statusCode);
}


   function uploadFile($file, $folder)
    {
        // If no file is provided, return null
        if (!$file instanceof UploadedFile || $file === null) {
            return null;
        }

        // Determine the file extension
        $extension = $file->getClientOriginalExtension();

        // Determine if it's a PDF
        $isPdf = $extension === 'pdf';

        // Determine the storage path
        $storagePath = public_path('uploads/' . ($isPdf ? 'pdf' : 'images'));

        // Create the directory if it doesn't exist
        if (!File::isDirectory($storagePath)) {
            File::makeDirectory($storagePath, 0755, true);
        }

        // Generate a unique filename
        $fileName = uniqid() . '_' . time() . '.' . $extension;

        // Move the uploaded file to the storage path
        $file->move($storagePath, $fileName);

        // Return the file path
        return 'uploads/' . ($isPdf ? 'pdf' : 'images') . '/' . $fileName;
    }

