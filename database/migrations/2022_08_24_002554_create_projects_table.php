<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\ProjectStatus;
use App\Models\Work;
use App\Models\Project;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('image_title');
            $table->longtext('image_content');
            $table->longtext('content');
            $table->tinyInteger('status')->unsigned()->default(ProjectStatus::in_progress);
            $table->timestamps();
        });
        $works = Work::all();
        $data = [];
        foreach($works as $work){
            array_push($data, [
                'name' => $work->name,
                'image' => $work->image,
                'image_title' => $work->image_title || '',
                'content' => $work->content || '',
                'image_content' => $work->image_content || '',
                'status' => $work->status || 0,
                'created_at' => $work->created_at,
                'updated_at' => $work->updated_at,
            ]);
        }
        Project::insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
