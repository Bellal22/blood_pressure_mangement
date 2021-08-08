<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Nurse;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\NurseRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class NurseController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * NurseController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Nurse::class, 'nurse');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurses = Nurse::filter()->latest()->paginate();

        return view('dashboard.accounts.nurses.index', compact('nurses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.accounts.nurses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\NurseRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(NurseRequest $request)
    {
        $nurse = Nurse::create($request->allWithHashedPassword());

        $nurse->setType($request->type);

        if ($request->user()->isAdmin()) {
            $nurse->syncPermissions($request->input('permissions', []));
        }

        $nurse->addAllMediaFromTokens();

        flash()->success(trans('nurses.messages.created'));

        return redirect()->route('dashboard.nurses.show', $nurse);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Nurse $nurse
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $nurse)
    {
        return view('dashboard.accounts.nurses.show', compact('nurse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Nurse $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit(Nurse $nurse)
    {
        return view('dashboard.accounts.nurses.edit', compact('nurse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\NurseRequest $request
     * @param \App\Models\Nurse $nurse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(NurseRequest $request, Nurse $nurse)
    {
        $nurse->update($request->allWithHashedPassword());

        $nurse->setType($request->type);

        if ($request->user()->isAdmin()) {
            $nurse->syncPermissions($request->input('permissions', []));
        }

        $nurse->addAllMediaFromTokens();

        flash()->success(trans('nurses.messages.updated'));

        return redirect()->route('dashboard.nurses.show', $nurse);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Nurse $nurse
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Nurse $nurse)
    {
        $nurse->delete();

        flash()->success(trans('nurses.messages.deleted'));

        return redirect()->route('dashboard.nurses.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Nurse::class);

        $nurses = Nurse::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.accounts.nurses.trashed', compact('nurses'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Nurse $nurse
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Nurse $nurse)
    {
        $this->authorize('viewTrash', $nurse);

        return view('dashboard.accounts.nurses.show', compact('nurse'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Nurse $nurse
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Nurse $nurse)
    {
        $this->authorize('restore', $nurse);

        $nurse->restore();

        flash()->success(trans('nurses.messages.restored'));

        return redirect()->route('dashboard.nurses.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Nurse $nurse
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Nurse $nurse)
    {
        $this->authorize('forceDelete', $nurse);

        $nurse->forceDelete();

        flash()->success(trans('nurses.messages.deleted'));

        return redirect()->route('dashboard.nurses.trashed');
    }
}
