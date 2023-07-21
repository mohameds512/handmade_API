<?php

namespace App\Traits;

use App\Models\System\Contact;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasContacts
  {
    // $user->contacts()->save($contact);
    // $user->contacts()->delete();
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

  }