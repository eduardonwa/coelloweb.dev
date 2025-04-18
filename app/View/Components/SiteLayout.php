<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SiteLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ?string $metaTitle = null, public ?string $metaDescription = null, public ?string $metaThumbnail = null)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.site');
    }
}
