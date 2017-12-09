<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mailbox extends Model
{
    protected        $table     = "mailboxes";
    protected        $title     = "Mailbox";
    protected        $route     = "mailbox";
    protected        $view      = "mailbox::";
    protected static $key_cache = "mailboxes";
    protected        $fillable  = [
        'id',
        'subject',
        'email',
        'full_name',
        'message',
        'phone',
        'address',
        'status',
        'trash',
    ];


    public static function noticeMailbox() {
        return static::where([
            'status'    => 0,
            'trash'     => 0
        ])->orderBy('created_at', 'desc')->get();
    }

    public static function countNoticeMailbox() {
        return count(static::noticeMailbox());
    }
}
