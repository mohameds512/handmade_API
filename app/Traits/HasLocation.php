<?php

namespace App\Traits;

  use App\Models\System\Contact;
  use App\Models\System\Location;

  trait HasLocation
  {
      // $user->locations()->save($location);
      // $user->locations()->delete();
      /**
       * @return \Illuminate\Database\Eloquent\Relations\MorphMany
       */
      public function locations()
      {
          return $this->morphMany(Location::class, 'locationable');
      }
  }