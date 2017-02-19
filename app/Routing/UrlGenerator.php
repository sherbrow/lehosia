<?php

namespace Laravel\Lumen\Routing;

class UrlGenerator extends LumenUrlGenerator
{
    /**
     * @inheritdoc
     */   
    protected function getRootUrl($scheme, $root = null)
    {
        if (is_null($this->cachedRoot)) {
            $this->cachedRoot = $this->app->make('request')->root();
            $baseUrl = env('BASE_URL');
            if ($baseUrl && strpos($this->cachedRoot, $baseUrl) === FALSE) {
                $this->cachedRoot .= $baseUrl;
            }
        }
        return parent::getRootUrl($scheme, $root);
    }
}
