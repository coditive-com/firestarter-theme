<?php

namespace App\Posts;

use App\Posts\Post;
use Illuminate\Support\Collection;

class Repository
{
    /**
     * @param array $args {
     *  limit: int,
     *  page: int,
     * }
     * @return Collection<Post>
     */
    public function get(array $args = []): Collection
    {
        $params = apply_filters('firestarter_posts_repository_query_params', [
            'post_type' => 'post',
            'posts_per_page' => ! empty($args['limit']) ? (int) $args['limit'] : 1,
            'paged' => ! empty($args['page']) ? (int) $args['page'] : 1,
            'meta_query' => [
                'relation' => 'AND',
            ],
            'tax_query' => [
                'relation' => 'AND',
            ],
        ], $args);

        $query = new \WP_Query($params);

        return collect($query->posts)->map(fn(\WP_Post $post) => new Post($post->ID));
    }
}
