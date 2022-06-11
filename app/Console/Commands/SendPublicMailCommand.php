<?php

namespace App\Console\Commands;

use App\Mail\PublicMail;
use App\Models\Notify\Email;
use App\Repositories\UserRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SendPublicMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:public-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Snnds public mails to all of the users';

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
        $mails = Email::query()
            ->whereStatus(1)
            ->whereSent(0)
            ->where('send_at', '<=', now())
            ->with(['files' => fn ($q) => $q->select('id','file_path','public_mail_id')->whereStatus(1)])
            ->get();

        $users = cache()->remember('DB_TABLE_USERS_SELECT_email-id-email_verified_at_get', now()->addDay(), fn() =>
            DB::table('users')->select('email', 'id', 'email_verified_at')->get()
        );

        collect($users)->each(fn ($user) =>
            collect($mails)->each(function ($mail) use ($user) {
                if (filter_var($user->email, FILTER_VALIDATE_EMAIL) and $user->email_verified_at) {
                    Mail::to($user->email)
                        ->queue((new PublicMail($mail->subject, $mail->body, $mail->files)));
                }

                $mail->sent = 1;
                $mail->save();
            })
        );

        if ($mails->isNotEmpty()) {
            $this->info('mail has sent to ' . $users->count() . ' users');
        } else {
            $this->info('no mail found!');
        }
        return 0;
    }
}
