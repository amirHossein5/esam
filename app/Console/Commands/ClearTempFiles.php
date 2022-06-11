<?php

namespace App\Console\Commands;

use App\Models\TemporaryFile;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearTempFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:temp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears unused temporary files.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $files = TemporaryFile::where('updated_at', '<', now()->subMinutes(15))->get();

        foreach ($files as $file) {
            if ($file->folder_path) {
                $this->warn('deleting: ' . $file->folder_path);

                $removed = Storage::disk($file->disk)
                    ->deleteDirectory($file->folder_path);

                if ($removed) {
                    $this->info('deleted: ' . $file->folder_path);
                    $file->delete();
                } else {
                    $this->error('not deleted: ' . $file->folder_path);
                }
            } else {

                $this->warn('deleting: ' . $file->file_path);

                $removed = Storage::disk($file->disk)
                    ->delete($file->file_path);

                if ($removed) {
                    $this->info('deleted: ' . $file->file_path);
                    $file->delete();
                } else {
                    $this->error('not deleted: ' . $file->file_path);
                }
            }
        }

        return 1;
    }
}
