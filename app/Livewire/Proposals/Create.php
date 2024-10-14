<?php

namespace App\Livewire\Proposals;

use App\Actions\ArrangePositions;
use App\Models\Project;
use App\Models\Proposal;
use App\Notifications\loserProposal;
use App\Notifications\NewProposal;
use App\Notifications\PerdeuMane;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Create extends Component
{
    public Project $project;

    public bool $modal = false;

    #[Rule(['required', 'email'])]
    public string $email = "";

    #[Rule(['required', 'numeric', 'gt:0'])]
    public int $hours = 0;

    public bool $agree = false;

    public function save()
    {
        $this->validate();

        if (!$this->agree) {
            $this->addError('agree', 'Você precisa concordar com os Termos e Politicas de privacidade.');
            return;
        }

        DB::transaction(
            function () {
                $proposal = $this->project->proposals()
                    ->updateOrCreate(['email' => $this->email], ['hours' => $this->hours]);

                $this->arrangePositions($proposal);
            }
        );

        $this->project->author->notify(new NewProposal($this->project));

        $this->dispatch('proposals::created');
        $this->modal = false;
    }

    public function arrangePositions(Proposal $proposal)
    {

        $query = DB::select(
            "
                select *, row_number() over(order by hours asc) as newposition
                from proposals
                where project_id = :project_id
            ",
            ['project_id' => $proposal->project_id]
        );

        $currPosition = collect($query)->where('id', '=', $proposal->id)->first();

        $otherProposal = collect($query)->where('position', '=', $currPosition->newposition)->first();

        if ($otherProposal) {
            $proposal->update(['position_status' => 'up']);

            $oProposal = Proposal::find($otherProposal->id);
            $oProposal->update(['position_status' => 'down']);
            $oProposal->notify(new loserProposal($this->project));
        }

        ArrangePositions::run($proposal->project_id);
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
