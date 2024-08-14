<?php

namespace Tests\Unit;

use App\Models\Vet\Worktime;
use Carbon\Carbon;
use Tests\TestCase;
use Workbench\App\Models\User;

class WorktimeTest extends TestCase
{
    /** @test */
    public function it_can_create_worktime()
    {
        $worktimeData = [
            'day_of_week'=>0,
            'timeTo' => Carbon::createFromTime(12, 37)->format('H:i:s'),
            'timeFrom' => Carbon::createFromTime(13, 30)->format('H:i:s'),
        ];

        $worktime = Worktime::create($worktimeData);

        $this->assertDatabaseHas('work_times',$worktimeData);

    }

    /** @test */
    public function it_can_update_worktime()
    {
        $worktime = Worktime::create([
            'day_of_week'=>0,
            'timeTo' => Carbon::createFromTime(12, 37)->format('H:i:s'),
            'timeFrom' => Carbon::createFromTime(13, 30)->format('H:i:s'),
        ]);

        $updateData = [
            'day_of_week'=>3,
            'timeTo' => Carbon::createFromTime(14, 37)->format('H:i:s'),
            'timeFrom' => Carbon::createFromTime(18, 30)->format('H:i:s'),
        ];

        $worktime->update($updateData);

        $this->assertDatabaseHas('work_times',$updateData);
    }

    /** @test */
    public function it_can_delete_worktime()
    {
        $worktime = Worktime::create([
            'day_of_week'=>0,
            'timeTo' => Carbon::createFromTime(12, 37)->format('H:i:s'),
            'timeFrom' => Carbon::createFromTime(13, 30)->format('H:i:s'),
        ]);

        $worktime->delete();

        $this->assertDatabaseHas('work_times',['id' =>$worktime->id]);

        $this->assertSoftDeleted('work_times',['id'=>$worktime->id]);

    }

}
