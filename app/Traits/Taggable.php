<?php

namespace App\Traits;

use App\Models\System\Tag;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Taggable
{
    // $model->tags()->save($tag);
    // $model->tags()->detach($tag);
    /**
     * @return
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }

    /**
     * @param  \App\Models\System\Tag[]|int[]  $tags
     */
    public function syncTags(array $tags)
    {
        $this->save();
        $this->tagsRelation()->sync($tags);

        $this->unsetRelation('tagsRelation');
    }

    public function removeTags()
    {
        $this->tagsRelation()->detach();

        $this->unsetRelation('tagsRelation');
    }

    public function tagsRelation(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
    }
}