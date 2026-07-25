<?php

namespace App\Console\Commands;

use App\Models\Blog;
use App\Models\CompanyTeam;
use App\Models\Event;
use App\Models\Job;
use App\Models\Publication;
use App\Models\WhatWeDo;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a model-driven sitemap.xml for Pullman Excavators Kenya';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $staticRoutes = [
            ['route' => 'homepage.index', 'priority' => 1.0, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'frontend.aboutus', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['route' => 'frontend.whatWeDo', 'priority' => 0.9, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['route' => 'frontend.latest', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'frontend.publications', 'priority' => 0.8, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'frontend.events', 'priority' => 0.6, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'frontend.careers', 'priority' => 0.6, 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            ['route' => 'frontend.contactUs', 'priority' => 0.7, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['route' => 'frontend.team', 'priority' => 0.5, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['route' => 'frontend.media', 'priority' => 0.5, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            ['route' => 'frontend.testimonials', 'priority' => 0.5, 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
        ];

        foreach ($staticRoutes as $item) {
            $sitemap->add(
                Url::create(route($item['route']))
                    ->setLastModificationDate(Carbon::now())
                    ->setChangeFrequency($item['freq'])
                    ->setPriority($item['priority'])
            );
        }

        WhatWeDo::query()->whereNotNull('slug')->each(function (WhatWeDo $service) use ($sitemap) {
            $sitemap->add(
                Url::create(route('frontend.whatWeDo.page', ['slug' => $service->slug]))
                    ->setLastModificationDate($service->updated_at ?: Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.9)
            );
        });

        Blog::with('category')->whereNotNull('slug')->each(function (Blog $blog) use ($sitemap) {
            if (!$blog->category || !$blog->category->slug) {
                return;
            }

            $sitemap->add(
                Url::create(route('frontend.blog.details', [
                    'category' => $blog->category->slug,
                    'slug' => $blog->slug,
                ]))
                    ->setLastModificationDate($blog->updated_at ?: Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.7)
            );
        });

        Publication::query()->whereNotNull('slug')->each(function (Publication $publication) use ($sitemap) {
            $sitemap->add(
                Url::create(route('frontend.publications.detail', ['slug' => $publication->slug]))
                    ->setLastModificationDate($publication->updated_at ?: Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7)
            );
        });

        Event::query()->whereNotNull('slug')->each(function (Event $event) use ($sitemap) {
            $sitemap->add(
                Url::create(route('frontend.event.details', ['slug' => $event->slug]))
                    ->setLastModificationDate($event->updated_at ?: Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.6)
            );
        });

        Job::query()->whereNotNull('slug')->each(function (Job $job) use ($sitemap) {
            $sitemap->add(
                Url::create(route('frontend.careers.details', ['slug' => $job->slug]))
                    ->setLastModificationDate($job->updated_at ?: Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.5)
            );
        });

        CompanyTeam::query()->whereNotNull('slug')->each(function (CompanyTeam $member) use ($sitemap) {
            $sitemap->add(
                Url::create(route('frontend.team.details', ['slug' => $member->slug]))
                    ->setLastModificationDate($member->updated_at ?: Carbon::now())
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.4)
            );
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated at public/sitemap.xml');

        return 0;
    }
}
