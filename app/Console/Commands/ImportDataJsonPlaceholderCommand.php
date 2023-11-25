<?php

namespace App\Console\Commands;

use App\Components\ImportDataClient;
use App\Models\Post;
use Illuminate\Console\Command;

class ImportDataJsonPlaceholderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:jsonplaceholder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pull json data from placeholder';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $import = new ImportDataClient();
        $response = $import->client->request('GET','posts');
        $posts = json_decode($response->getBody()->getContents());
        foreach ($posts as $post)
        {
            Post::firstOrCreate([
                'name' => $post->title
            ],[
                'name' => $post->title,
                'count_of_posts' => random_int(1, 20),
                'description' => $post->body,
                'category_id' => random_int(1, 10)
            ]);
        }
        dd('success');
    }
}
