<?php

namespace App\Models;

use Parental\HasParent;
use App\Http\Filters\DoctorFilter;
use App\Http\Resources\DoctorResource;
use App\Models\Relations\DoctorRelations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends User
{
    use HasFactory;
    use HasParent;
    use DoctorRelations;
    use SoftDeletes;

    /**
     * The model filter name.
     *
     * @var string
     */
    protected $filter = DoctorFilter::class;

    /**
     * Get the class name for polymorphic relations.
     *
     * @return string
     */
    public function getMorphClass()
    {
        return User::class;
    }

    /**
     * Get the default foreign key name for the model.
     *
     * @return string
     */
    public function getForeignKey()
    {
        return 'user_id';
    }

    /**
     * @return \App\Http\Resources\DoctorResource
     */
    public function getResource()
    {
        return new DoctorResource($this);
    }

    /**
     * Get the dashboard profile link.
     *
     * @return string
     */
    public function dashboardProfile(): string
    {
        return route('dashboard.doctors.show', $this);
    }
}
