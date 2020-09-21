<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Varbox\Contracts\UserModelContract;
use Varbox\Controllers\AdminsController as VarboxAdminsController;

class AdminsController extends VarboxAdminsController
{
    /**
     * @param Request $request
     * @param UserModelContract $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, UserModelContract $user)
    {
        if ($user->email == 'admin@mail.com') {
            flash()->error('
                You cannot modify the <strong>ADMIN USER</strong> within this <strong>DEMO</strong>!<br />
                If you want to play around with the admins, please try with another one.
            ');

            return redirect()->route('admin.admins.edit', $user->getKey());
        }

        return parent::update($request, $user);
    }
}
