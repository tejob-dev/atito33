<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use App\Models\Compte;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SalleComptesDetail extends Component
{
    use AuthorizesRequests;

    public Salle $salle;
    public Compte $compte;
    public $comptesForSelect = [];
    public $info_user_id = null;

    public $showingModal = false;
    public $modalTitle = 'New Compte';

    protected $rules = [
        'info_user_id' => ['required', 'exists:comptes,id'],
    ];

    public function mount(Salle $salle)
    {
        $this->salle = $salle;
        $this->comptesForSelect = Compte::pluck('nom_compte', 'id');
        $this->resetCompteData();
    }

    public function resetCompteData()
    {
        $this->compte = new Compte();

        $this->info_user_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newCompte()
    {
        $this->modalTitle = trans('crud.salle_comptes.new_title');
        $this->resetCompteData();

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

        $this->authorize('create', Compte::class);

        $this->salle->comptes()->attach($this->info_user_id, []);

        $this->hideModal();
    }

    public function detach($compte)
    {
        $this->authorize('delete-any', Compte::class);

        $this->salle->comptes()->detach($compte);

        $this->resetCompteData();
    }

    public function render()
    {
        return view('livewire.salle-comptes-detail', [
            'salleComptes' => $this->salle
                ->comptes()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}
