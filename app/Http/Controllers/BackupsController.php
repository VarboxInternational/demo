<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Varbox\Controllers\BackupsController as VarboxBackupsController;

class BackupsController extends VarboxBackupsController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        if (!empty(array_diff(Storage::disk('backups')->allFiles(), ['.gitignore']))) {
            flash()->error('
                To avoid large disk space usage, only <strong>ONE BACKUP</strong> at a time can be created within this <strong>DEMO</strong>!<br />
                If you want to create a new backup, please delete the old one.
            ');

            return redirect()->route('admin.backups.index');
        }

        return parent::store();
    }
}
