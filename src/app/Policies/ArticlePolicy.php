<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Article;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

final class ArticlePolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function update(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }

    public function edit(User $user, Article $article)
    {
        return $user->id === $article->user_id;
    }
}
