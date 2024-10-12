<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Component;

class Show extends Component
{

    public Project $project;
    
    // Garantir que o projeto seja passado corretamente via montagem
    public function mount(Project $project)
    {
        $this->project = $project;
    }


    public function render()
{
      return view('livewire.projects.show');
}
}