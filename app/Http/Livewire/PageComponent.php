<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\Slug;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class PageComponent extends Component
{
    public Page $page;
    public function mount(Slug $slug): void
    {
        if (!$slug->id) {
            $slug = Slug::whereSlug('')->first(); // site's home page
        }

        $this->page = match($slug->type) {
            Slug\Type::User => Page::find(User::getHomePageId($slug->user_id)),
            default => Page::find($slug->page_id),
        };
    }

    public function render(): View
    {
        return view('page');
    }
}
