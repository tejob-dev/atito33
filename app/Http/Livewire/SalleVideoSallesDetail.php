<?php

namespace App\Http\Livewire;

use App\Models\Salle;
use Livewire\Component;
use App\Models\VideoSalle;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class SalleVideoSallesDetail extends Component
{
    use AuthorizesRequests;

    public Salle $salle;
    public VideoSalle $videoSalle;
    public $videoSallesForSelect = [];
    public $video_salle_id = null;

    public $showingModal = false;
    public $modalTitle = 'New VideoSalle';

    protected $rules = [
        'video_salle_id' => ['required', 'exists:video_salles,id'],
    ];

    public function mount(Salle $salle)
    {
        $this->salle = $salle;
        $this->videoSallesForSelect = VideoSalle::pluck('lien_video', 'id');
        $this->resetVideoSalleData();
    }

    public function resetVideoSalleData()
    {
        $this->videoSalle = new VideoSalle();

        $this->video_salle_id = null;

        $this->dispatchBrowserEvent('refresh');
    }

    public function newVideoSalle()
    {
        $this->modalTitle = trans('crud.salle_video_salles.new_title');
        $this->resetVideoSalleData();

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

        $this->authorize('create', VideoSalle::class);

        $this->salle->videoSalles()->attach($this->video_salle_id, []);

        $this->hideModal();
    }

    public function detach($videoSalle)
    {
        $this->authorize('delete-any', VideoSalle::class);

        $this->salle->videoSalles()->detach($videoSalle);

        $this->resetVideoSalleData();
    }

    public function render()
    {
        return view('livewire.salle-video-salles-detail', [
            'salleVideoSalles' => $this->salle
                ->videoSalles()
                ->withPivot([])
                ->paginate(20),
        ]);
    }
}
