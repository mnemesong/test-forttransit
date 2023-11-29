<?php

namespace db\postSearch;

use components\postSearchService\managers\PostManagerInterface;
use db\records\PostAR;
use db\records\PostCategoryAR;

class PostDbManager implements PostManagerInterface
{

    public function searchPosts(
        ?string $nameFilterSubstr,
        ?string $categoryFilterId,
        ?string $authorFilterId,
        int $limit,
        int $offset
    ): array {
        $postsQuery = PostAR::find()
            ->distinct()
            ->joinWith('authorRecord')
            ->joinWith('postInPostCategoryRecords')
            ->joinWith('postInPostCategoryRecords.categoryRecords');
        if(!empty($nameFilterSubstr)) {
            $postsQuery = $postsQuery
                ->andWhere(['like', 'title', $nameFilterSubstr]);
        }
        if(!empty($categoryFilterId)) {
            $postsQuery = $postsQuery
                ->andWhere([PostCategoryAR::tableName() . '.id' => $categoryFilterId]);
        }
        if(!empty($authorFilterId)) {
            $postsQuery = $postsQuery
                ->andWhere(['authorId' => $authorFilterId]);
        }
        $postsQuery = $postsQuery
            ->limit($limit)
            ->offset($offset);
        return $postsQuery->all();
    }
}