<?php

use App\Models\Testimonial;
use App\Http\Livewire\Datatable;
use App\Http\Livewire\COPCategory;
use App\Http\Livewire\JobComponent;
use App\Http\Livewire\TagComponent;
use App\Http\Livewire\BlogComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PageComponent;
use Spatie\Sitemap\SitemapGenerator;
use App\Http\Livewire\AlbumComponent;
use App\Http\Livewire\EventComponent;
use App\Http\Livewire\Frontend\Cop27;
use App\Http\Livewire\LatestCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Frontend\Events;
use App\Http\Livewire\Frontend\JoinUs;
use App\Http\Livewire\Frontend\Latest;
use App\Http\Livewire\AddUserComponent;
use App\Http\Livewire\Frontend\Careers;
use App\Http\Livewire\Frontend\Gallery;
use App\Http\Livewire\PartnerComponent;
use App\Http\Livewire\TeamBioComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\Frontend\Partners;
use App\Http\Livewire\Frontend\WhatWeDo;
use App\Http\Livewire\HomepageComponent;
use App\Http\Livewire\PetitionComponent;
use App\Http\Livewire\WhatWeDoComponent;
use App\Http\Controllers\AdminController;
use App\Http\Livewire\Frontend\ContactUs;
use App\Http\Livewire\JobCreateComponent;
use App\Http\Livewire\QuoteCardComponent;
use App\Http\Livewire\TagCreateComponent;
use App\Http\Livewire\AlbumPhotoComponent;
use App\Http\Livewire\BlogCreateComponent;
use App\Http\Livewire\PageCreateComponent;
use App\Http\Livewire\TeamCreateComponent;
use App\Http\Livewire\Testimonials\Create;
use App\Http\Livewire\TestimonialsManager;
use App\Http\Livewire\AlbumCreateComponent;
use App\Http\Livewire\BlogCommentComponent;
use App\Http\Livewire\EventCreateComponent;
use App\Http\Livewire\Frontend\Publication;
use App\Http\Livewire\MediaCreateComponent;
use App\Http\Livewire\PageSectionComponent;
use App\Http\Livewire\PublicationComponent;
use App\Http\Livewire\VideoCreateComponent;
use App\Http\Livewire\Frontend\PageNotFound;
use App\Http\Livewire\PublicationSinglePage;
use App\Http\Livewire\SubscriptionComponent;
use App\Http\Livewire\EventsDetailsComponent;
use App\Http\Livewire\Frontend\COPSinglePage;
use App\Http\Livewire\Frontend\WhatWeDoPages;
use App\Http\Livewire\PartnerCreateComponent;
use App\Http\Livewire\AdminDashboardComponent;
use App\Http\Livewire\CategoryCreateComponent;
use App\Http\Livewire\Frontend\BlogSinglePage;
use App\Http\Livewire\Frontend\PowerShiftNews;
use App\Http\Livewire\HomepageSliderComponent;
use App\Http\Livewire\JobApplicationComponent;
use App\Http\Livewire\PetitionCreateComponent;
use App\Http\Livewire\UserManagementComponent;
use App\Http\Livewire\WhatWeDoCreateComponent;
use App\Http\Livewire\EditorDashboardComponent;
use App\Http\Livewire\Frontend\RenewableEnergy;
use App\Http\Livewire\Frontend\SearchComponent;
use App\Http\Livewire\PageSectionDataComponent;
use App\Http\Livewire\PublicationPageComponent;
use App\Http\Livewire\QuoteCardCreateComponent;
use App\Http\Livewire\AlbumPhotoCreateComponent;
use App\Http\Livewire\Frontend\AboutUsComponent;
use App\Http\Livewire\EventRegistrationComponent;
use App\Http\Livewire\Frontend\ClimateResilience;
use App\Http\Livewire\PageSectionCreateComponent;
use App\Http\Livewire\PublicationCreateComponent;
use App\Http\Livewire\Frontend\AllEventsComponent;
use App\Http\Livewire\NewsletterSendMassComponent;
use App\Http\Livewire\Frontend\ExplainersComponent;
use App\Http\Livewire\Frontend\MultilateralClimate;
use App\Http\Livewire\PetitionSubscribersComponent;
use App\Http\Livewire\PublicationCategoryComponent;
use App\Http\Livewire\HomepageSliderCreateComponent;
use App\Http\Livewire\TeamComponent as BackendTeams;
use App\Http\Livewire\MediaComponent as BackendMedia;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Sitemap
use App\Http\Livewire\PageSectionDataCreateComponent;
use App\Http\Livewire\Frontend\JobSinglePageComponent;
use App\Http\Livewire\Frontend\PressReleasesComponent;
use App\Http\Livewire\Frontend\SustainableDevelopment;
use App\Http\Livewire\NewsletterSubscriptionComponent;
use  \App\Http\Livewire\Frontend\FrontendMediaComponent;
use App\Http\Livewire\PublicationCategoryCreateComponent;
use App\Http\Livewire\Frontend\TeamComponent as FrontendTeams;
use App\Http\Livewire\Frontend\TestimonialComponent;

Route::get("/generate-sitemap", function () {
    SitemapGenerator::create(config('app.url'))->writeToFile(public_path('sitemap.xml'));
    // dd(config('app.url'));
});
// Frontend Routes
Route::get('/', HomepageComponent::class)->name('homepage.index');
Route::get('/about-us', AboutUsComponent::class)->name('frontend.aboutus');
Route::get('/what-we-do', WhatWeDo::class)->name('frontend.whatWeDo');
Route::get('/what-we-do/{slug}', WhatWeDoPages::class)->name('frontend.whatWeDo.page');
Route::get('/latest', Latest::class)->name('frontend.latest');

Route::get('/latest/our-work/{categorySlug}', LatestCategory::class)->name('frontend.blog.categories');
Route::get('/COP28/{subCategorySlug}', COPCategory::class)->name('frontend.cop.categories');
Route::get('/COP28', Cop27::class)->name('frontend.cop27');

Route::get('/events', Events::class)->name('frontend.events');
Route::get('/events/all', AllEventsComponent::class)->name('frontend.events.all');
Route::get('/media', FrontendMediaComponent::class)->name('frontend.media');
Route::get('/our-work', PublicationPageComponent::class)->name('frontend.publications');
Route::get('/our-work/{slug}', PublicationSinglePage::class)->name('frontend.publications.detail');
Route::get('/join-us', Careers::class)->name('frontend.careers');
Route::get('/join-us/careers/{slug}', JobSinglePageComponent::class)->name('frontend.careers.details');
Route::get('/contact-us', ContactUs::class)->name('frontend.contactUs');
Route::get('/latest/{category}/{slug}', BlogSinglePage::class)->name('frontend.blog.details');
Route::get('/COP28/{category}/{slug}', COPSinglePage::class)->name('frontend.cop.details');

Route::get('/events/details/{slug}', EventsDetailsComponent::class)->name('frontend.event.details');
Route::get('/team', FrontendTeams::class)->name('frontend.team');
Route::get('/team/{slug}', \App\Http\Livewire\TeamBioComponent::class)->name('frontend.team.details');

Route::get('/search', SearchComponent::class)->name('frontend.search');
Route::get('/media/gallery/{albumId}', Gallery::class)->name('frontend.gallery');

Route::get('/testimonials', TestimonialComponent::class)->name('frontend.testimonials');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/admin', AdminDashboardComponent::class)->name('admin.dashboard');
});



// for Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {

    Route::get('/admin/user/1', UserManagementComponent::class)->name('users.dashboard');
    Route::get('/admin/user/delete/{id}', UserManagementComponent::class)->name('users.delete');
    Route::get('/admin/user/edit/{id}', UserManagementComponent::class)->name('admin.users.edit');
    Route::get('/admin/adduser', AddUserComponent::class)->name('users.add');
    Route::post('/admin/adduser', AddUserComponent::class);
});

//for Editor
Route::middleware(['auth:sanctum', 'verified', 'authEditor'])->group(function () {

    Route::get('/editor/dashboard', EditorDashboardComponent::class)->name('editor.dashboard');

    Route::get('/admin/subscription/list', SubscriptionComponent::class)->name('admin.subscription.list');
    Route::get('/admin/newsletter-subscription/send-mass', NewsletterSendMassComponent::class)->name('newsletter.send.mass');

    // Petitions
    Route::get('/admin/petition/list', PetitionComponent::class)->name('admin.petition.list');
    Route::get('/admin/petition/create', PetitionCreateComponent::class)->name('admin.petition.create');
    Route::get('/admin/petition/subscribers', PetitionSubscribersComponent::class)->name('admin.petition.subscribers');


    //news
    Route::get('/admin/latest/news', BlogComponent::class)->name('admin.blogs');
    Route::get('/admin/latest/create', BlogCreateComponent::class)->name('admin.blogs.create');
    Route::get('/admin/latest/comments', BlogCommentComponent::class)->name('admin.blogs.comments');

    //publications
    Route::get('/admin/our-work/latest', PublicationComponent::class)->name('admin.publications');
    Route::get('/admin/our-work/create', PublicationCreateComponent::class)->name('admin.publications.create');
    Route::get('/admin/our-work/category/list', PublicationCategoryComponent::class)->name('admin.publications.category.list');
    Route::get('/admin/our-work/category/create', PublicationCategoryCreateComponent::class)->name('admin.publications.category.create');
    Route::get('/admin/our-work/quoteCard/list', QuoteCardComponent::class)->name('admin.publications.quoteCard.list');
    Route::get('/admin/our-work/quoteCard/create', QuoteCardCreateComponent::class)->name('admin.publications.quoteCard.create');

    // Media
    Route::get('/admin/media/list', BackendMedia::class)->name('admin.media.list');
    Route::get('/admin/media/video/create', VideoCreateComponent::class)->name('admin.media.video.create');
    Route::get('/admin/media/create', MediaCreateComponent::class)->name('admin.media.create');

    // Company teams
    Route::get('/admin/team/list', BackendTeams::class)->name('admin.team.list');
    Route::get('/admin/team/create', TeamCreateComponent::class)->name('admin.team.create');

    //jobs
    Route::get('/admin/job/list', JobComponent::class)->name('admin.job');
    Route::get('/admin/job/create', JobCreateComponent::class)->name('admin.job.create');
    Route::get('/admin/job/edit/{id}', JobCreateComponent::class)->name('admin.job.edit');
    Route::get('/admin/job/applications', JobApplicationComponent::class)->name('admin.job.application');

    // Photo album section
    Route::get('/admin/album/list', AlbumComponent::class)->name('admin.album.list');
    Route::get('/admin/album/create', AlbumCreateComponent::class)->name('admin.album.create');
    Route::get('/admin/album/photo/list', AlbumPhotoComponent::class)->name('admin.album.photo.list');
    Route::get('/admin/album/photo/create', AlbumPhotoCreateComponent::class)->name('admin.album.photo.create');

    // categories Routes
    Route::get('/admin/latest/categories/list/', CategoryComponent::class)->name('admin.blog.categories.list');
    Route::get('/admin/latest/categories/', CategoryCreateComponent::class)->name('admin.blog.categories.create');
    Route::get('/admin/latest/tags/list', TagComponent::class)->name('admin.blog.tags.list');
    Route::get('/admin/latest/tags/create', TagCreateComponent::class)->name('admin.blog.tags.create');
    Route::get('/admin/event/list', EventComponent::class)->name('admin.event.list');
    Route::get('/admin/event/registration/{id}', EventRegistrationComponent::class)->name('admin.event.registration');
    Route::get('/admin/event/create', EventCreateComponent::class)->name('admin.event.create');
    Route::get('/admin/event/delete/{id}', EventCreateComponent::class)->name('admin.event.delete');

    // Pages routes
    Route::get('/admin/page/list', PageComponent::class)->name('admin.page.list');
    Route::get('/admin/page/create', PageCreateComponent::class)->name('admin.page.create');
    Route::get('/admin/page/section/list', PageSectionComponent::class)->name('admin.page.section.list');
    Route::get('/admin/page/section/create', PageSectionCreateComponent::class)->name('admin.page.section.create');
    // Route::get('/admin/page/section/data/list', PageSectionDataComponent::class)->name('admin.page.section.data.list');
    Route::get('/admin/page/section/data/create', PageSectionDataCreateComponent::class)->name('admin.page.section.data.create');
    Route::get('/admin/homepage/slider/list', HomepageSliderComponent::class)->name('admin.homepage.slider.list');
    Route::get('/admin/homepage/slider/create', HomepageSliderCreateComponent::class)->name('admin.homepage.slider.create');
    Route::get('/admin/partner/list', PartnerComponent::class)->name('admin.partner.list');
    Route::get('/admin/partner/create', PartnerCreateComponent::class)->name('admin.partner.create');


    // What we do backend routes
    Route::get('/admin/whatWeDo/list', WhatWeDoComponent::class)->name('admin.whatWeDo.list');
    Route::get('/admin/whatWeDo/create', WhatWeDoCreateComponent::class)->name('admin.whatWeDo.create');

    //Testimonials
    Route::get('/admin/testimonials', TestimonialsManager::class)->name('testimonials.index');
    Route::get('/admin/testimonials/edit/{id}', TestimonialsManager::class)->name('admin.testimonials.edit');
    Route::get('/admin/job/edit/{id}', JobCreateComponent::class)->name('admin.job.edit');



    Route::get('/admin/testimonials/create', Create::class)->name('testimonials.create');
});
// Route::get('/page-not-found', PageNotFound::class)->name('page.not.found');
// Route::fallback(function () {
//     return redirect()->route('page.not.found');
// });
