<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use App\http\Controllers\BaseController as BaseController;
use Illuminate\http\Request;
use Validator;

class NewsController extends BaseController
{
    public function news()
    {
        $newsService = new NewsService();
        $result = $newsService->getAllData();
        // if (isNull($result)) {
        //     return $this->sendError('not found');
        // }
        return $this->sendResponse($result->toArray(), 'successfull');
    }

    public function show(Request $request)
    {
        $postData = $request->all();
        $newsService = new NewsService();
        $result = $newsService->getNews($postData);

        return $this->sendResponse($result->toArray(), 'successfull');
    }
}
