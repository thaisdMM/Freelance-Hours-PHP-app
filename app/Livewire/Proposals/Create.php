<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{

   public Project $project;

    public bool $modal = true;

    #[Rule(['required', 'email'])]
    public string $email='';

    #[Rule(['required', 'numeric', 'gt:0'])]

    public int $hours=0;

    public bool $agree = false;

    public function save()
    {

      dd($this->agree, !$this->agree);
        //$this->validate();
        if (! $this->agree) {
            $this->addError('agree', 'Você precisa concordar com os termos de uso');
            return;
        }
{
    // Valida os campos de acordo com as regras definidas acima
    $this->validate();

    // Após a validação passar, salva a proposta no banco
    $this->project->proposals()
        ->updateOrCreate(
            ['email' => $this->email],
            ['hours' => $this->hours]
        );
}
} 
    
    public function render()
    {
        return view('livewire.proposals.create');
    }
}
