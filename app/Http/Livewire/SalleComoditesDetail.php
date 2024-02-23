<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use Livewire\Component;
use App\Models\Comodite;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SalleComoditesDetail extends Component
{
    use AuthorizesRequests;

    public Salle $salle;
    public Comodite $comodite;
    public $comoditesForSelect = [];
    public $comodite_id = null;

    public $showingModal = false;
    public $modalTitle = 'New Comodite';

    protected $rules = [
        'comodite_id' => ['required', 'exists:comodites,id'],
    ];

    public function mount(Salle $salle)
    {
        $this->salle = $salle;
        $this->comoditesForSelect = Comodite::pluck('libel', 'id');
        $this->resetComoditeData();
    }

    public function resetComoditeData()
    {
        $this->comodite = new Comodite();

        $this->comodite_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newComodite()
    {
        $this->modalTitle = trans('crud.salle_comodites.new_title');
        $this->resetComoditeData();

        $this->showModal();
    }

    public function showModal()
    {
        $this->resetErrorBag();
        $this->showingModal = true;
    }

    public function hideModal()
    {
        $this->showingModal = false;
    }

    public function save()
    {
        $this->validate();

        $this->authorize('create', Comodite::class);

        $this->salle->comodites()->attach($this->comodite_id, []);

        $this->hideModal();
    }

    public function detach($comodite)
    {
        $this->authorize('delete-any', Comodite::class);

        $this->salle->comodites()->detach($comodite);

        $this->resetComoditeData();
    }

    public function render()
    {
        return view('livewire.salle-comodites-detail', [
            'salleComodites' => $this->salle
                ->comodites()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}
