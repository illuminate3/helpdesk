<?php

namespace App\Jobs\Computer;

use App\Jobs\Job;
use App\Models\Computer;

class Create extends Job
{
    /**
     * The computers type ID.
     *
     * @var int|string
     */
    protected $typeId;

    /**
     * The computers os ID.
     *
     * @var int|string
     */
    protected $osId;

    /**
     * The computers name.
     *
     * @var string
     */
    protected $name;

    /**
     * The computers description.
     *
     * @var null|string
     */
    protected $description = null;

    /**
     * The computers model.
     *
     * @var null|string
     */
    protected $model = null;

    /**
     * The computers distinguished name.
     *
     * @var null|string
     */
    protected $dn = null;

    /**
     * Constructor.
     *
     * @param int|string  $typeId
     * @param int|string  $osId
     * @param string      $name
     * @param null|string $description
     * @param null|string $dn
     * @param null|string $model
     */
    public function __construct($typeId, $osId, $name, $description = null, $dn = null, $model = null)
    {
        $this->typeId = $typeId;
        $this->osId = $osId;
        $this->name = $name;
        $this->description = $description;
        $this->dn = $dn;
        $this->model = $model;
    }

    /**
     * Creates and returns a new Computer.
     *
     * @param Computer $model
     *
     * @return bool|Computer
     */
    public function handle(Computer $model)
    {
        $computer = $model->firstOrNew([
            'dn' => $this->dn,
        ]);

        $computer->type_id = $this->typeId;
        $computer->os_id = $this->osId;
        $computer->name = $this->name;
        $computer->description = $this->description;
        $computer->model = $this->model;

        $computer->save();

        return $computer;
    }
}
