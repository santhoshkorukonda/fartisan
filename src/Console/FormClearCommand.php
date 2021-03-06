<?php

namespace SanthoshKorukonda\Artificer\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class FormClearCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'form:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all compiled json form view files';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        # Fetch all files in artificer storage directory
        $files = Storage::disk("artificer")->files();

        # Delete all specified files
        Storage::disk("artificer")->delete($files);

        # Flush all data from cache of artificer store
        Cache::store("artificer")->flush();

        # Output success message
        $this->info("Compiled json form views cleared!");
    }
}
