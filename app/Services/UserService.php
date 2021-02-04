<?php


namespace App\Services;


use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Cache;

class UserService
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->getAll();
    }

    public function getById($id)
    {
        return $this->userRepository->getById($id);
    }

    public function getAccessToken($id, $tokenName = 'MynetOdev')
    {
        $user = $this->userRepository->getById($id);

        $seconds = 60 * 5;
        return Cache::remember('accessToken:' . $id, $seconds, function () use ($user, $tokenName, $id) {
            return $user->createToken($tokenName)->accessToken;
        });

    }
}
