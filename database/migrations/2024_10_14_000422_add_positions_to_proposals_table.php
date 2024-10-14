<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('proposals', function (Blueprint $table) {
      
         $table->unsignedInteger('position')->nullable();
         $table->string('position_status')->nullable();
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proposals', function (Blueprint $table) {

         $table->dropColumn(['position', 'position_status']);

         DB::update("

         with RankedProposals as (
            select id, row_number() over (order by hours asc) as p
            from proposals
            where project_id = :project
            )
            update proposals

            set position = (select p from RankedProposals where proposasl.id = RankedProposals.id)
           
            where project_id = :project
           
            ", ['project => $project->id']);
         
        });
    }
};
