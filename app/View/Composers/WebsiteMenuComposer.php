<?php

namespace App\View\Composers;

use App\Models\Category;
use Illuminate\View\View;

class WebsiteMenuComposer
{
    public function compose(View $view)
    {
        $categories = Category::get();

        $view->with('categories', $categories);
    }
}
