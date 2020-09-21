<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Varbox\Contracts\RoleModelContract;
use Varbox\Controllers\RolesController as VarboxRolesController;

class RolesController extends VarboxRolesController
{
    /**
     * @param Request $request
     * @param RoleModelContract $role
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request, RoleModelContract $role)
    {
        if (in_array($role->name, ['Admin', 'Super'])) {
            flash()->error('
                You cannot modify the <strong>ADMIN</strong> or <strong>SUPER</strong> roles within this <strong>DEMO</strong>!<br />
                If you want to play around with the roles, please try with another one.
            ');

            return redirect()->route('admin.roles.edit', $role->getKey());
        }

        return parent::update($request, $role);
    }
}
