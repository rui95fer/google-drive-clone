<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFolderRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class FileController extends Controller
{
    /**
     * Display the user's files.
     *
     * @return \Inertia\Response
     */
    public function myFiles()
    {
        return Inertia::render('MyFiles');
    }

    /**
     * Create a new folder.
     *
     * @param  StoreFolderRequest  $request
     * @return void
     */
    public function createFolder(StoreFolderRequest $request)
    {
        $validatedData = $request->validated();
        $parentFolderId = $request->parent;

        $parentFolder = $parentFolderId
            ? File::find($parentFolderId)
            : $this->getRootFolder();

        $newFolder = new File();
        $newFolder->is_directory = true;
        $newFolder->name = $validatedData['folderName'];

        $parentFolder->appendNode($newFolder);
    }

    /**
     * Get the root folder for the current user.
     *
     * @return File
     */
    private function getRootFolder()
    {
        return File::query()
            ->whereIsRoot()
            ->where('created_by_user', Auth::id())
            ->firstOrFail();
    }
}
