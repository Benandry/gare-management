<?php

namespace App\Helpers;

class FormatJsonApi
{
    public function formatJson($request, $repository)
    {
        $limit = 10;
        $total = $repository->count([]);
        $page = (int) $request->query->get('page', 1);
        $totalPages = ceil($total / $limit);
        $prevPage = $page > 1 ? $page - 1 : null;
        $nextPage = $page < $totalPages ? $page + 1 : null;

        $offset = ($page - 1) * $limit;
        $data = $repository->findBy([], ['id' => 'DESC'], $limit, $offset);

        return [
            "page" => $page,
            "limit" => $limit,
            "total" => $total,
            "prev_page" => $prevPage,
            "next_page" => $nextPage,
            "total_pages" => ceil($total / $limit),
            "data" => $data,

        ];
    }
}
