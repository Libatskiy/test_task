<?php

namespace App\Providers;

use App\Models\Hookah;
use App\Models\Reservation;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Validator;

class ValidationServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        Validator::extend('is_hookah_free', function (
            $attribute,
            $value,
            $parameters,
            $validator
        ) {
            $time = $validator->getData()[$parameters[0]];
            $time_from = $time - 60 * 30;
            $time_to = $time + 60 * 30;
            $reservation = Reservation::where('hookah_id', $value)
                ->whereBetween('time_from', [$time_from,$time_to])
                ->first();

            if ($reservation) {
                return false;
            }
            return true;
        });

        Validator::extend('is_hookah_pipe_match', function (
            $attribute,
            $value,
            $parameters,
            $validator
        ) {
            $people = $validator->getData()['number_people'];
            $hookah = Hookah::find($value);
            $needPipe = Str::pipes($people);

            if ($needPipe != $hookah->pipe) {
                return false;
            }
            return true;
        });

        Validator::extend('unique_active', function (
            $attribute,
            $value,
            $parameters,
            $validator
        ) {
            $reservation = Reservation::where('name', $value)
                ->where('status', Reservation::STATUS_ACTIVE)
                ->first();

            if ($reservation) {
                return false;
            }
            return true;
        });
    }

    public function register()
    {
        //
    }
}
