<?php

namespace DummyApp\JsonApi\Videos;

use CloudCreativity\JsonApi\Contracts\Object\ResourceObjectInterface;
use CloudCreativity\LaravelJsonApi\Store\EloquentAdapter;
use DummyApp\Video;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class Adapter extends EloquentAdapter
{


    /**
     * Adapter constructor.
     */
    public function __construct()
    {
        parent::__construct(new Video());
    }

    /**
     * @param ResourceObjectInterface $resource
     * @return Video
     */
    protected function createRecord(ResourceObjectInterface $resource)
    {
        $video = new Video();
        $video->{$video->getKeyName()} = $resource->getId();
        $video->user()->associate(Auth::user());

        return $video;
    }

    /**
     * @inheritDoc
     */
    protected function filter($query, Collection $filters)
    {
        // TODO: Implement filter() method.
    }

}