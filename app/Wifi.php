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
                     ->selectRaw('COUNT(*) as total, frequency');
    }

    /**
     * Scope a query to get signal summary.
     *
     * @param $query
     * @return mixed
     */
    public function scopeDataSummary($query)
    {
        return $query->with(['location'])
            ->groupBy(['ssid','location_id'])
            ->selectRaw('COUNT(ssid) as total, AVG(signal_level) as signal_average, location_id, ssid')
            ->orderBy('location_id');
    }

    /**
     * Get wifi summary.
     *
     * @return mixed
     */
    public function summary()
    {
        $frequency = $this->frequencySummary()->get();
        $signal = $this->data()->get()->groupBy('location.name');

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
