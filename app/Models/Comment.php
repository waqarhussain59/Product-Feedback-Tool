<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'feedback_id', 'content'];

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parseMentions()
    {
        preg_match_all('/@(\w+)/', $this->content, $matches);

        foreach ($matches[1] as $username) {
            $user = User::where('name', $username)->first();
            if ($user) {
                $replacement = "<a href='/users/{$user->id}'>@$username</a>";
                $this->content = str_replace("@$username", $replacement, $this->content);
            }
        }
        return $this->content;
    }
    protected function parseEmojis($content)
    {
        $content = str_replace(':smile:', '😊', $content);
        return $content;
    }
}
