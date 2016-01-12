<?php

namespace App\Policies\Device;

use App\Policies\Policy;

class ComputerPolicy extends Policy
{
    /**
     * The policy name.
     *
     * @var string
     */
    protected $name = 'Device Computer Policy';

    /**
     * {@inheritdoc}
     */
    public $actions = [
        'View All Computers',
        'Create Computer',
        'Store Computer',
        'View Computer',
        'Edit Computer',
        'Update Computer',
        'Delete Computer',
    ];

    /**
     * Determines if the current user can view all computers.
     *
     * @return bool
     */
    public function index()
    {
        return $this->canIf('view-all-computers');
    }

    /**
     * Determines if the current user can create computers.
     *
     * @return bool
     */
    public function create()
    {
        return $this->canIf('create-computer');
    }

    /**
     * Determines if the current user can store computers.
     *
     * @return bool
     */
    public function store()
    {
        return $this->canIf('store-computer');
    }

    /**
     * Determines if the current user can view computers.
     *
     * @return bool
     */
    public function show()
    {
        return $this->canIf('view-computer');
    }

    /**
     * Determines if the current user can edit computers.
     *
     * @return bool
     */
    public function edit()
    {
        return $this->canIf('edit-computer');
    }

    /**
     * Determines if the current user can update computers.
     *
     * @return bool
     */
    public function update()
    {
        return $this->canIf('update-computer');
    }

    /**
     * Determines if the current user can destroy computers.
     *
     * @return bool
     */
    public function destroy()
    {
        return $this->canIf('delete-computer');
    }
}
