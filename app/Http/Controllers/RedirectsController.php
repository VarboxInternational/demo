<?php

namespace App\Http\Controllers;

use Varbox\Controllers\RedirectsController as VarboxRedirectsController;

class RedirectsController extends VarboxRedirectsController
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function export()
    {
        flash()->error('The <strong>EXPORT</strong> functionality is not available within this <strong>DEMO</strong>!');

        return redirect()->route('admin.redirects.index');
    }
}
