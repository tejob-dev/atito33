<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use Livewire\Component;
use App\Models\TypeSalle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SalleTypeSallesDetail extends Component
{
    use AuthorizesRequests;

    public Salle $salle;
    public TypeSalle $typeSalle;
    public $typeSallesForSelect = [];
    public $type_salle_id = null;

    public $showingModal = false;
    public $modalTitle = 'New TypeSalle';

    protected $rules = [
        'type_salle_id' => ['required', 'exists:type_salles,id'],
    ];

    public function mount(Salle $salle)
    {
        $this->salle = $salle;
        $this->typeSallesForSelect = TypeSalle::pluck('libelle', 'id');
        $this->resetTypeSalleData();
    }

    public function resetTypeSalleData()
    {
        $this->typeSalle = new TypeSalle();

        $this->type_salle_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newTypeSalle()
    {
        $this->modalTitle = trans('crud.salle_type_salles.new_title');
        $this->resetTypeSalleData();

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

        $this->authorize('create', TypeSalle::class);

        $this->salle->typeSalles()->attach($this->type_salle_id, []);

        $this->hideModal();
    }

    public function detach($typeSalle)
    {
        $this->authorize('delete-any', TypeSalle::class);

        $this->salle->typeSalles()->detach($typeSalle);

        $this->resetTypeSalleData();
    }

    public function render()
    {
        return view('livewire.salle-type-salles-detail', [
            'salleTypeSalles' => $this->salle
                ->typeSalles()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}
