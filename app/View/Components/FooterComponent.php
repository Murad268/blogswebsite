<?php

namespace App\View\Components;

use App\Models\Categories;
use App\Models\Settings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = Categories::all();
        $settings = Settings::first();
        $copywrite = $settings->copywrite;

        return view('components.footer-component', compact('categories', 'settings', 'copywrite'));
    }
}
