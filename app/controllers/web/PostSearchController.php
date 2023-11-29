<?php

namespace app\controllers\web;

use components\postSearchService\request\PostReqDto;
use Webmozart\Assert\Assert;
use yii\web\Controller;
use yii\web\Request;
use yii\web\Response;

/* @property Request $request */
class PostSearchController extends Controller
{

    public function actionIndex(): Response
    {
        try {
            $req = $this->buildPostSearchRequestDto();
            $resp = \Yii::$app->postSearchService->searchPosts($req);
            return $this->asJson($resp->preSerialize());
        } catch (\Throwable $t) {
            return $this->asJson((object) [
                'error' => $t->getMessage(),
                'details' => $t->__toString(),
            ]);
        }
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