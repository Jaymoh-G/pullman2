<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddSeoTitleToWhatWeDosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('what_we_dos', function (Blueprint $table) {
            $table->string('seo_title')->nullable()->after('title');
        });

        $defaults = [
            'excavation-and-demolition' => [
                'seo_title' => 'Excavation & Demolition Nairobi | Pullman Excavators',
                'metaDescription' => 'Professional excavation and demolition in Nairobi: foundations, bush clearing, land levelling, road grading, and dam desilting.',
            ],
            'equipment-and-machine-hire' => [
                'seo_title' => 'Excavator & Equipment Hire Nairobi | Pullman Excavators',
                'metaDescription' => 'Hire excavators, graders, tippers, rollers, low loaders, and more for construction projects across Nairobi and Kenya.',
            ],
            'building-materials-supply' => [
                'seo_title' => 'Building Materials Supply Nairobi | Pullman Excavators',
                'metaDescription' => 'Supply of river sand, ballast, murram, hardcore, machine-cut stones, and other building materials in Nairobi, Kenya.',
            ],
        ];

        foreach ($defaults as $slug => $seo) {
            DB::table('what_we_dos')->where('slug', $slug)->update([
                'seo_title' => $seo['seo_title'],
                'metaDescription' => $seo['metaDescription'],
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('what_we_dos', function (Blueprint $table) {
            $table->dropColumn('seo_title');
        });
    }
}
