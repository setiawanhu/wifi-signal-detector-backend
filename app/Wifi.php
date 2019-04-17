<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wifi extends Model
{
    protected $fillable = [
        'ssid', 'frequency', 'signal_level', 'location_id'
    ];

    /**
     * Scope a query to get frequency summary.
     * @param $query
     * @return mixed
     */
    public function scopeFrequencySummary($query)
    {
        return $query->groupBy('frequency')
                     ->selectRaw('COUNT(*) as total');
    }

    /**
     * Scope a query to get signal summary.
     *
     * @param $query
     * @return mixed
     */
    public function scopeSignal($query)
    {
        return $query->with(['location' => function ($query) {
            $query->groupBy('name');
        }])->selectRaw('AVG(signal_level) as signal_average');
    }

    /**
     * Get wifi summary.
     *
     * @param $query
     * @return mixed
     */
    public function summary()
    {
        $frequency = $this->frequencySummary()->get();
        $signal = $this->signal()->get();

        return [
            'frequency' => $frequency,
            'signal' => $signal
        ];
    }

    /**
     * Preparing data for insert.
     *
     * @param $data
     * @return array
     */
    public function prepareData($data)
    {
        return [
            'ssid' => $data['ssid'],
            'frequency' => $data['frequency'],
            'signal_level' => $data['level'],
            'location_id' => $data['location_id']
        ];
    }

    /**
     * Relation to Location.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
