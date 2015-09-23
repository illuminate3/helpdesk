<?php

namespace App\Processors\ActiveDirectory;

use Adldap\Schemas\ActiveDirectory;
use Adldap\Contracts\Adldap;
use Adldap\Models\Computer;
use App\Jobs\ActiveDirectory\ImportComputer;
use Illuminate\Http\Request;
use App\Http\Requests\ActiveDirectory\ComputerImportRequest;
use App\Http\Presenters\ActiveDirectory\ComputerPresenter;
use App\Processors\Processor;

class ComputerProcessor extends Processor
{
    /**
     * @var ComputerPresenter
     */
    protected $presenter;

    /**
     * @var Adldap
     */
    protected $adldap;

    /**
     * Constructor.
     *
     * @param ComputerPresenter $presenter
     * @param Adldap            $adldap
     */
    public function __construct(ComputerPresenter $presenter, Adldap $adldap)
    {
        $this->presenter = $presenter;
        $this->adldap = $adldap;
    }

    /**
     * Displays all computers in active directory.
     *
     * @param Request $request
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->authorize('index', Computer::class);

        $search = $this->adldap->computers()->search();

        if ($request->has('q')) {
            $query = $request->input('q');

            $search = $search
                ->orWhereContains(ActiveDirectory::COMMON_NAME, $query)
                ->orWhereContains(ActiveDirectory::DESCRIPTION, $query)
                ->orWhereContains(ActiveDirectory::OPERATING_SYSTEM, $query);
        }

        $all = $search->sortBy(ActiveDirectory::COMMON_NAME, 'asc')->get();

        $computers = $this->presenter->table($all->toArray());

        $navbar = $this->presenter->navbar();

        return view('pages.active-directory.computers.index', compact('computers', 'navbar'));
    }

    /**
     * Imports an active directory computer.
     *
     * @param ComputerImportRequest $request
     *
     * @return bool|mixed
     */
    public function store(ComputerImportRequest $request)
    {
        $this->authorize('store', Computer::class);

        $computer = $this->adldap->search()->findByDn($request->input('dn'));

        if ($computer instanceof Computer) {
            return $this->dispatch(new ImportComputer($computer));
        }

        return false;
    }
}
