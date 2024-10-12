<x-layouts.app>
   <!-- Passar o projeto para o componente Show -->
   <livewire:projects.show :project="$project" />

   <!-- Passar o projeto para o componente Proposals -->
   <livewire:projects.proposals :project="$project" />
</x-layouts.app>