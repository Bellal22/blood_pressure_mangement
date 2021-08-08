<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Doctor;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\DoctorRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class DoctorController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * DoctorController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Doctor::class, 'doctor');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::filter()->latest()->paginate();

        return view('dashboard.accounts.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.accounts.doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\DoctorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DoctorRequest $request)
    {
        $doctor = Doctor::create($request->allWithHashedPassword());

        $doctor->setType($request->type);

        $doctor->addAllMediaFromTokens();

        flash()->success(trans('doctors.messages.created'));

        return redirect()->route('dashboard.doctors.show', $doctor);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        return view('dashboard.accounts.doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        return view('dashboard.accounts.doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\DoctorRequest $request
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(DoctorRequest $request, Doctor $doctor)
    {
        $doctor->update($request->allWithHashedPassword());

        $doctor->setType($request->type);

        $doctor->addAllMediaFromTokens();

        flash()->success(trans('doctors.messages.updated'));

        return redirect()->route('dashboard.doctors.show', $doctor);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Doctor $doctor
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Doctor $doctor)
    {
        $doctor->delete();

        flash()->success(trans('doctors.messages.deleted'));

        return redirect()->route('dashboard.doctors.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Doctor::class);

        $doctors = Doctor::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.accounts.doctors.trashed', compact('doctors'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Doctor $doctor)
    {
        $this->authorize('viewTrash', $doctor);

        return view('dashboard.accounts.doctors.show', compact('doctor'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Doctor $doctor)
    {
        $this->authorize('restore', $doctor);

        $doctor->restore();

        flash()->success(trans('doctors.messages.restored'));

        return redirect()->route('dashboard.doctors.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Doctor $doctor
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Doctor $doctor)
    {
        $this->authorize('forceDelete', $doctor);

        $doctor->forceDelete();

        flash()->success(trans('doctors.messages.deleted'));

        return redirect()->route('dashboard.doctors.trashed');
    }
}
