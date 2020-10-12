<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Exceptions\BadComparisonUnitException;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Container\EntryNotFoundException;
use Illuminate\Contracts\Cache\LockTimeoutException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Seeder;
use Illuminate\Encryption\MissingAppKeyException;
use Illuminate\Foundation\Http\Exceptions\MaintenanceModeException;
use Illuminate\Http\Client\HttpClientException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Illuminate\Queue\MaxAttemptsExceededException;
use Illuminate\Routing\Exceptions\InvalidSignatureException;
use Illuminate\Routing\Exceptions\UrlGenerationException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use InvalidArgumentException;
use Mockery\Exception\BadMethodCallException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Varbox\Contracts\TranslationServiceContract;
use Varbox\Models\Block;
use Varbox\Models\Config;
use Varbox\Models\Email;
use Varbox\Models\Menu;
use Varbox\Models\Page;
use Varbox\Models\Redirect;
use Varbox\Models\Role;
use Varbox\Models\Upload;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete files
        Storage::disk('wysiwyg')->delete(
            array_diff(Storage::disk('wysiwyg')->allFiles(), ['.gitignore'])
        );

        Storage::disk('backups')->delete(
            array_diff(Storage::disk('backups')->allFiles(), ['.gitignore'])
        );

        Storage::disk('uploads')->delete(
            array_diff(Storage::disk('uploads')->allFiles(), ['.gitignore'])
        );

        // seed users & admins
        User::factory(199)->create()->each(function ($user, $i) {
            if ($i % 2 != 0) {
                $user->assignRoles(['Admin', 'Super']);
            }
        });

        // seed roles
        Role::factory(1)->create(['name' => 'Moderator']);
        Role::factory(1)->create(['name' => 'Editor']);
        Role::factory(1)->create(['name' => 'Guest', 'guard' => 'web']);

        // seed uploads
        Upload::factory(1)->make();

        // seed pages
        Page::factory(10)->create()->each(function ($page) {
            if (!$page->isDrafted()) {
                Page::factory(5)->create(['parent_id' => $page->id]);
            }
        });

        // seed menus
        Menu::factory(20)->create()->each(function ($menu, $i) {
            if ($i % 3 == 0) {
                Menu::factory(5)->create([
                    'parent_id' => $menu->id,
                    'location' => $menu->location,
                ]);
            }
        });

        // seed blocks
        Block::factory(40)->create();

        // seed email
        Email::factory(1)->create();

        // seed translations
        app(TranslationServiceContract::class)->importTranslations();

        // seed redirects
        Redirect::factory(60)->create();

        // seed configs
        Config::factory()->count(1)->appName()->create();
        Config::factory()->count(1)->appTimezone()->create();
        Config::factory()->count(1)->appLocale()->create();
        Config::factory()->count(1)->mailFromAddress()->create();
        Config::factory()->count(1)->mailFromName()->create();
        Config::factory()->count(1)->servicesPostmarkKey()->create();
        Config::factory()->count(1)->servicesGoogleKey()->create();
        Config::factory()->count(1)->servicesFacebookKey()->create();
        Config::factory()->count(1)->servicesGithubKey()->create();

        // seed errors
        report(new AuthenticationException('Unauthenticated'));
        report(new AuthorizationException('You are not authorized to perform this action', 401));
        report(new ModelNotFoundException('Eloquent model not found', 404));
        report(new InvalidArgumentException('Invalid argument supplied', 422));
        report(new EntryNotFoundException('Entry record not found', 404));
        report(new ThrottleRequestsException('Too many requests'));
        report(new NotFoundHttpException('Not found'));
        report(new MethodNotAllowedException(['GET'], 'Method PUT not allowed', 405));
        report(new LockTimeoutException('You have been timed out', 408));
        report(new BindingResolutionException());
        report(new FileNotFoundException('File not found', 404));
        report(new HttpClientException('Invalid client configuration'));
        report(new UrlGenerationException('The url could not be generated', 422));
        report(new ValidationException(app('validator')));
        report(new Exception('Just an exception', 500));
        report(new BadComparisonUnitException('YYYY', 422));
        report(new BadMethodCallException('Invalid method call', 400));
        report(new DecryptException('Could not decrypt the string'));
        report(new QueryException('select * from migrations', [], new Exception));
        report(new MassAssignmentException('Argument x is not mass-assignable'));
        report(new MissingAppKeyException());
        report(new MaintenanceModeException(1, 1, 'Server under maintenance', null, 503));
        report(new MaxAttemptsExceededException('Max attempts exceeded', 429));
        report(new InvalidSignatureException());
    }
}
