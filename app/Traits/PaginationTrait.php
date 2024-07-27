<?php

namespace App\Traits;

trait PaginationTrait
{

    public function paginationModel($col)
    {
        return [
            'total_items'   => (int) $col->total(),
            'count_items'   => (int) $col->count(),
            'per_page'      => (int) $col->perPage(),
            'total_pages'   => (int) $col->lastPage(),
            'current_page'  => (int) $col->currentPage(),
            'next_page_url' => (string) $col->nextPageUrl(),
            'perv_page_url' => (string) $col->previousPageUrl(),
        ];

    }
}
