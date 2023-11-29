<?php

namespace app\controllers\web;

use components\postSearchService\request\PostReqDto;
use Pantagruel74\Yii2Controllers\WebController;
use Webmozart\Assert\Assert;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;

/* @property Request $request */
class PostSearchController extends WebController
{
    public function permissions(): array
    {
        return [
            'index' => ['*'],
        ];
    }

    public function actionIndex(): Response
    {
        $req = $this->buildPostSearchRequestDto();
        $resp = \Yii::$app->postSearchService->searchPosts($req);
        return $this->asJson($resp->preSerialize());
    }

    protected function buildPostSearchRequestDto(): PostReqDto
    {
        $req = $this->request;
        $titleFilter = $req->get('title');
        Assert::nullOrString($titleFilter);
        $authorFilter = $req->get('author');
        Assert::nullOrString($authorFilter);
        $categoryFilter = $req->get('category');
        Assert::nullOrString($categoryFilter);
        $page = $req->get('page');
        $page = empty($page) ? 0 : intval($page);
        $pageSize = $req->get('pageSize');
        $pageSize = empty($pageSize) ? 20 : intval($pageSize);
        return new PostReqDto(
            $titleFilter,
            $categoryFilter,
            $authorFilter,
            $page,
            $pageSize
        );
    }

}