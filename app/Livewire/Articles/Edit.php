<?php

namespace App\Livewire\Articles;

use App\Models\Article;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $id;

    #[Rule('required|min:5')]
    public $title , $description , $body;

    #[Rule('required|mimes:jpeg,png,jpg,gif|max:2048')]
    public $image;

    public function mount($id): void
    {
        $article = Article::query()->findOrFail($id);
        $this->id = $article->id;
        $this->title = $article->title;
        $this->description = $article->description;
        $this->body = $article->body;
        $this->image = $article->image;
    }

    public function update(){
        $article = Article::query()->findOrFail($this->id);
        $validation = $this->validate();
        $article->update($validation);
    }

    public function render()
    {
        return view('livewire.articles.edit');
    }
}
