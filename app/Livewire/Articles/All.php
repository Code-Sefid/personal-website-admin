<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    use RefreshDatabase;


    public $articles;

    public function mount(): void
    {
        $this->articles = Article::query()->select('id','title','user_id','view_count')->get();
    }

    #[On('goOn-Delete')]
    function delete($id): void
    {
        Article::query()->find($id)->delete();
        $this->dispatch('deleted');
    }

    public function render()
    {
        return view('livewire.articles.all');
    }

    #[On('refresh-articles')]
    public function refreshArticles(): void
    {
        $this->articles =  Article::query()->select('id','title','user_id','view_count')->get();
    }
}
