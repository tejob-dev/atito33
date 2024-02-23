<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use Livewire\Component;
use App\Models\PhotosSalle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SallePhotosSallesDetail extends Component
{
    use AuthorizesRequests;

    public Salle $salle;
    public PhotosSalle $photosSalle;
    public $photosSallesForSelect = [];
    public $photos_salle_id = null;

    public $showingModal = false;
    public $modalTitle = 'New PhotosSalle';

    protected $rules = [
        'photos_salle_id' => ['required', 'exists:photos_salles,id'],
    ];

    public function mount(Salle $salle)
    {
        $this->salle = $salle;
        $this->photosSallesForSelect = PhotosSalle::pluck('titre_image', 'id');
        $this->resetPhotosSalleData();
    }

    public function resetPhotosSalleData()
    {
        $this->photosSalle = new PhotosSalle();

        $this->photos_salle_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newPhotosSalle()
    {
        $this->modalTitle = trans('crud.salle_photos_salles.new_title');
        $this->resetPhotosSalleData();

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

        $this->authorize('create', PhotosSalle::class);

        $this->salle->photosSalles()->attach($this->photos_salle_id, []);

        $this->hideModal();
    }

    public function detach($photosSalle)
    {
        $this->authorize('delete-any', PhotosSalle::class);

        $this->salle->photosSalles()->detach($photosSalle);

        $this->resetPhotosSalleData();
    }

    public function render()
    {
        return view('livewire.salle-photos-salles-detail', [
            'sallePhotosSalles' => $this->salle
                ->photosSalles()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}
