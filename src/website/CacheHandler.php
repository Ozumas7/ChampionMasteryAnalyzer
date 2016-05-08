<?php


namespace Kolter\Website;

use Stash\Driver\FileSystem;
use Stash\Pool;

class CacheHandler
{
    protected $fileName;
    protected $cacheFile;
    protected $cacheFileTimeExpired;
    protected $expireTime;
    public function __construct($filename)
    {
        $this->driver = new FileSystem();
        $this->driver->getDefaultOptions();
        $this->pool = new Pool($this->driver);
        $this->fileName = $filename;
    }

    public function getCacheFile()
    {
        return $this->cacheFile;
    }
    /**
     * @return bool
     */
    public function getCache()
    {
        $item = $this->pool->getItem($this->fileName);
        if ($item->isHit()==false){
            return false;
        }
        $this->cacheFile = $item->get();
        $this->expireTime= $item->getExpiration()->format("H:i:s ");
        return $item->get();
    }
    public function setInCache($resource,$time=86400)
    {
        $item = $this->pool->getItem($this->fileName);
        $this->expireTime = $time*60;
        $item->set($resource);
        $item->expiresAfter(new \DateInterval('PT'.$this->expireTime.'S'));
        return $item->save();
    }
}