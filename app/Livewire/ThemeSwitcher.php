<?php

namespace App\Livewire;

use Livewire\Component;

class ThemeSwitcher extends Component
{
    public string $theme;
    public string $iconTheme;

    public function mount()
    {
        // Inicializa com session ou padrão 'light'
        $this->theme = session('theme') ?? 'light';

        // Define o ícone inicial
        $this->iconTheme = $this->theme === 'light' ? 'moon' : 'sun';
    }

    public function toggleTheme(): void
    {
        $this->theme = $this->theme === 'light' ? 'dark' : 'light';
        session(['theme' => $this->theme]);

        $this->iconTheme = $this->theme === 'light' ? 'moon' : 'sun';

        // dispara evento para o JS
        $this->dispatch('theme-changed', theme: $this->theme);
    }

    public function render()
    {
        return view('livewire.theme-switcher');
    }
}
