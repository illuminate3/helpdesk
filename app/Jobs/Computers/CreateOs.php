<?php

namespace App\Jobs\Computers;

use App\Models\OperatingSystem;
use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;

class CreateOs extends Job implements SelfHandling
{
    /**
     * @var string
     */
    protected $name;

    /**
     * The operating system version.
     *
     * @var string
     */
    protected $version;

    /**
     * The operating system service pack.
     *
     * @var string
     */
    protected $servicePack;

    /**
     * Constructor.
     *
     * @param string      $name
     * @param string      $version
     * @param null|string $servicePack
     */
    public function __construct($name, $version, $servicePack = null)
    {
        $this->name = $name;
        $this->version = $version;
        $this->servicePack = $servicePack;
    }

    /**
     * Creates an operating system.
     *
     * @return OperatingSystem|false
     */
    public function handle()
    {
        if (!is_null ($this->name)) {
            $os = OperatingSystem::firstOrNew([
                'name' => $this->name,
            ]);

            $os->version;
            $os->servicePack;

            if ($os->save()) {
                return $os;
            }
        }

        return false;
    }
}
