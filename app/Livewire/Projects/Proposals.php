<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Proposals extends Component
{
    public Project $project;

    public int $qtdy = 5;

    #[Computed()]
    public function proposals()
    {
        return $this->project->proposals()
            ->orderBy('hours')
            ->paginate($this->qtdy);
    }

    #[Computed()]
    public function lastProposalTime()
    {
        return $this->project->proposals()
            ->latest()->first()
            ->created_at->diffForHumans();
    }

    public function loadMore()
    {
        $this->qtdy += 5;
    }

    #[On('proposals::created')]
    public function render()
    {
        return view('livewire.projects.proposals');
    }
}
