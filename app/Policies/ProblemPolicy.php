<?php

namespace App\Policies;

use App\User;
use App\Problem;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any problems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the problem.
     *
     * @param  \App\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function view(User $user, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can create problems.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->email,['admin@admin.com']);
    }

    /**
     * Determine whether the user can update the problem.
     *
     * @param  \App\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function update(User $user, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can delete the problem.
     *
     * @param  \App\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function delete(User $user, Problem $problem)
    {
        return in_array($user->email,['admin@admin.com']);
    }

    /**
     * Determine whether the user can restore the problem.
     *
     * @param  \App\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function restore(User $user, Problem $problem)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the problem.
     *
     * @param  \App\User  $user
     * @param  \App\Problem  $problem
     * @return mixed
     */
    public function forceDelete(User $user, Problem $problem)
    {
        //
    }
}
