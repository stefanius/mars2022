<?php

namespace App\Http\Controllers\Backoffice\Users;

use App\Models\User;
use Illuminate\Routing\Controller;
use App\Http\Requests\UserStoreRequest;

class UsersController extends Controller
{
    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.users.index');
    }

    /**
     * Show a user page.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.users.show', compact('user'));
    }

    /**
     * Edit a user page.
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.users.edit', compact('user'));
    }

    /**
     * @param UserStoreRequest $request
     */
    public function store(UserStoreRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        User::create($request->validated());

        return redirect(route('users.index'));
    }

    /**
     * @param User $user
     * @param UserStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, UserStoreRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        $user->update($request->validated());

        return redirect(route('users.index'));
    }

    /**
     * Show a user page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.users.create');
    }

    /**
     * Destroy a user.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        $user->forceDelete();

        return redirect('user.index');
    }
}
