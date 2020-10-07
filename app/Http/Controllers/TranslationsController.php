<?php

namespace App\Http\Controllers;

use Varbox\Contracts\TranslationServiceContract;
use Varbox\Controllers\TranslationsController as VarboxTranslationsController;

class TranslationsController extends VarboxTranslationsController
{
    /**
     * @param TranslationServiceContract $translation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function export(TranslationServiceContract $translation)
    {
        flash()->error('The <strong>EXPORT</strong> functionality is not available within this <strong>DEMO</strong>!');

        return redirect()->route('admin.translations.index');
    }
}
