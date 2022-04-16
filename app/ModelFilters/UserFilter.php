<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class UserFilter extends ModelFilter
{
    /**
     * Filter users by role id.
     *
     * @param integer $value
     *
     * @return \App\ModelFilters\UserFilter
     */
    public function role($value): UserFilter
    {
        return $this->where('role_id', $value);
    }

    /**
     * Filter users by name.
     *
     * @param string $value
     *
     * @return \App\ModelFilters\UserFilter
     */
    public function name($value): UserFilter
    {
        return $this->whereLike('name', $value);
    }

    /**
     * Filter users by name.
     *
     * @param string $value
     *
     * @return \App\ModelFilters\UserFilter
     */
    public function email($value): UserFilter
    {
        return $this->whereLike('email', $value);
    }

    /**
     * Filter users by name.
     *
     * @param string $value
     *
     * @return \App\ModelFilters\UserFilter
     */
    public function phoneNumber($value): UserFilter
    {
        return $this->whereLike('phone_number', $value);
    }
}
