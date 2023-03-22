<?php

namespace App\Http\Livewire;

use App\Models\Page;
use App\Models\Slug;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

/**
 * @property Page $page
 */
class ContentPage extends Component
{
    public int $pageId;
    public ?string $title;
    public Collection $nodes;

    public function mount(Slug $slug): void
    {
        if (!$slug->id) {
            $slug = Slug::whereSlug('')->first(); // site's home page
        }

        $page = match($slug->type) {
            Slug\Type::User => Page::find(User::getHomePageId($slug->user_id)),
            default => Page::find($slug->page_id),
        };

        $this->pageId = $page->id;
        $this->title = $page->data['title'] ?? null;
        $this->nodes = $page->nodes()->get();
    }

    public function getPageProperty(): Page
    {
        return Page::find($this->pageId);
    }

    public function render(): View
    {
        return view('livewire.content-page', [
            'page' => $this->page,
        ]);
    }
}
