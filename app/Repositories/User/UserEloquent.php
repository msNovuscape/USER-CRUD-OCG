<?php

namespace App\Repositories\User;

use App\Models\User;
use Carbon\Carbon; 

class UserEloquent implements UserRepository
{
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function all(array $attributes)
    {
     
        $query = $this->model;
        return $query->when(isset($attributes['filter']), function ($q) use ($attributes, $query) {

            $filter = $attributes['filter'];
            $today = Carbon::today();
            $month = $today->month;
            $day = $today->day;
            
            if ($filter === 'upcoming') {
                $q->whereRaw("DATE_FORMAT(date_of_birth, '%m-%d') >= ?", [$today->format('m-d')]);
            } elseif ($filter === 'upcoming_within_7_days') {
                $endOfNext7Days = $today->copy()->addDays(7)->format('m-d');
                $q->whereRaw("DATE_FORMAT(date_of_birth, '%m-%d') BETWEEN ? AND ?", [$today->format('m-d'), $endOfNext7Days]);
            } elseif ($filter === 'finished_last_7_days') {
                $startOfLast7Days = $today->copy()->subDays(8)->format('m-d');
                $q->whereRaw("DATE_FORMAT(date_of_birth, '%m-%d') BETWEEN ? AND ?", [$startOfLast7Days, $today->copy()->subDay()->format('m-d')]);
            }
        })
        ->orderBy('date_of_birth', 'asc')->get();
    }

    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    public function findBy($filled, $value)
    {
        $this->model->where($filled, $value)->first();
    }

    public function store(array $attributes)
    {
        
        $userId = isset($attributes['id']) ? $attributes['id']: 0;
        return $this->model->updateOrCreate(['id' => $userId], $attributes);
    }

    public function update($attributes, $id)
    {
        $model = $this->find($id);
        $model->update($attributes);
        return $model;
    }

    public function destroy($id)
    {
        return $this->find($id)->delete();
    }
}
